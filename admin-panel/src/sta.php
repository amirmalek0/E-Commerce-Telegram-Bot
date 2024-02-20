<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
include 'sta_action.php';
?>

<div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
    <div class="flex flex-col flex-wrap sm:flex-row ">
        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                        <?=$title?>
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
                                                    <div class="w-full">
                                                        <div class="w-full">
                                                            <label for="msg" class="text-gray-700 block py-2">
                                                                متن پیام
                                                            </label>
                                                            <textarea name="msg" rows="5" cols="50"
                                                                class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                                value=""></textarea>
                                                            <button type="submit" name="sta"
                                                                class="min-w-max py-2 px-4 my-3  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/5 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                                ارسال پیام به تمامی کاربران
                                                            </button>
                                                            <button type="submit" name="stvip"
                                                                class="min-w-max py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/5 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                                ارسال پیام فقط به اعضای ویژه
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>