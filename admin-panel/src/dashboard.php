<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
?>
<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">

                <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
                    <div class="bg-blue-500 px-4 py-6 rounded-lg">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                            class="text-white w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg"
                            stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M14.5 9C14.5 9 13.7609 8 11.9999 8C8.49998 8 8.49998 12 11.9999 12C15.4999 12 15.5 16 12 16C10.5 16 9.5 15 9.5 15"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M12 7V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z"
                                    stroke="#ffffff" stroke-width="2"></path>
                            </g>
                        </svg>
                        <h2 class=" font-medium text-3xl text-white"><?= total_income() ?></h2>
                        <p class="leading-relaxed text-white">درآمد کل</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
                    <div class="bg-green-500 px-4 py-6 rounded-lg">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="text-white w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                        </svg>
                        <h2 class="font-medium text-3xl text-white"><?= users_count() ?></h2>
                        <p class="leading-relaxed text-white">تعداد کاربران</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
                    <div class="bg-yellow-400 px-4 py-6 rounded-lg">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="text-white w-12 h-12 mb-3 inline-block" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M23 17.91C23.02 18.66 22.82 19.37 22.46 19.98C22.26 20.34 21.99 20.6701 21.69 20.9401C21 21.5801 20.09 21.9701 19.08 22.0001C17.62 22.0301 16.33 21.2801 15.62 20.1301C15.24 19.5401 15.01 18.8301 15 18.0801C14.97 16.8201 15.53 15.6801 16.43 14.9301C17.11 14.3701 17.97 14.0201 18.91 14.0001C21.12 13.9501 22.95 15.7 23 17.91Z"
                                    stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M17.44 18.03L18.45 18.99L20.54 16.97" stroke="#ffffff" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M3.17004 7.43994L12 12.5499L20.77 7.46991" stroke="#ffffff" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 21.6099V12.5399" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M21.61 9.17V14.83C21.61 14.88 21.61 14.92 21.6 14.97C20.9 14.36 20 14 19 14C18.06 14 17.19 14.33 16.5 14.88C15.58 15.61 15 16.74 15 18C15 18.75 15.21 19.46 15.58 20.06C15.67 20.22 15.78 20.37 15.9 20.51L14.07 21.52C12.93 22.16 11.07 22.16 9.92999 21.52L4.59 18.56C3.38 17.89 2.39001 16.21 2.39001 14.83V9.17C2.39001 7.79 3.38 6.11002 4.59 5.44002L9.92999 2.48C11.07 1.84 12.93 1.84 14.07 2.48L19.41 5.44002C20.62 6.11002 21.61 7.79 21.61 9.17Z"
                                    stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <h2 class="title-font font-medium text-3xl text-white"><?= products_count() ?></h2>
                        <p class="leading-relaxed text-white">تعداد محصولات</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-wrap -m-4">

                <div class="p-6 md:w-1/2 sm:w-full w-full">
                    <div class="bg-white px-4 py-4 rounded-lg">

                        <h1 class="font-bold text-3xl text-gray-600 ">آخرین سفارشات</h1>


                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 pt-2 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>

                                            <th scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                                نام محصول خریداری شده
                                            </th>

                                            <th scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                                مبلغ
                                            </th>
                                            <th scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                                وضعیت
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php list_orders_limit5();
                                        foreach ($orders as $order) { ?>

                                        <tr>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p style="max-width:11rem" class="text-gray-900 whitespace-no-wrap">
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

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?= number_format($order['price']) . ' تومان'; ?>
                                                </p>
                                            </td>



                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php $status = $order['status'];
                                                        if ($status == 1) { ?>
                                                    <span
                                                        class="relative inline-block px-3 py-1 text-green-900 leading-tight">
                                                        <span aria-hidden="true"
                                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            تکمیل شده
                                                        </span>
                                                    </span>
                                                    <?php  } elseif ($status == 0) { ?>
                                                    <span
                                                        class="relative inline-block px-3 py-1 text-red-900 leading-tight">
                                                        <span aria-hidden="true"
                                                            class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
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


                                        </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>
                            <a href="orders.php">
                                <button type="submit" name="sta"
                                    class="mt-4 py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    مشاهده کل سفارشات
                                </button>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="p-6 md:w-1/2 sm:w-1/2 w-full">
                    <div class="bg-white px-4 py-4 rounded-lg">

                        <h1 class="font-bold text-3xl text-gray-600 ">تیکت های اخیر</h1>
                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>

                                            <th scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                                کاربر
                                            </th>
                                            <th scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                                پیام
                                            </th>
                                            <th scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                                پاسخ
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php list_tickets_limit5();
                                        foreach ($tickets as $ticket) { ?>

                                        <tr>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <a class="text-blue-600"
                                                        href="tickets.php?userid=<?= $ticket['userid'] ?>"><?php user_info($ticket['userid']);
                                                                                                                                    echo $name; ?></a>
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p style='max-width: 12rem' class="text-gray-900 whitespace-no-wrap">
                                                    <?= $ticket['msg']; ?>
                                                </p>
                                            </td>





                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <span
                                                        class="relative inline-block px-3 py-1 text-green-900 leading-tight">
                                                        <span aria-hidden="true"
                                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                            <a href="tickets.php?send=<?= $ticket['userid'] ?>">ارسال
                                                                پیام به کاربر</a>
                                                        </span>
                                                    </span>
                                                </p>
                                            </td>

                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <a href="tickets.php">
                                <button type="submit" name="sta"
                                    class="mt-4 py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    مشاهده کل تیکت ها
                                </button>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>