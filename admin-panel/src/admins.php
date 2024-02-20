<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
list_admins();
include "admins_action.php";
?>
<?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>
    <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            هشدار
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>به منظور افزایش امنیت پنل مدیریتی ربات خود، یوزر جدیدی برای ادمین تعریف کنید و پس از وارد شدن با یوزر جدید،
                یوزر admin را پاک کنید.</p>
            <p>به هیچ عنوان از نام کاربری admin برای یوزر جدید استفاده نکنید.</p>
        </div>
    </div>
<?php
} ?>
<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <div class="flex flex-col flex-wrap sm:flex-row ">
        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                        <?= $title ?>
                    </h2>
                    <a href="?create_admin">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            افزودن ادمین
                        </button>
                    </a>
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
                                        یوزرنیم ادمین
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        حذف
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                                        تغییر رمز
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admins as $admin) { ?>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $admin['id']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $admin['username']; ?>
                                            </p>
                                        </td>


                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <?php if ($_SESSION['username'] == $admin['username']) {
                                                echo 'یوزری فعلی را نمی توانید حذف کنید';
                                            } else { ?>
                                                <a href="?del_admin=<?= $admin['id'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FF0000">
                                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                                        <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z" />
                                                    </svg>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <span class="relative inline-block px-3 py-1 text-red-900 leading-tight">
                                                <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                                </span>
                                                <a href="?change_pass=<?= $admin['id'] ?>">
                                                <span class="relative">
                                                    تغییر رمز عبور
                                                </span>
                                                </a>
                                            </span>
                                        </td>
                    </div>
                    </tr>
                <?php } ?>

                </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>

</div>
</div>