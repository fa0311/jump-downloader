<?php
/*応用編*/
set_time_limit(0);
include('lib/jumpplus_downloader.php');
/*1ページ目だけをダウンロードする */

echo "ダウンロードしたいマンガのURLを送信してください。\n";
$url = trim(fgets(STDIN));
$all = download_all_count($url);
print($all . "件検出しました。ダウンロードを開始します。\n");
$instance = new jumppuls($all);
$instance->auto_list_download($url);

function download_all_count($url,$all = 0)
{
    $instance = new jumppuls_downloader();
    $instance->json_download($url);
    print("「" . $instance->list["readableProduct"]["title"] . "」を検出しました。\n");
    if($instance->list["readableProduct"]["pageStructure"] !== null){
        $all += count($instance->list["readableProduct"]["pageStructure"]["pages"]);
    }
    if ($instance->list["readableProduct"]["nextReadableProductUri"] != null) {
        return download_all_count($instance->list["readableProduct"]["nextReadableProductUri"],$all);
    }
    return $all;
}

class jumppuls
{
    public function __construct($all){
        $this->time = time();
        $this->page = 0;
        $this->all = $all;
    }

    public function auto_list_download($url){
        $instance = new jumppuls_downloader();
        $instance->json_download($url);
        if (!file_exists($instance->list["readableProduct"]["title"])) {
            mkdir($instance->list["readableProduct"]["title"], 0755);
        }
        if($instance->list["readableProduct"]["pageStructure"] === null){
            return;
        }else{
            $this->page += count($instance->list["readableProduct"]["pageStructure"]["pages"]);
        }
        foreach ($instance->list["readableProduct"]["pageStructure"]["pages"] as $i => $page) {
            $instance->file = $i;
            if ($page["type"] == "main") {
                $instance->h = $page["height"];
                $instance->w = $page["width"];
                $instance->w_marge = $page["width"] / 4 % 8;
                $instance->download($page["src"]);
                $instance->processing();
                $instance->output("./" . $instance->list["readableProduct"]["title"] . "/");
            }
        }
        print("ダウンロード中です (" . $this->page . "/" . $this->all . ") 残り");
        print(date('H時間i分s秒', (time() - $this->time) / $this->page * ($this->all - $this->page)) . "\n");
        if ($instance->list["readableProduct"]["nextReadableProductUri"] != null) {
            $this->auto_list_download($instance->list["readableProduct"]["nextReadableProductUri"]);
        }
    }
}