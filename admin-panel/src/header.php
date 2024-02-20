    <!-- Header -->
    <?php
    if (!defined('INDEX')) {
        die('403-Forbidden Access');
    }
    ?>
    <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
        <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
            <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                    <div class="relative flex items-center w-full lg:w-64 h-full group">
                    <details class="dropdown">
    <summary role="button">
      <a class="button">
      منوی مدیریت
      <svg class="w-4 h-4 mr-2 inline-block" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>  
      </a>
    </summary>
    <ul>
      <li><a href="./index.php"><?=$dashboard?></a></li>
      <li><a href="./categories.php"><?=$categories?></a></li>
      <li><a href="./users.php"><?=$users?></a></li>
      <li><a href="./setting.php"><?=$setting?></a></li>
      <li><a href="./plans.php"><?=$plan?></a></li>
      <li><a href="./products.php"><?=$product?></a></li>
      <li><a href="./sta.php"><?=$sendtoall?></a></li>
      <li><a href="./orders.php"><?=$orders?></a></li>
      <li><a href="./tickets.php"><?=$tickets?></a></li>
      <li><a href="./admins.php"><?=$admins?></a></li>

  </ul>
</details>

                    </div>
                </div>
                <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                    <a class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 transition-colors duration-200 flex items-center py-2"
                        href="?logout">
                        <svg width="30" height="30" viewBox="0 0 24.00 24.00" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"
                            stroke="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                stroke="#CCCCCC" stroke-width="1.488"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>Logout</title>
                                <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="System" transform="translate(-912.000000, -240.000000)">
                                        <g id="exit_door_fill" transform="translate(912.000000, 240.000000)">
                                            <path
                                                d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z"
                                                id="MingCute" fill-rule="nonzero"> </path>
                                            <path
                                                d="M15.5409,3 C15.2969,3.30307 15.1204,3.64255 15.0116,3.99827 L14.3801,3.99827 C12.7233,3.99827 11.3801,5.34142 11.3801,6.99827 C11.3801,8.65513 12.7233,9.99827 14.3801,9.99827 L15.0105,9.99827 C15.1494,10.4543 15.3993,10.8837 15.7602,11.244 C16.3764,11.8594 17.1934,12.151 18,12.119 L18,19 L20,19 C20.5523,19 21,19.4477 21,20 C21,20.5523 20.5523,21 20,21 L4,21 C3.44772,21 3,20.5523 3,20 C3,19.4477 3.44772,19 4,19 L4,5 C4,3.89543 4.89543,3 6,3 L15.5409,3 Z M13.5,13 C12.6716,13 12,13.6716 12,14.5 C12,15.3284 12.6716,16 13.5,16 C14.3284,16 15,15.3284 15,14.5 C15,13.6716 14.3284,13 13.5,13 Z M18.5873,4.17156 L20.7072,6.29149 C21.0975,6.68184 21.0977,7.31465 20.7077,7.70525 L18.5877,9.82799 C18.1974,10.2188 17.5642,10.2192 17.1735,9.82891 C16.7827,9.43864 16.7823,8.80548 17.1725,8.4147 L17.5884,7.99827 L14.3801,7.99827 C13.8278,7.99827 13.3801,7.55056 13.3801,6.99827 C13.3801,6.44599 13.8278,5.99827 14.3801,5.99827 L17.5855,5.99827 L17.173,5.58577 C16.7825,5.19524 16.7825,4.56208 17.173,4.17156 C17.5636,3.78103 18.1967,3.78103 18.5873,4.17156 Z"
                                                id="形状" fill="#F44336"> </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span class="mx-4 min-w-max	">
                            خروج از پنل
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->