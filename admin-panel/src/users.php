<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
if (isset($_GET['page'])) {
    $page_number = $_GET['page'];
    get_specific_page($page_number, 'users');
} else {
    list_users();
}
include 'users_action.php';

?>

<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <div class="flex flex-col flex-wrap sm:flex-row ">
        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                        <?= $title ?>
                    </h2>
                    <form action="" method="POST">
                        <button type="submit" name="del_not_verified_users" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            حذف افرادی که شماره تلفنشان را تایید نکرده اند
                        </button>
                    </form>

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
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        حذف
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) { ?>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $user['id']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $user['name']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $user['userid']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php $username = $user['username'];
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
                                                <?php $phone = $user['phone'];
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
                                                <?php $userid = $user['userid'];
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
                                                    echo 'اشتراک ندارد';
                                                } ?>
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a href="?del_user=<?= $user['id'] ?>">
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
                fetch_pages_count('users');
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


<?php
// DELETE Not verified Users

if (isset($_POST['del_not_verified_users'])) {
    remove_not_verified_users();
} ?>