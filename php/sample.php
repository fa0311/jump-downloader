<?php
set_time_limit(0);
include('jumpplus_downloader.php');
$instance = new jumppuls_downloader();
/*ずれる場合は以下を各自で値を調整して指定してください
$instance->h_marge = 4;
$instance->w_marge = 6;
*/
$instance->auto_list_download("https://shonenjumpplus.com/episode/10833519556325021865", true);