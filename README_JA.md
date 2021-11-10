# jumpplus_downloader

## 注意

このレポジトリは不正ダウンロードを推進するものではありません  
インターネット環境の都合でジャンププラスのマンガが読めない方などに向けたプログラムです  
マンガをアーカイブしたり第三者に公開、アップロードする行為は遠慮してください

# cron

0 時 0 分にダウンロードしたマンガを削除する cron です
必ず登録してください

```cron
0 0 * * * cd php && sh delete.sh
```

# PHP

## インストール

```console
# GD ライブラリが必要です
$ sudo apt-get install php7.0-gd
```

## 使い方

```php
include('lib/jumpplus_downloader.php');
```

```php
$instance = new jumpplus_downloader();
$instance->auto_list_download("https://shonenjumpplus.com/episode/10833519556325021865", true, 1); //URL, 次の話をダウンロードするか(非推奨), 遅延(sec)
```

# Python
これはサポートしていません
## インストール

```console
$ git clone https://github.com/fa0311/jumpplus-downloader.git

$ cd jumpplus-downloader/py

$ sudo pip3 install -r requirements.txt
```

```console
# エラーが発生した場合は下記のコマンドを入力してください
$ sudo apt install python3-img2pdf python3-requests
```

## 使い方

```python
from lib.jumpplus_downloader import jumpplus_downloader

jpd = jumpplus_downloader()
jpd.auto_list_download(url="https://shonenjumpplus.com/episode/10833519556325021865", sleeptime=20, next=True, pdfConversion=True)
```

# License

jumpplus_downloader is under MIT License
