<!-- EDIT CATEGORY ACTION -->
<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['edit_cat'])) {
    fetch_cat_info();
?>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            ویرایش دسته بندی : <?= $cat_name ?>
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
                                        نام دسته بندی را وارد کرده و سپس دکمه ثبت را بزنید
                                    </span>
                                </div>
                            </div>
                            <form method="POST" action="">
                                <div class="mt-6">
                                    <div class="w-full space-y-10">
                                        <div class="w-full">
                                            <div class=" relative ">
                                                <label for="name" class="text-gray-700">
                                                    نام دسته بندی
                                                </label>
                                                <input type="text" name="cat_name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="<?php if (isset($cat_name)) {
                                                                                                                                                                                                                                                                                                                                                    echo $cat_name;
                                                                                                                                                                                                                                                                                                                                                } ?>" />
                                            </div>
                                            <input type="hidden" name="cat_id" value="<?php if (isset($cat_id)) {
                                                                                            echo $cat_id;
                                                                                        } ?>" />
                                        </div>

                                        <div>
                                            <span class="block w-full rounded-md shadow-sm">
                                                <button type="submit" name="cat_update" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
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
    </div>

    <?php }
if (isset($_POST['cat_update'])) {
    if (edit_cat()) {
    ?>
        <script type="text/javascript">
            window.location = "categories.php?cat_updated";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "categories.php?cat_update_error";
        </script>
<?php }
} ?>

<?php if (isset($_GET['cat_updated'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        دسته بندی با موفقیت ویرایش شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['cat_update_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در ویرایش دسته بندی بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<!-- DELETE CATEGORY ACTION -->

<?php if (isset($_GET['del_cat'])) {
    if (delete_cat()) { ?>
        <script type="text/javascript">
            window.location = "categories.php?cat_del";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "categories.php?cat_del_error";
        </script>
<?php
    }
} ?>

<?php if (isset($_GET['cat_del'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        دسته بندی با موفقیت حذف شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['cat_del_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در حذف دسته بندی بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>


<!-- CREATE CATEGORY ACTION -->

<?php
if (isset($_GET['create_cat'])) {
?>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            افزودن دسته بندی
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
                                        نام دسته بندی را وارد کرده و سپس دکمه ثبت را بزنید
                                    </span>
                                </div>
                            </div>
                            <form method="POST" action="">
                                <div class="mt-6">
                                    <div class="w-full space-y-10">
                                        <div class="w-full">
                                            <div class=" relative ">
                                                <label for="name" class="text-gray-700">
                                                    نام دسته بندی
                                                </label>
                                                <input type="text" name="cat_name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="نام دسته بندی را وارد کنید" />
                                            </div>
                                        </div>

                                        <div>
                                            <span class="block w-full rounded-md shadow-sm">
                                                <button type="submit" name="cat_create" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
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
    </div>

    <?php }
if (isset($_POST['cat_create'])) {
    if (create_cat()) {
    ?>
        <script type="text/javascript">
            window.location = "categories.php?cat_created";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "categories.php?cat_create_error";
        </script>
<?php }
} ?>

<?php if (isset($_GET['cat_created'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        دسته بندی با موفقیت ایجاد شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['cat_create_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در ایجاد دسته بندی بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>