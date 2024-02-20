<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['create_product'])) {
    list_cats();
?>

    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            افزودن محصول
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
                                        اطلاعات محصول را وارد کرده و سپس دکمه ثبت را بزنید
                                    </span>
                                </div>
                            </div>
                            <form method="POST" action="">
                                <div class="mt-6">
                                    <div class="w-full space-y-10">
                                        <div class="w-full">
                                            <div class=" relative ">

                                                <label for="prd_name" class="text-gray-700">
                                                    نام محصول
                                                </label>
                                                <input type="text" name="prd_name" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required/>

                                                <label for="prd_desc" class="text-gray-700">
                                                    توضیحات محصول
                                                </label>
                                                <textarea rows="5" cols="50" name="prd_desc" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required></textarea>

                                                <label for="prd_cat" class="text-gray-700">
                                                    دسته بندی
                                                </label>
                                                <select name="prd_cat" id="cats" class="mb-5 rounded-lg border-transparent flex-1 border border-gray-300 w-full py-2 px-4 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
                                                    <option selected value="">دسته بندی را انتخاب کنید</option>
                                                    <?php foreach ($cats as $cat) { ?>
                                                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                                    <?php } ?>
                                                </select>

                                                <label for="file_id" class="text-gray-700">
                                                    آیدی فایل محصول
                                                </label>
                                                <input type="text" name="file_id" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required/>


                                                <label for="demo" class="text-gray-700">
                                                    لینک پیش نمایش
                                                </label>
                                                <input type="text" name="demo" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />

                                                    <label for="price" class="text-gray-700">
                                                        قیمت(به تومان)
                                                    </label>
                                                    <input id="price" type="text" name="price" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required />

                                                <div class="mb-5">

                                                    <label for="prd_type" class="text-gray-700">
                                                        نوع محصول:
                                                    </label>
                                                    <input id="free" type="radio" value="free" name="prd_type" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" onclick="javascript:priceCheck();" required>
                                                    <label for="free" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">رایگان</label>

                                                    <input id="vip" type="radio" value="vip" name="prd_type" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" onclick="javascript:priceCheck();">
                                                    <label for="vip" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ویژه</label>
                                                </div>
                                                <div class="mb-5">
                                                    <label for="prd_status" class="text-gray-700">
                                                        وضعیت محصول:
                                                    </label>
                                                    <input id="enabled" type="radio" value="1" name="prd_status" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 " required>
                                                    <label for="enabled" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>

                                                    <input id="disabled" type="radio" value="0" name="prd_status" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 ">
                                                    <label for="disabled" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر
                                                        فعال</label>
                                                </div>
                                              
                                            </div>

                                            <div>
                                                <span class="block w-full rounded-md shadow-sm">
                                                    <button type="submit" name="create_product" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
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
    </div>

<?php } ?>
<!-- insert product -->
<?php
if (isset($_POST['create_product'])) {
    if (insert_product()) { ?>
        <script type="text/javascript">
            window.location = "products.php?prd_created";
        </script>
        <?php }elseif($empty_inputs == 1){?>
           <script>alert("فیلد های اجباری را پر کنید");</script> 
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "products.php?prd_create_error";
        </script>
<?php }
} ?>
<?php if (isset($_GET['prd_created'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        محصول با موفقیت افزوده شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['prd_create_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در افزودن محصول بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>
<?php if (isset($_GET['prd_create_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در افزودن محصول بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>


<!-- edit product-->

<?php if (isset($_GET['edit_prd'])) {
    $id = intval($_GET['edit_prd']);
    fetch_product_info($id);
    list_cats();
?>

    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col  flex-wrap sm:flex-row ">
            <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
                <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                            افزودن محصول
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
                                        اطلاعات محصول را وارد کرده و سپس دکمه ثبت را بزنید
                                    </span>
                                </div>
                            </div>
                            <form method="POST" action="">
                                <div class="mt-6">
                                    <div class="w-full space-y-10">
                                        <div class="w-full">
                                            <div class=" relative ">
                                                <input type="hidden" name="id" value="<?= $id ?>" />

                                                <label for="prd_name" class="text-gray-700">
                                                    نام محصول
                                                </label>
                                                <input type="text" name="prd_name" value="<?= $product_name ?>" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />

                                                <label for="prd_desc" class="text-gray-700">
                                                    توضیحات محصول
                                                </label>
                                                <textarea rows="5" cols="50" name="prd_desc" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"><?= $product_description ?></textarea>

                                                <label for="prd_cat" class="text-gray-700">
                                                    دسته بندی
                                                </label>
                                                <select name="prd_cat" id="cats" class="mb-5 rounded-lg border-transparent flex-1 border border-gray-300 w-full py-2 px-4 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                                    <?php foreach ($cats as $cat) {
                                                        if ($product_category == $cat['id']) { ?>
                                                            <option selected value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>

                                                    <?php }
                                                    } ?>
                                                </select>

                                                <label for="file_id" class="text-gray-700">
                                                    آیدی فایل محصول
                                                </label>
                                                <input type="text" name="file_id" value="<?= $file_id ?>" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />


                                                <label for="demo" class="text-gray-700">
                                                    لینک پیش نمایش
                                                </label>
                                                <input type="text" name="demo" value="<?= $product_demo ?>" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />

                                                <div id="price-section">

                                                    <label for="price" class="text-gray-700">
                                                        قیمت(به تومان)
                                                    </label>
                                                    <input id="price" type="text" name="price" value="<?= $price ?>" class="mb-5 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />
                                                </div>
                                            
                                                <div class="w-1/2 mb-5">

                                                    <label for="prd_type" class="text-gray-700">
                                                        نوع محصول:
                                                    </label>
                                                    <?php if ($product_type == 'free') { ?>
                                                        <input id="free" type="radio" value="free" name="prd_type" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" onclick="javascript:priceCheck();" checked>
                                                        <label for="free" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">رایگان</label>
                                                        <input id="vip" type="radio" value="vip" name="prd_type" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" onclick="javascript:priceCheck();">
                                                        <label for="vip" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ویژه</label>
                                                    <?php } elseif ($product_type == 'vip') { ?>
                                                        <input id="free" type="radio" value="free" name="prd_type" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" onclick="javascript:priceCheck();">
                                                        <label for="free" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">رایگان</label>
                                                        <input id="vip" type="radio" value="vip" name="prd_type" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" onclick="javascript:priceCheck();" checked>
                                                        <label for="vip" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ویژه</label>

                                                    <?php } ?>
                                                </div>
                                                <div class="w-1/2 mb-5">
                                                    <label for="prd_status" class="text-gray-700">
                                                        وضعیت محصول:
                                                    </label>

                                                    <?php if ($product_status == 1) { ?>
                                                        <input id="enabled" type="radio" value="1" name="prd_status" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" checked>
                                                        <label for="enabled" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>

                                                        <input id="disabled" type="radio" value="0" name="prd_status" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 ">
                                                        <label for="disabled" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر
                                                            فعال</label>
                                                    <?php } elseif ($product_status == 0) { ?>
                                                        <input id="enabled" type="radio" value="1" name="prd_status" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                                        <label for="enabled" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>

                                                        <input id="disabled" type="radio" value="0" name="prd_status" class="align-sub w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" checked>
                                                        <label for="disabled" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر
                                                            فعال</label>
                                                    <?php } ?>

                                                </div>

                                            </div>
                                        </div>

                                        <div>
                                            <span class="block w-full rounded-md shadow-sm">
                                                <button type="submit" name="edit_product" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
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

<?php } ?>
<?php
if (isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    if (update_product($id)) { ?>
        <script type="text/javascript">
            window.location = "products.php?prd_edited";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "products.php?prd_edit_error";
        </script>
<?php }
} ?>
<?php if (isset($_GET['prd_edited'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        محصول با موفقیت ویرایش شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['prd_edit_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در ویرایش محصول بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>



<!-- delete product -->


<?php if (isset($_GET['del_prd'])) {
    if (delete_product()) { ?>
        <script type="text/javascript">
            window.location = "products.php?prd_del";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            window.location = "products.php?prd_del_error";
        </script>
<?php
    }
} ?>

<?php if (isset($_GET['prd_del'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-green-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        محصول با موفقیت حذف شد
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>

<?php if (isset($_GET['prd_del_error'])) { ?>
    <div id="alert1" class="my-3  block  text-left text-white bg-red-500 h-12 flex items-center justify-center p-4 rounded-md relative" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        مشکلی در حذف محصول بوجود آمده است
        <button onclick="closeAlert()" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
<?php } ?>