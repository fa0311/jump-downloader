from lib.jumpplus_downloader import jumpplus_downloader

jpd = jumpplus_downloader()
jpd.auto_list_download(url="https://shonenjumpplus.com/episode/10833519556325021865", sleeptime=20, next=True, pdfConversion=True)
