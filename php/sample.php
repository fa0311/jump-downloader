<?php
set_time_limit(0);
include('lib/jumpplus_downloader.php');
$url = "https://shonenjumpplus.com/episode/10833519556325021912";

while ($url) {
    $instance = new jumppuls_downloader();
    $instance->auto_list_download($url, false, 0);
    $url = $instance->list["readableProduct"]["nextReadableProductUri"];
    unset($instance);
}