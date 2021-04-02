<?php

class jumpplus_downloader
{
    public function __construct()
    {
        $this->file = 0;
        $this->h = 1200;
        $this->w = 760;
    }


    public function auto_list_download($url, $next = false, $sleep = 0)
    {
        $this->json_download($url);
        if (!file_exists($this->list["readableProduct"]["title"])) {
            mkdir($this->list["readableProduct"]["title"], 0755);
        }
        foreach ($this->list["readableProduct"]["pageStructure"]["pages"] as $i => $page) {
            sleep($sleep);
            $this->file = $i;
            if ($page["type"] == "main") {
                $this->h = $page["height"];
                $this->w = $page["width"];
                $this->download($page["src"]);
                $this->processing();
                $this->output("./" . $this->list["readableProduct"]["title"] . "/");
            }
        }
        if ($this->list["readableProduct"]["nextReadableProductUri"] != null and $next) {
            $this->auto_list_download($this->list["readableProduct"]["nextReadableProductUri"], true);
        }
    }

    public function json_download($url)
    {
        $jsondata = file_get_contents($url . ".json");
        $this->list = json_decode($jsondata, true);
    }

    public function download($url)
    {
        $this->img = imagecreatefromjpeg($url);
    }

    public function processing()
    {
        $this->dst_image = imagecreatetruecolor($this->w - 6 * 4, $this->h - 4 * 4);
        $width = $this->w / 4 - 6;
        $height = $this->h / 4 - 4;
        for ($i = 0; $i <= 3; $i++) {
            for ($ii = 0; $ii <= 3; $ii++) {
                imagecopyresampled($this->dst_image, $this->img, $width * $i, $height * $ii, $width * $ii, $height * $i, $width, $height, $width, $height);
            }
        }
    }
    public function output($file = "./")
    {
        imagepng($this->dst_image, $file . $this->file . '.png');
        $this->file++;
    }
}