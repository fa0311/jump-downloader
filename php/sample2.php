<?php
set_time_limit(0);
include('lib/jumpplus_downloader.php');
$instance = new jumppuls_downloader();

/* json形式の情報をダウンロードしてlistにjsonデコード */
$instance->json_download("https://shonenjumpplus.com/episode/10834108156649530410");
echo "\n";
/*漫画のタイトル */
echo $instance->list["readableProduct"]["title"];
echo "\n";
/*次のエピソードのリンク */
echo $instance->list["readableProduct"]["nextReadableProductUri"];
echo "\n";
/*1ページ目のタイプ */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][2]["type"];
echo "\n";
/*1ページ目の画像の高さ */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][2]["height"];
echo "\n";
/*1ページ目の画像の幅 */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][2]["width"];
echo "\n";
/*1ページ目の画像URL */
echo $instance->list["readableProduct"]["pageStructure"]["pages"][2]["src"];