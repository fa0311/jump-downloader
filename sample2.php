<?php
set_time_limit(0);
include('jumppuls_downloader.php');
$instance = new jumppuls_downloader();

/* json形式の情報をダウンロードしてlistにjsonデコード */
$instance->json_download("https://shonenjumpplus.com/episode/10833519556325021865");
echo "\n";
/*漫画のタイトル */
echo $instance->list["readableProduct"]["title"];
echo "\n";
/*次のエピソードのリンク */
echo $instance->list["readableProduct"]["nextReadableProductUri"];
echo "\n";
/*1ページ目のタイプ */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][0]["type"];
echo "\n";
/*1ページ目の画像の高さ */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][0]["height"];
echo "\n";
/*1ページ目の画像の幅 */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][0]["width"];
echo "\n";
/*1ページ目の画像URL */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][0]["src"];