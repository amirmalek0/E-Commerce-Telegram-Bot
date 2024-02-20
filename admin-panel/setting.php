<?php
$title = 'تنظیمات';
include 'src/head.php'; ?>

<body dir="rtl" class="bg-gray-100 dark:bg-gray-800 rounded-2xl h-screen overflow-hidden relative font-body">
    <div class="flex items-start justify-between">
        <?php include 'src/nav.php'; ?>

        <div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
            <?php include 'src/header.php'; ?>
            <?php include 'src/setting.php'; ?>
        </div>
    </div>
<?php include 'src/footer.php'; ?>
