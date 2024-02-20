<?php
if(!defined('VIP')) {
    die('Direct access not permitted');
 }
?>
<header>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</header>
<div class="page-wrapper">
<div class="custom-modal-fail">
        <div class="danger danger-animation icon-top">
            <svg fill="#ffffff" width="64px" height="64px" viewBox="0 -8 528 528" xmlns="http://www.w3.org/2000/svg"
                stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M264 456Q210 456 164 429 118 402 91 356 64 310 64 256 64 202 91 156 118 110 164 83 210 56 264 56 318 56 364 83 410 110 437 156 464 202 464 256 464 310 437 356 410 402 364 429 318 456 264 456ZM264 288L328 352 360 320 296 256 360 192 328 160 264 224 200 160 168 192 232 256 168 320 200 352 264 288Z">
                    </path>
                </g>
            </svg>
        </div>
        <div class="danger border-bottom"></div>
        <div class="content">
            <h1>تراکنش ناموفق</h1>
            <p>خطایی در هنگام پرداخت بوجود آمد . لطفا دوباره تلاش کنید . در صورت کسر وجه ، در عرض 24 ساعت به حساب شما برگشت داده می شود</p>
            <p>کد خطا = <?=$result['Status']?></p>
        </div>
    </div>
</div>