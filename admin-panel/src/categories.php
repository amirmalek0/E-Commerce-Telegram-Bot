<?php 
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['page'])) {
    $page_number = $_GET['page'];
    get_specific_page($page_number, 'cats');
} else {
    list_cats();
}
include 'category_action.php';
?>

<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <div class="flex flex-col flex-wrap sm:flex-row ">
        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                    <?=$title?>
                    </h2>
                    <a href="?create_cat">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            افزودن دسته بندی
                        </button>
                    </a>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        شناسه
                                    </th>
                                    <th scope="col"
                                        class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        نام دسته بندی
                                    </th>

                                    <th scope="col"
                                        class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        اقدامات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cats as $cat) { ?>

                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <?= $cat['id']; ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <?= $cat['name']; ?>

                                        </p>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <a class="ml-5" href="?edit_cat=<?= $cat['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#F9A602">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                                                </svg>
                                            </a>
                                            <a href="?del_cat=<?= $cat['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#FF0000">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <?php
                        fetch_pages_count('cats');
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