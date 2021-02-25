# jumppuls_downloader

ジャンププラスダウンローダー<br>

# 注意

このレポジトリは不正ダウンロードを推進するものではありません<br>

# PHP

GD ライブラリが必要です

```ubuntu
apt-get install php7.0-gd
```

jumppuls_downloader をロードします<br>

```php
include('jumppuls_downloader.php');
```



```php
$instance = new jumppuls_downloader();
$instance->auto_list_download("https://shonenjumpplus.com/episode/10833519556325021865", true,1); //URL 次の話をダウンロードするか 遅延(sec)
```

# Python
There are more dependencies in the Python version.  The following is a list.  
•PIL : convert images.  
•requests : Download images.  
•BytesIO : convert images.  
•img2pdf : pdf conversion.  
  
You can install these libraries using following commands.  
-
```bash
sudo pip3 install img2pdf requests pillow  
```
If you got an error to install, Please use this command instead.  
```bash
sudo apt install python3-img2pdf python3-pillow python3-requests  
```
<br>
Load jumpplus_downloader and Create an instance.

```python
from jumpplus_downloader import  jumpplus_downloader
jumpplus_downloader=jumpplus_downloader()
```

```python
jumpplus_downloader.auto_list_download(url="https://shonenjumpplus.com/episode/10833519556325021865",sleeptime=20,next=True,pdfConversion=True)
```



# License

jumppuls_downloader is under MIT License
