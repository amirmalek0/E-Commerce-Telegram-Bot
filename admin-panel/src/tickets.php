<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
include 'tickets_action.php';
if (isset($_GET['page'])) {
    $page_number = $_GET['page'];
    get_specific_page($page_number, 'tickets');
} else {
    list_tickets();
}

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
                            <thead>
                                <tr>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        شناسه
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        کاربر
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        پیام
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        تاریخ
                                    </th>

                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        مشاهده اطلاعات کاربر
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        پاسخ
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        حذف
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tickets as $ticket) { ?>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $ticket['id']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php user_info($ticket['userid']);
                                                echo $name; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap max-w-xs">
                                                <?= $ticket['msg']; ?>
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= jdate('Y/m/d-H:i:s', $ticket['date']) ?>
                                            </p>
                                        </td>



                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <span class="relative inline-block px-3 py-1 text-blue-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-blue-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        <a href="?userid=<?= $ticket['userid'] ?>">مشاهده اطلاعات کاربر</a>
                                                    </span>
                                                </span>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <span class="relative inline-block px-3 py-1 text-green-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        <a href="?send=<?= $ticket['userid'] ?>">ارسال پیام به کاربر</a>
                                                    </span>
                                                </span>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex">
                                                <a href="?del_ticket=<?= $ticket['id'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FF0000">
                                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                                        <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <?php
                        fetch_pages_count('tickets');
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