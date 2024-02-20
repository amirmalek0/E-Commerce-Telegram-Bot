
<!-- CREATE ADMIN ACTION -->

<?php
if (isset($_GET['create_admin'])) {
?>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            افزودن ادمین
                        </h2>
                    </div>
                    <div class="bg-white rounded-lg shadow min-w-full sm:overflow-hidden mt-5">
                        <div class="px-4 py-8 sm:px-10">
                            <div class="relative mt-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300">
                                    </div>
                                </div>
                                <div class="relative flex justify-center text-sm leading-5">
                                    <span class="px-2 text-gray-500 bg-white">
                                    اطلاعات ادمین را وارد کرده و سپس دکمه افزودن ادمین را بزنید
                                    </span>
                                </div>
                            </div>
                            <form method="POST" action="">
                                <div class="mt-6">
                                    <div class="w-full space-y-10">
                                        <div class="w-full">
                                            <div class=" relative ">
                                                <label for="username" class="text-gray-700">
                                                    یوزرنیم 
                                                </label>
                                                <input type="text" name="username" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="یوزرنیم را وارد کنید" required/>
                                            
                                                <label for="pass" class="text-gray-700">
                                                    پسورد 
                                                </label>
                                                <input type="password" name="pass" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="پسورد را وارد کنید" required/>
                                            </div>
                                        </div>

                                        <div>
                                            <span class="block w-full rounded-md shadow-sm">
                                                <button type="submit" name="admin_create" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                    افزودن ادمین
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
    </div>

    <?php }
if (isset($_POST['admin_create'])) {
    if (create_admin()) {
    ?>
        <script type="text/javascript">
            window.location = "admins.php?admin_created";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "admins.php?admin_create_error";
        </script>
<?php }
} ?>

<?php if (isset($_GET['admin_created'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        یوزر ادمین با موفقیت ایجاد شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['admin_create_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در ایجاد یوزر ادمین بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>


<!-- DELETE ADMIN ACTION -->

<?php if (isset($_GET['del_admin'])) {
    if (delete_admin()) { ?>
        <script type="text/javascript">
            window.location = "admins.php?admin_del";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "admins.php?admin_del_error";
        </script>
<?php
    }
} ?>

<?php if (isset($_GET['admin_del'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
  یوزر ادمین با موفقیت حذف شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['admin_del_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در حذف یوزر ادمین بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>



<!-- CHANGE ADMIN PASSWORD ACTION -->

<?php
if (isset($_GET['change_pass'])) {
    admin_info($_GET['change_pass']);
?>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            تغییر رمز برای : <?=$username?>
                        </h2>
                    </div>
                    <div class="bg-white rounded-lg shadow min-w-full sm:overflow-hidden mt-5">
                        <div class="px-4 py-8 sm:px-10">
                            <div class="relative mt-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300">
                                    </div>
                                </div>
                                <div class="relative flex justify-center text-sm leading-5">
                                    <span class="px-2 text-gray-500 bg-white">
                                    رمز جدید را وارد کرده و سپس دکمه تغییر رمز را بزنید
                                    </span>
                                </div>
                            </div>
                            <form method="POST" action="">
                                <div class="mt-6">
                                    <div class="w-full space-y-10">
                                        <div class="w-full">
                                            <div class=" relative ">
                                                <label for="pass" class="text-gray-700">
                                                     پسورد جدید
                                                </label>
                                                <input type="text" name="pass" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="پسورد را وارد کنید" required/>
                                                <input type="hidden" name="id" value="<?= $_GET['change_pass']?>">

                                            </div>
                                        </div>

                                        <div>
                                            <span class="block w-full rounded-md shadow-sm">
                                                <button type="submit" name="change_pass" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                    تغییر رمز
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
    </div>

    <?php }
if (isset($_POST['change_pass'])) {
    $id = $_POST['id'];
    if (change_admin_pass($id)) {
    ?>
        <script type="text/javascript">
            window.location = "admins.php?pass_changed";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "admins.php?pass_change_error";
        </script>
<?php }
} ?>

<?php if (isset($_GET['pass_changed'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        تغییر رمز با موفقیت انجام شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['pass_change_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در ایجاد تغییر رمز ادمین بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>