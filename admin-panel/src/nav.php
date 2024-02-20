<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
$dashboard = 'داشبورد مدیریتی';
$categories = 'دسته بندی ها';
$users = 'کاربران';
$setting = 'تنظیمات';
$plan = 'اشتراک وی آی پی';
$product = 'محصولات';
$sendtoall = 'ارسال همگانی';
$orders = 'سفارشات';
$tickets = 'تیکت ها';
$admins = 'مدیریت ادمین ها';
?>


<div class="h-screen hidden lg:block my-4 mr-4 shadow-lg relative w-80">
    <div class="bg-white h-full rounded-2xl dark:bg-gray-700 overflow-y-auto">
        <div class="flex items-center justify-center pt-6">
            <svg width="50" height="50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="48" fill="white" fill-opacity="0.01" />
                <rect x="9" y="18" width="30" height="24" rx="2" fill="#2F88FF" stroke="#000000" stroke-width="4" />
                <circle cx="17" cy="26" r="2" fill="white" />
                <circle cx="31" cy="26" r="2" fill="white" />
                <path d="M20 32C18.8954 32 18 32.8954 18 34C18 35.1046 18.8954 36 20 36V32ZM28 36C29.1046 36 30 35.1046 30 34C30 32.8954 29.1046 32 28 32V36ZM20 36H28V32H20V36Z" fill="white" />
                <path d="M24 10V18" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 26V34" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M44 26V34" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                <circle cx="24" cy="8" r="2" stroke="#000000" stroke-width="4" />
            </svg>
        </div>
        <nav class="mt-6">
            <div>
                <a class="<?php if ($title == $dashboard) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./index.php">
                    <span class="text-left">
                        <svg fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 102.64 102.641" xml:space="preserve">
                            <g>
                                <path id="path2165" d="M50.051,102.606c-0.708-0.155-22.016-17.029-21.887-17.332c0.116-0.271,5.177-4.323,30.34-24.286
		l13.38-10.617L71.745,48.9c-0.505-5.367-4.002-11.184-8.607-14.314c-3.496-2.375-6.525-3.37-10.772-3.534
		c-4.746-0.183-8.378,0.759-11.971,3.107c-5.415,3.537-8.855,9.26-9.37,15.584l-0.139,1.71l8.837,7.118
		c4.98,4.011,8.788,7.232,8.725,7.38c-0.137,0.323-21.953,17.682-22.343,17.777C25.866,83.787,3.971,66.811,2.307,65.275
		c-0.922-0.85-1.862-5.537-2.21-11.027c-0.806-12.682,3.535-25.966,11.657-35.673C20.028,8.688,31.087,2.442,43.901,0.42
		c3.566-0.563,11.393-0.56,14.853,0.004C73.199,2.78,85.209,10.201,93.38,21.819c7.971,11.332,11.023,25.952,8.264,39.562
		c-0.395,1.946-0.643,2.68-1.036,3.057c-0.815,0.785-49.415,38.022-49.788,38.149C50.636,102.65,50.29,102.658,50.051,102.606
		L50.051,102.606z" />
                            </g>
                        </svg>
                    </span>
                    <span class="mx-4  font-normal text-lg">
                        <?= $dashboard ?>
                    </span>
                </a>

                <a class="<?php if ($title == $product) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./products.php">
                    <span class="text-left">
                    <svg width="20" height="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="none" fill-rule="evenodd"> <path d="m0 0h32v32h-32z"></path> <path d="m19 1.73205081 7.8564065 4.53589838c1.8564064 1.07179677 3 3.05255889 3 5.19615241v9.0717968c0 2.1435935-1.1435936 4.1243556-3 5.1961524l-7.8564065 4.5358984c-1.8564065 1.0717968-4.1435935 1.0717968-6 0l-7.85640646-4.5358984c-1.85640646-1.0717968-3-3.0525589-3-5.1961524v-9.0717968c0-2.14359352 1.14359354-4.12435564 3-5.19615241l7.85640646-4.53589838c1.8564065-1.07179677 4.1435935-1.07179677 6 0zm-4.791172 1.6195783-.208828.11247251-7.85640646 4.53589838c-1.17246724.67692428-1.91843145 1.89771701-1.99370617 3.2394348l-.00629383.2246668v9.0717968c0 1.3538485.68425541 2.6102689 1.80857977 3.3463176l.19142023.117784 7.85640646 4.5358984c1.1688485.674835 2.5938608.7123258 3.791172.1124725l.208828-.1124725 7.8564065-4.5358984c1.1724672-.6769243 1.9184314-1.897717 1.9937061-3.2394348l.0062939-.2246668v-9.0717968c0-1.3538485-.6842555-2.61026887-1.8085798-3.34631759l-.1914202-.11778401-7.8564065-4.53589838c-1.1688485-.67483501-2.5938608-.71232584-3.791172-.11247251zm8.8114886 8.20574889c.259282.4876385.0741624 1.0931371-.4134761 1.3524191l-5.6183556 2.9868539.0000413 6.7689186c0 .5522848-.4477152 1-1 1-.5522847 0-1-.4477152-1-1l-.0000413-6.7689186-5.61827304-2.9868539c-.48763849-.259282-.67275801-.8647806-.41347603-1.3524191.25928199-.4876385.86478067-.672758 1.35241917-.4134761l5.6793299 3.0187491 5.6794125-3.0187491c.4876385-.2592819 1.0931372-.0741624 1.3524192.4134761z" fill="currentColor" fill-rule="nonzero"></path> </g> </g></svg>                                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $product ?>

                    </span>
                </a>
                <a class="<?php if ($title == $categories) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./categories.php">
                    <span class="text-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10C8.20914 10 10 8.20914 10 6C10 3.79086 8.20914 2 6 2C3.79086 2 2 3.79086 2 6C2 8.20914 3.79086 10 6 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 22C20.2091 22 22 20.2091 22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </span>
                    <span class="mx-4 text-sm font-normal">
                        <?= $categories ?>
                    </span>
                </a>
                <a class="<?php if ($title == $orders) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./orders.php">
                    <span class="text-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 19C9 19.75 8.79 20.46 8.42 21.06C7.73 22.22 6.46 23 5 23C3.54 23 2.27 22.22 1.58 21.06C1.21 20.46 1 19.75 1 19C1 16.79 2.79 15 5 15C7.21 15 9 16.79 9 19Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3.44141 18.9995L4.43141 19.9895L6.56141 18.0195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.7514 7.04997C17.5114 7.00997 17.2614 6.99998 17.0014 6.99998H7.00141C6.72141 6.99998 6.45141 7.01998 6.19141 7.05998C6.33141 6.77998 6.53141 6.52001 6.77141 6.28001L10.0214 3.02C11.3914 1.66 13.6114 1.66 14.9814 3.02L16.7314 4.78996C17.3714 5.41996 17.7114 6.21997 17.7514 7.04997Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12V17C22 20 20 22 17 22H7.63C7.94 21.74 8.21 21.42 8.42 21.06C8.79 20.46 9 19.75 9 19C9 16.79 7.21 15 5 15C3.8 15 2.73 15.53 2 16.36V12C2 9.28 3.64 7.38 6.19 7.06C6.45 7.02 6.72 7 7 7H17C17.26 7 17.51 7.00999 17.75 7.04999C20.33 7.34999 22 9.26 22 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12.5H19C17.9 12.5 17 13.4 17 14.5C17 15.6 17.9 16.5 19 16.5H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </span>
                    <span class="mx-4 text-sm font-normal">
                        <?= $orders ?>
                    </span>
                </a>

                <a class="<?php if ($title == $users) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./users.php">
                    <span class="text-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4 21V18.5C4 15.4624 6.46243 13 9.5 13H14.5C17.5376 13 20 15.4624 20 18.5V21M8 21V18M16 21V18M16 6.5C16 8.70914 14.2091 10.5 12 10.5C9.79086 10.5 8 8.70914 8 6.5C8 4.29086 9.79086 2.5 12 2.5C14.2091 2.5 16 4.29086 16 6.5Z" stroke="currentColor" stroke-linecap="round" stroke-width="1.4"></path></g></svg>                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $users ?>

                    </span>
                </a>
                <a class="<?php if ($title == $setting) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./setting.php">
                    <span class="text-left">
                        <svg width="20" height="20" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M600.704 64a32 32 0 0 1 30.464 22.208l35.2 109.376c14.784 7.232 28.928 15.36 42.432 24.512l112.384-24.192a32 32 0 0 1 34.432 15.36L944.32 364.8a32 32 0 0 1-4.032 37.504l-77.12 85.12a357.12 357.12 0 0 1 0 49.024l77.12 85.248a32 32 0 0 1 4.032 37.504l-88.704 153.6a32 32 0 0 1-34.432 15.296L708.8 803.904c-13.44 9.088-27.648 17.28-42.368 24.512l-35.264 109.376A32 32 0 0 1 600.704 960H423.296a32 32 0 0 1-30.464-22.208L357.696 828.48a351.616 351.616 0 0 1-42.56-24.64l-112.32 24.256a32 32 0 0 1-34.432-15.36L79.68 659.2a32 32 0 0 1 4.032-37.504l77.12-85.248a357.12 357.12 0 0 1 0-48.896l-77.12-85.248A32 32 0 0 1 79.68 364.8l88.704-153.6a32 32 0 0 1 34.432-15.296l112.32 24.256c13.568-9.152 27.776-17.408 42.56-24.64l35.2-109.312A32 32 0 0 1 423.232 64H600.64zm-23.424 64H446.72l-36.352 113.088-24.512 11.968a294.113 294.113 0 0 0-34.816 20.096l-22.656 15.36-116.224-25.088-65.28 113.152 79.68 88.192-1.92 27.136a293.12 293.12 0 0 0 0 40.192l1.92 27.136-79.808 88.192 65.344 113.152 116.224-25.024 22.656 15.296a294.113 294.113 0 0 0 34.816 20.096l24.512 11.968L446.72 896h130.688l36.48-113.152 24.448-11.904a288.282 288.282 0 0 0 34.752-20.096l22.592-15.296 116.288 25.024 65.28-113.152-79.744-88.192 1.92-27.136a293.12 293.12 0 0 0 0-40.256l-1.92-27.136 79.808-88.128-65.344-113.152-116.288 24.96-22.592-15.232a287.616 287.616 0 0 0-34.752-20.096l-24.448-11.904L577.344 128zM512 320a192 192 0 1 1 0 384 192 192 0 0 1 0-384zm0 64a128 128 0 1 0 0 256 128 128 0 0 0 0-256z" />
                        </svg>
                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $setting ?>

                    </span>
                </a>
                <a class="<?php if ($title == $plan) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./plans.php">
                    <span class="text-left">
                    <svg fill="currentColor" width="20" height="20" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="a"></g> <g id="b"></g> <g id="c"></g> <g id="d"></g> <g id="e"></g> <g id="f"></g> <g id="g"></g> <g id="h"></g> <g id="i"></g> <g id="j"></g> <g id="k"> <path d="M50.51,11.11c-.55-.78-1.46-1.25-2.42-1.25H16.37c-.95,0-1.85,.46-2.42,1.22L4.43,23.94c-.64,.87-.56,2.06,.19,2.83l25.95,26.77c.74,.76,1.97,.85,2.85,0l25.95-26.77c.74-.77,.84-1.96,.22-2.83l-9.08-12.83Zm-10.44,15.24l-8.05,24-7.61-24h15.66Zm-15.21-2l7.37-11.62,7.4,11.62h-14.77Zm9.19-12.49h13.39l-6.07,11.5-7.32-11.5Zm-10.93,11.5l-6.1-11.5h13.39l-7.29,11.5Zm6.64,26.47L6.99,26.35h15.32l7.45,23.48Zm12.42-23.48h14.82l-22.67,23.4,7.85-23.4Zm.94-2l6.11-11.58,8.2,11.58h-14.31ZM15.22,12.73l6.17,11.62H6.62L15.22,12.73Z"></path> </g> <g id="l"></g> <g id="m"></g> <g id="n"></g> <g id="o"></g> <g id="p"></g> <g id="q"></g> <g id="r"></g> <g id="s"></g> <g id="t"></g> <g id="u"></g> <g id="v"></g> <g id="w"></g> <g id="x"></g> <g id="y"></g> <g id="a`"></g> <g id="aa"></g> <g id="ab"></g> <g id="ac"></g> <g id="ad"></g> <g id="ae"></g> <g id="af"></g> <g id="ag"></g> <g id="ah"></g> <g id="ai"></g> <g id="aj"></g> <g id="ak"></g> <g id="al"></g> <g id="am"></g> <g id="an"></g> <g id="ao"></g> <g id="ap"></g> <g id="aq"></g> <g id="ar"></g> <g id="as"></g> <g id="at"></g> <g id="au"></g> <g id="av"></g> <g id="aw"></g> <g id="ax"></g> </g></svg>                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $plan ?>
                    </span>
                </a>

                <a class="<?php if ($title == $sendtoall) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./sta.php">
                    <span class="text-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.39999 6.32003L15.89 3.49003C19.7 2.22003 21.77 4.30003 20.51 8.11003L17.68 16.6C15.78 22.31 12.66 22.31 10.76 16.6L9.91999 14.08L7.39999 13.24C1.68999 11.34 1.68999 8.23003 7.39999 6.32003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.11 13.6501L13.69 10.0601" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $sendtoall ?>
                    </span>
                </a>
                <a class="<?php if ($title == $tickets) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./tickets.php">
                    <span class="text-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 8H16M8 12H13M3 10C3 4.64706 5.11765 3 12 3C18.8824 3 21 4.64706 21 10C21 15.3529 18.8824 17 12 17C11.6592 17 11.3301 16.996 11.0124 16.9876L7 21V16.4939C4.0328 15.6692 3 13.7383 3 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $tickets ?>
                    </span>
                </a>
                <a class="<?php if ($title == $admins) {
                                echo "w-full font-thin text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-l from-white to-blue-100 border-l-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-l-4 border-blue-500";
                            } else {
                                echo "w-full font-thin text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500";
                            } ?>" href="./admins.php">
                    <span class="text-left">
<svg fill="currentColor" height="20" width="20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 474.565 474.565" xml:space="preserve" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M255.204,102.3c-0.606-11.321-12.176-9.395-23.465-9.395C240.078,95.126,247.967,98.216,255.204,102.3z"></path> <path d="M134.524,73.928c-43.825,0-63.997,55.471-28.963,83.37c11.943-31.89,35.718-54.788,66.886-63.826 C163.921,81.685,150.146,73.928,134.524,73.928z"></path> <path d="M43.987,148.617c1.786,5.731,4.1,11.229,6.849,16.438L36.44,179.459c-3.866,3.866-3.866,10.141,0,14.015l25.375,25.383 c1.848,1.848,4.38,2.888,7.019,2.888c2.61,0,5.125-1.04,7.005-2.888l14.38-14.404c2.158,1.142,4.55,1.842,6.785,2.827 c0-0.164-0.016-0.334-0.016-0.498c0-11.771,1.352-22.875,3.759-33.302c-17.362-11.174-28.947-30.57-28.947-52.715 c0-34.592,28.139-62.739,62.723-62.739c23.418,0,43.637,13.037,54.43,32.084c11.523-1.429,22.347-1.429,35.376,1.033 c-1.676-5.07-3.648-10.032-6.118-14.683l14.396-14.411c1.878-1.856,2.918-4.38,2.918-7.004c0-2.625-1.04-5.148-2.918-7.004 l-25.361-25.367c-1.94-1.941-4.472-2.904-7.003-2.904c-2.532,0-5.063,0.963-6.989,2.904l-14.442,14.411 c-5.217-2.764-10.699-5.078-16.444-6.825V9.9c0-5.466-4.411-9.9-9.893-9.9h-35.888c-5.451,0-9.909,4.434-9.909,9.9v20.359 c-5.73,1.747-11.213,4.061-16.446,6.825L75.839,22.689c-1.942-1.941-4.473-2.904-7.005-2.904c-2.531,0-5.077,0.963-7.003,2.896 L36.44,48.048c-1.848,1.864-2.888,4.379-2.888,7.012c0,2.632,1.04,5.148,2.888,7.004l14.396,14.403 c-2.75,5.218-5.063,10.708-6.817,16.438H23.675c-5.482,0-9.909,4.441-9.909,9.915v35.889c0,5.458,4.427,9.908,9.909,9.908H43.987z"></path> <path d="M354.871,340.654c15.872-8.705,26.773-25.367,26.773-44.703c0-28.217-22.967-51.168-51.184-51.168 c-9.923,0-19.118,2.966-26.975,7.873c-4.705,18.728-12.113,36.642-21.803,52.202C309.152,310.022,334.357,322.531,354.871,340.654z "></path> <path d="M460.782,276.588c0-5.909-4.799-10.693-10.685-10.693H428.14c-1.896-6.189-4.411-12.121-7.393-17.75l15.544-15.544 c2.02-2.004,3.137-4.721,3.137-7.555c0-2.835-1.118-5.553-3.137-7.563l-27.363-27.371c-2.08-2.09-4.829-3.138-7.561-3.138 c-2.734,0-5.467,1.048-7.547,3.138l-15.576,15.552c-5.623-2.982-11.539-5.481-17.751-7.369v-21.958 c0-5.901-4.768-10.685-10.669-10.685H311.11c-2.594,0-4.877,1.04-6.739,2.578c3.26,11.895,5.046,24.793,5.046,38.552 c0,8.735-0.682,17.604-1.956,26.423c7.205-2.656,14.876-4.324,22.999-4.324c36.99,0,67.086,30.089,67.086,67.07 c0,23.637-12.345,44.353-30.872,56.303c13.48,14.784,24.195,32.324,31.168,51.976c1.148,0.396,2.344,0.684,3.54,0.684 c2.733,0,5.467-1.04,7.563-3.13l27.379-27.371c2.004-2.004,3.106-4.721,3.106-7.555s-1.102-5.551-3.106-7.563l-15.576-15.552 c2.982-5.621,5.497-11.555,7.393-17.75h21.957c2.826,0,5.575-1.118,7.563-3.138c2.004-1.996,3.138-4.72,3.138-7.555 L460.782,276.588z"></path> <path d="M376.038,413.906c-16.602-48.848-60.471-82.445-111.113-87.018c-16.958,17.958-37.954,29.351-61.731,29.351 c-23.759,0-44.771-11.392-61.713-29.351c-50.672,4.573-94.543,38.17-111.145,87.026l-9.177,27.013 c-2.625,7.773-1.368,16.338,3.416,23.007c4.783,6.671,12.486,10.631,20.685,10.631h315.853c8.215,0,15.918-3.96,20.702-10.631 c4.767-6.669,6.041-15.234,3.4-23.007L376.038,413.906z"></path> <path d="M120.842,206.782c0,60.589,36.883,125.603,82.352,125.603c45.487,0,82.368-65.014,82.368-125.603 C285.563,81.188,120.842,80.939,120.842,206.782z"></path> </g> </g></svg>                                    </span>
                    <span class="mx-4 text-sm font-normal">
                    <?= $admins ?>
                    </span>
                </a>
            </div>
        </nav>
    </div>
</div>