<?php include 'db.php';
ob_start();
session_start();?>

    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style.css">
        <title> ورود به پنل</title>
        <link rel="icon" type="image/x-icon" href="src/img/favicon.png">
        <meta name="theme-color" content="#229ED9" />
    </head>

    <body dir="rtl" class="bg-img rounded-2xl h-screen flex flex-col justify-center items-center font-body">


    <div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
        <div class="self-center mb-2 text-xl font-light text-gray-600 sm:text-2xl dark:text-white border-b-4">
            ورود به پنل مدیریت
        </div>
        <div class="mt-8">
            <form action="" method="POST" autoComplete="off">
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span class="rounded-r-md inline-flex  items-center px-3 border-t bg-white border-r border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25007 2.38782C8.54878 2.0992 10.1243 2 12 2C13.8757 2 15.4512 2.0992 16.7499 2.38782C18.06 2.67897 19.1488 3.176 19.9864 4.01358C20.824 4.85116 21.321 5.94002 21.6122 7.25007C21.9008 8.54878 22 10.1243 22 12C22 13.8757 21.9008 15.4512 21.6122 16.7499C21.321 18.06 20.824 19.1488 19.9864 19.9864C19.1488 20.824 18.06 21.321 16.7499 21.6122C15.4512 21.9008 13.8757 22 12 22C10.1243 22 8.54878 21.9008 7.25007 21.6122C5.94002 21.321 4.85116 20.824 4.01358 19.9864C3.176 19.1488 2.67897 18.06 2.38782 16.7499C2.0992 15.4512 2 13.8757 2 12C2 10.1243 2.0992 8.54878 2.38782 7.25007C2.67897 5.94002 3.176 4.85116 4.01358 4.01358C4.85116 3.176 5.94002 2.67897 7.25007 2.38782ZM12 6C9.79086 6 8 7.79086 8 10C8 12.2091 9.79086 14 12 14C14.2091 14 16 12.2091 16 10C16 7.79086 14.2091 6 12 6ZM18.3775 17.2942C18.7303 17.8695 18.6055 18.63 18.0369 18.9935C17.5199 19.3241 16.9158 19.5265 16.3159 19.6598C15.2322 19.9006 13.8299 20 11.9998 20C10.1698 20 8.76744 19.9006 7.68381 19.6598C7.09516 19.529 6.50205 19.3319 5.99131 19.012C5.41247 18.6495 5.28523 17.8786 5.64674 17.2991C6.06303 16.6318 6.63676 16.1075 7.40882 15.7344C8.58022 15.1684 10.1157 15 11.9996 15C13.8771 15 15.4109 15.1548 16.5807 15.7047C17.3727 16.077 17.9572 16.6089 18.3775 17.2942Z" fill="currentColor"></path> </g></svg>
                        </span>
                        <input type="text" name="username" class=" rounded-l-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="یوزرنیم شما" />
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                    <div class="flex relative ">
                        <span class="rounded-r-md inline-flex  items-center px-3 border-t bg-white border-r border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <input type="password" name="password" class=" rounded-l-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="پسورد شما" />
                    </div>
                </div>
                <div class="flex w-full">
                    <button type="submit" name="login" class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        ورود
                    </button>
                </div>
            </form>
        </div>
    </div>
    </body>

    </html>

<?php
function login_user($username, $password)
{
    global $db;
    $sql = "SELECT * FROM sp_admins WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result) {
        $pwd = $result['password'];
        $checkpass = password_verify($password, $pwd);
        if ($checkpass === false) {
            echo "<span class='bg-red-600 text-white text-xl p-2 m-2 rounded-lg'>رمز وارد شده اشتباه می باشد!</span>";

        } elseif ($checkpass === true) {
            $_SESSION['username'] = $username;
            if($username == 'admin'){
                header('Location:admins.php');
            }else{
                header('Location:index.php');
            }
            exit();
        }
    } else {
        echo "<span class='bg-red-600 text-white text-xl p-2 m-2 rounded-lg'>همچین یوزری پیدا نشد!</span>";
    }
}
if (isset($_POST['login'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }
    //prevent SQL INJECTION
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    login_user($username, $password);
}
