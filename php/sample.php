<?php
set_time_limit(0);
include('lib/jumpplus_downloader.php');
$instance = new jumppuls_downloader();
$instance->auto_list_download("https://shonenjumpplus.com/episode/10834108156631749780", true);