from lib.jumpplus_downloader import jumpplus_downloader

url = "https://shonenjumpplus.com/episode/13932016480028738423"

jumpplus_downloader().login("example@example.com", "password").auto_list_download(url=url, sleeptime=0, pdfConversion=True)