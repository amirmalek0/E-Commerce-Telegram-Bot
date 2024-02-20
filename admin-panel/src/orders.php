<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['page'])) {
    $page_number = $_GET['page'];
    get_specific_page($page_number, 'orders');
} else {
    list_orders();
}
include 'orders_action.php';

?>

<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <div class="flex flex-col flex-wrap sm:flex-row ">
        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                        <?= $title ?>
                    </h2>
                    <!-- <a href="?create_product">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            خروجی سفارشات
                        </button>
                    </a> -->
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
                                        نام محصول خریداری شده
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        آیدی کاربر
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        مبلغ
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        کد پیگیری
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        نوع سفارش
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        وضعیت
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        تاریخ
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        اطلاعات خریدار
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        حذف
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) { ?>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $order['id']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p style='max-width: 8rem;' class="text-gray-900 whitespace-no-wrap">
                                                <?php
                                                if ($order['type'] == 'file') {
                                                    fetch_product_name($order['productid']);
                                                } elseif ($order['type'] == 'plan') {
                                                    fetch_plan_name($order['productid']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <a class='text-blue-600' href="?userid=<?= $order['userid'] ?>"><?= $order['userid']; ?></a>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= number_format($order['price']) . ' تومان'; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $order['transcode']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <?php if ($order['type'] == 'file') { ?>
                                                <span class="relative inline-block px-3 py-1 text-blue-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-blue-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        خرید فایل
                                                    </span>
                                                </span>

                                            <?php } elseif ($order['type'] == 'plan') { ?>

                                                <span class="relative inline-block px-3 py-1 text-yellow-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        خرید اشتراک
                                                    </span>
                                                </span>
                                            <?php } else {
                                                echo '-';
                                            } ?>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php $status = $order['status'];
                                                if ($status == 1) { ?>
                                                    <span class="relative inline-block px-3 py-1 text-green-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            تکمیل شده
                                                        </span>
                                                    </span>
                                                <?php  } elseif ($status == 0) { ?>
                                                    <span class="relative inline-block px-3 py-1 text-red-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            در انتظار پرداخت
                                                        </span>
                                                    </span>
                                                <?php } else {
                                                    echo '-';
                                                } ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= jdate('Y/m/d-H:i:s', $order['date']) ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <span class="relative inline-block px-3 py-1 text-blue-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-blue-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        <a href="?userid=<?= $order['userid'] ?>">مشاهده اطلاعات</a>
                                                    </span>
                                                </span>
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                <a href="?del_order=<?= $order['id'] ?>">
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
                        fetch_pages_count('orders');
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