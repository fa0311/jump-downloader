from lib.jumpplus_downloader import jumpplus_downloader

url = "https://shonenjumpplus.com/episode/10833519556325021865"


while url:
    jpd = jumpplus_downloader(dir="./")
    jpd.auto_list_download(url=url, sleeptime=0, pdfConversion=True)
    url = jpd.list["readableProduct"]["nextReadableProductUri"]
    del jpd
