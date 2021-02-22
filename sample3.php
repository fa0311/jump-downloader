<?php
/*応用編*/
set_time_limit(0);
include('jumppuls_downloader.php');
/*1ページ目だけをダウンロードする */
download("https://shonenjumpplus.com/episode/10833519556325021865");

function download($url)
{
    $instance = new jumppuls_downloader();
    $instance->json_download($url);
    if (!file_exists("output")) {
        mkdir("output", 0755);
    }
    $page = $instance->list["readableProduct"]["pageStructure"]["pages"][0];
    $instance->file = $instance->list["readableProduct"]["title"];
    if ($page["type"] == "main") {
        $instance->h = $page["height"];
        $instance->w = $page["width"];
        $instance->download($page["src"]);
        $instance->processing();
        $instance->output("./output/");
    }

    if ($instance->list["readableProduct"]["nextReadableProductUri"] != null) {
        download($instance->list["readableProduct"]["nextReadableProductUri"]);
    }
}