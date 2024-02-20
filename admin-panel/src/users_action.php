<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['vip_plus'])) {
    $userid = intval($_GET['vip_plus']);
    user_info($userid);
?>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-2">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            افزایش روز های اشتراک ویژه
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
                                                <?php if (is_vip($userid)) {
                                                    echo $vip_days . ' روز';
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
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">


                <div class="bg-white rounded-lg shadow min-w-full sm:overflow-hidden mt-5">
                    <div class="px-4 py-8 sm:px-10">
                        <div class="relative mt-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300">
                                </div>
                            </div>
                            <div class="relative flex justify-center text-sm leading-5">
                                <span class="px-2 text-gray-500 bg-white">
                                    تعداد روز هایی که می خواهید به اشتراک کاربر اضافه شود را وارد کنید و سپس دکمه ثبت را
                                    بزنید
                                </span>
                            </div>
                        </div>
                        <form method="POST" action="">
                            <div class="mt-6">
                                <div class="w-full space-y-10">
                                    <div class="w-full">
                                        <div class=" relative ">
                                            <label for="name" class="text-gray-700">
                                                چند روز اضافه شود؟
                                            </label>
                                            <input type="text" name="days" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="برای مثال : 30" />
                                        </div>
                                    </div>

                                    <div>
                                        <span class="block w-full rounded-md shadow-sm">
                                            <button type="submit" name="vip_days" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                ثبت
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php }
if (isset($_POST['vip_days'])) {
    $days = intval($_POST['days']);
    $result = add_vip_days($userid, $days);
    if ($result) {
    ?>
        <script type="text/javascript">
            window.location = "users.php?vip_added";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "users.php?vip_add_error";
        </script>
<?php }
} ?>

<?php if (isset($_GET['vip_added'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        روز های اشتراک با موفقیت اضافه شد.
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['vip_add_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در اضافه کردن روز های اشتراک بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>


<!-- delete user -->


<?php if (isset($_GET['del_user'])) {
    if (delete_user()) { ?>
        <script type="text/javascript">
            window.location = "users.php?user_del";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "users.php?user_del_error";
        </script>
<?php
    }
} ?>

<?php if (isset($_GET['user_del'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        کاربر با موفقیت حذف شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['user_del_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در حذف کاربر بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>