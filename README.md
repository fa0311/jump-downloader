# jumppuls_downloader

ジャンププラスダウンローダー<br>

# 注意

このレポジトリは不正ダウンロードを推進するものではありません<br>

# import

GD ライブラリが必要です

```ubuntu
apt-get install php7.0-gd
```

jumppuls_downloader をロードします<br>

```php
include('jumppuls_downloader.php');
```

# use

```php
$instance->auto_list_download("https://shonenjumpplus.com/episode/10833519556325021865", true,1); //URL 次の話をダウンロードするか 遅延(sec)
```

# License

jumppuls_downloader is under MIT License
