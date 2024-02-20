<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['page'])) {
    $page_number = $_GET['page'];
    get_specific_page($page_number, 'options');
} else {
    list_options();
}include 'setting_action.php';
?>

<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <div class="flex flex-col flex-wrap sm:flex-row ">
        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                        <?= $title ?>

                    </h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <tbody>
                                <div class="bg-white rounded-lg shadow min-w-full sm:overflow-hidden">
                                    <div class="px-4 py-8 sm:px-10">
                                        <form method="POST" action="">
                                            <div class="mt-6">
                                                <div class="w-full space-y-10">
                                                    <div class="flex flex-wrap -mx-3 mb-6">
                                                        <?php foreach ($options as $option) { ?>
                                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                <label for="name" class="text-gray-700 block py-2">
                                                                    <?= $option['description']; ?>
                                                                </label>
                                                                <textarea type="text" name="option[]" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" /><?= $option['value'] ?></textarea>
                                                                <input type="hidden" name="option_name[]" value="<?= $option['name']; ?>">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <button type="submit" name="opt_update" class="min-w-max fixed bottom-5 left-10 py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/5 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    به روز رسانی
                                </button>
                                </form>
                            </tbody>
                        </table>


                        <?php
                        fetch_pages_count('options');
                        if (isset($_GET['page']) && $_GET['page'] > $pages_number) { ?>
                            <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                                همچین صفحه ای وجود ندارد
                            </div>
                        <?php } else { ?>
                            <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                                <div class="flex items-center">

                                    <?php
                                    $page = 1;
                                    while ($page <= $pages_number) {
                                        if (isset($_GET['page']) && $_GET['page'] == $page) {
                                    ?>
                                            <a href="?page=<?= $page ?>">
                                                <button type="button" class="w-full px-4 py-2 border border-b text-base text-white bg-blue-600 hover:bg-blue-400 rounded-lg">
                                                    <?= $page;
                                                    $page++; ?>
                                                </button>
                                            </a>
                                        <?php } else { ?>
                                            <a href="?page=<?= $page ?>">
                                                <button type="button" class="w-full px-4 py-2 border border-b text-base text-indigo-500 bg-white hover:bg-gray-100 rounded-lg">
                                                    <?= $page;
                                                    $page++; ?>
                                                </button>
                                            </a>
                                <?php }
                                    }
                                } ?>
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>