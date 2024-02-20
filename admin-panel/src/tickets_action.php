<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['userid'])) {
    $userid = intval($_GET['userid']);
    user_info($userid);
?>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            اطلاعات کاربر
                        </h2>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>

                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                            نام کاربر
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                            شناسه عددی
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                            نام کاربری
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                            شماره تلفن
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                            نوع حساب
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                            باقیمانده از اشتراک
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $name; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $userid; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php
                                                if (isset($username) && !empty($username)) {
                                                    echo "<a href='https://t.me/$username'>$username</a>";
                                                } else { ?>
                                                    <span class="relative inline-block px-3 py-1 text-red-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            ندارد
                                                        </span>
                                                    </span>
                                                <?php } ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php
                                                if (isset($phone) && !empty($phone) && $phone != 0) {
                                                    echo $phone;
                                                } else { ?>
                                                    <span class="relative inline-block px-3 py-1 text-red-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            تایید نشده
                                                        </span>
                                                    </span>
                                                <?php } ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php
                                                if (is_vip($userid)) { ?>
                                                    <span class="relative inline-block px-3 py-1 text-green-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            وی آی پی
                                                        </span>
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="relative inline-block px-3 py-1 text-yellow-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            عادی
                                                        </span>
                                                    </span>
                                                <?php } ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php if (is_vip($userid)) {
                                                    echo $vip_days . ' روز' . ' - <a class="bg-blue-200 text-blue-900 px-2 py-1 rounded-full" href="?vip_plus=' . $userid . '">افزایش روز های وی آی پی</a>';
                                                } else {
                                                    echo '-';
                                                } ?>
                                            </p>
                                        </td>




                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>

<?php
if (isset($_GET['send'])) {
    $userid = intval($_GET['send']);
    user_info($userid);
?>

    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            پاسخ به کاربر : <?= $name ?>
                        </h2>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <tbody>
                                    <div class="bg-white rounded-lg shadow min-w-full sm:overflow-hidden">
                                        <div class="px-4 py-4 sm:px-10">
                                            <form method="POST" action="">
                                                <div class="w-full space-y-10">
                                                    <div class="w-full">
                                                        <div class="w-full">
                                                            <label for="msg" class="text-gray-700 block py-2">
                                                                متن پیام
                                                            </label>
                                                            <textarea name="msg" rows="5" cols="50" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value=""></textarea>
                                                            <button type="submit" name="send_to_user" class=" py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/5 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                                ارسال پیام
                                                            </button>
                                                            <input type="hidden" name="userid" value="<?= $userid ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php
if (isset($_POST['send_to_user'])) {
    $msg = $_POST['msg'];
    $userid = $_POST['userid'];
    $result = sendMessage($userid, $msg);
    if ($result) { ?>
        <script type="text/javascript">
            window.location = "tickets.php?send_success";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "tickets.php?send_fail";
        </script>
<?php
    }
}
?>

<?php if (isset($_GET['send_success'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        پاسخ با موفقیت ارسال شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['send_fail'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در ارسال پاسخ بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>



<?php if (isset($_GET['del_ticket'])) {
    if (delete_ticket()) { ?>
        <script type="text/javascript">
            window.location = "tickets.php?ticket_del";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "tickets.php?ticket_del_error";
        </script>
<?php
    }
} ?>

<?php if (isset($_GET['ticket_del'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        تیکت با موفقیت حذف شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['ticket_del_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در حذف تیکت بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>