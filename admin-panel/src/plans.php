<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
list_plans();
include 'plans_action.php';
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
                                                        <?php $i=1; foreach ($plans as $plan) { ?>
                                                            <div class="relative mb-10 border-b-2 border-indigo-500 pb-10">
                                                                <label for="name" class="text-gray-700 block py-2 text-lg">
                                                                    <?=' پلن شماره '. $i;?>
                                                                </label>
                                                                <label for="name[]" class="text-gray-700 block py-2">نام پلن</label>
                                                                <input type="text" name="name[]" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="<?= $plan['name']; ?>" />
                                                                <label for="price[]" class="text-gray-700 block py-2">قیمت(به تومان)</label>
                                                                <input type="text" name="price[]" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="<?= $plan['price']; ?>" />
                                                                <label for="day[]" class="text-gray-700 block py-2">تعداد روز </label>
                                                                <input type="text" name="day[]" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="<?= $plan['days']; ?>" />
                                                                <input type="hidden" name="id[]" value="<?= $plan['id']; ?>" />
                                                            </div>
                                                        <?php $i++;} ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <button type="submit" name="plan_update" class="min-w-max fixed bottom-5 left-10 py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-1/5 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    به روز رسانی
                                </button>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>