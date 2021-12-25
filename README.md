# jumpplus_downloader

[日本語](./README_JA.md)

## About

For Educational Purposes Only.  
Made on intent to read without depending on the Internet environment.  
Please DO NOT archive the manga or publish it to a third party, upload.

# Support

|            |  PHP  | Python |
| ---------- | ----- | ------ |
|  Download  | o     | o      |
|  Login     | x     | o      |

# PHP

## Installation

```console
# need GD library to run.
$ apt-get install php7.0-gd
```

## Using

```php
include('lib/jumpplus_downloader.php');

$instance = new jumpplus_downloader();
$instance->auto_list_download("https://shonenjumpplus.com/episode/10833519556325021865", true, 1); //URL, Download next episode(deprecated), Delay(sec)
```

# Python

## Installation

```console
$ git clone https://github.com/fa0311/jumpplus-downloader.git
$ cd jumpplus-downloader/py
$ sudo pip3 install -r requirements.txt
```

```console
# If you got an error to install, please use this command instead.
$ sudo apt install python3-img2pdf python3-requests
```

## Using

```python
from lib.jumpplus_downloader import jumpplus_downloader

jpd = jumpplus_downloader()
jpd.auto_list_download(url="https://shonenjumpplus.com/episode/10833519556325021865", sleeptime=20, next=True, pdfConversion=True)
```

# cron

This is a cron that deletes comics downloaded at 0:00:00.
Be sure to register.

```cron
0 0 * * * cd php && sh delete.sh
```

# License

jumpplus_downloader is under MIT License
