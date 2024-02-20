<?php

class telegram
{
    public $token;
    public $db;
    public $query;
    public $queryResult;
    public function __construct($token, $host, $username, $password, $dbname)
    {
        $this->token = $token;
        try {
            $this->db = new PDO(
                "mysql:host=$host;dbname=$dbname",
                $username,
                $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4")
            );
        } catch (PDOException $error) {
            echo "Unable to connect to database.";
        }
    }
    public function __destruct()
    {
        $this->db = null;
    }
    public function runQuery()
    {
        $this->queryResult = $this->db->query($this->query);
    }
    public function getMe()
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/getMe';
        return file_get_contents($url);
    }
    public function getUpdates()
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/getUpdates';
        return file_get_contents($url);
    }
    // get users msg + info
    public function getTxt()
    {
        $text = json_decode(file_get_contents('php://input'));
        return $text;
    }
    // send message to specific user
    public function sendMessage($userid, $text)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?chat_id=' . $userid . '&text=' . $text;
        file_get_contents($url);
    }
    public function sendMessageCURL($userid, $text, $options)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage';
        $keyboard = $this->makeMenu($options);
        $postfields = array(
            'chat_id' => $userid,
            'text' => $text,
            //'parse_mode' => 'HTML'
            'reply_markup' => $keyboard
        );
        $this->executeCURL($url, $postfields);
    }
    public function sendVideo($userid, $videoid, $caption)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendVideo';
        $postfields = array(
            'chat_id' => $userid,
            'caption' => $caption,
            'video' => $videoid
        );
        $this->executeCURL($url, $postfields);
    }
    public function sendHTML($userid, $text, $options)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage';
        $keyboard = $this->makeMenu($options);
        $postfields = array(
            'chat_id' => $userid,
            'text' => $text,
            'parse_mode' => 'HTML',
            'reply_markup' => $keyboard
        );
        $this->executeCURL($url, $postfields);
    }
    public function makeMenu($options)
    {
        $keyboard = array(
            'keyboard' => $options,
            'resize_keyboard' => true,
            'one_time_keyboard' => false,
            'selective' => true
        );
        return $keyboard = json_encode($keyboard);
    }
    public function sendPhoto($userid, $photo, $caption, $options)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendPhoto';
        $keyboard = $this->makeMenu($options);
        $postfields = array(
            'chat_id' => $userid,
            'photo' => new CURLFile($photo),
            'caption' => $caption,
            'reply_markup' => $keyboard
        );
        $this->executeCURL($url, $postfields);
    }
    public function sendAction($userid, $action)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendChatAction';
        $postfields = array(
            'chat_id' => $userid,
            'action' => $action
        );
        $this->executeCURL($url, $postfields);
    }
    public function randomImage()
    {
        $imagesDir = 'images/';
        $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        $randomImage = $images[array_rand($images)];
        return $randomImage;
    }
    public function FileURL($fileid)
    {
        $filePath = $this->exeCURL('getFile', [
            'file_id' => $fileid
        ]);
        $filepath = $filePath->result->file_path;
        return $fileurl = 'https://api.telegram.org/file/bot' . TOKEN . '/' . $filepath;
    }
    public function FilePath($fileid)
    {
        $get = $this->exeCURL('getFile', [
            'file_id' => $fileid
        ]);
        return $get;
    }
        /*public function sendDocument($userid,$fileid){
    $url= 'https://api.telegram.org/bot'.$this->token.'/sendDocument?chat_id='.$userid.'&document='.$fileid;
    return file_get_contents($url);
    }*/
    public function sendDocument($userid, $file, $caption)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/sendDocument';
        $postfields = array(
            'chat_id' => $userid,
            'document' => new CURLFile($file),
            'caption' => $caption
        );
        $this->executeCURL($url, $postfields);
    }
    public function getChatMember($channel, $user_id)
    {
        $get = $this->exeCURL('getChatMember', [
            'chat_id' => $channel,
            'user_id' => $user_id
        ]);
        $data = $get->result->status;
        return $data;
    }
    public function kickChatMember($chatid, $userid)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/kickChatMember?chat_id=' . $chatid . '&user_id=' . $userid;
        file_get_contents($url);
    }
    public function deleteMessage($chatid, $msgid)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/deleteMessage?chat_id=' . $chatid . '&message_id=' . $msgid;
        file_get_contents($url);
    }
    public function editMessageText($chatid, $msgid, $text)
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/editMessageText?chat_id=' . $chatid . '&message_id=' . $msgid . '&text=' . $text;
        file_get_contents($url);
    }
    public function genRefCode($userid)
    {
        $date = time();
        return mb_substr(md5($userid . $date), 0, 10);
    }
    public function checkStep($userid)
    {
        $sql = "select * from wsh_user where userid='$userid' and active=0";
        $res = $this->db->query($sql);
        $dbres = $res->fetch(PDO::FETCH_ASSOC);
        return $dbres['step'];
    }
    public function executeCURL($url, $postfields)
    {
        $ch = curl_init();
        //$timeout = 100 ; // 10 seconds
        // rawurlencode for sanitizing malicius inputs
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: multipart/form-data"
        ));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $contents = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($contents, true);
        return $output;
    }
    public function exeCURL($method, $datas = [])
    {
        $url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
        $res = curl_exec($ch);
        if (curl_error($ch)) {
            var_dump(curl_error($ch));
        } else {
            return json_decode($res);
        }
    }
}


function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}


function get_type($id)
{
    $url = "https://api.telegram.org/bot" . TOKEN . "/getFile?file_id=$id";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
