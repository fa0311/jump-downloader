import requests, json, os, time
from PIL import Image
from io import BytesIO
import img2pdf

class jumpplus_downloader:
    def __init__(self):
        self.file=0
        self.h=1200
        self.w=760

    def auto_list_download(self, url, next=False, sleeptime=20,pdfConversion=True):
        self.json_download(url)
        self.file=0
        if os.path.isdir(self.list["readableProduct"]["title"])!=True:
            os.mkdir(self.list["readableProduct"]["title"])
        for page in self.list["readableProduct"]["pageStructure"]["pages"]:
            time.sleep(sleeptime)
            if page["type"]=="main":
                self.h=page["height"]
                self.w=page["width"]
                self.download(page["src"],False)
                self.processing()
                self.output("./"+self.list["readableProduct"]["title"]+"/")
        if pdfConversion:
            self.convertToPdf()
        if self.list["readableProduct"]["nextReadableProductUri"]!=None and next==True:
            self.auto_list_download(self.list["readableProduct"]["nextReadableProductUri"],True)
                

    def json_download(self,url):
        #Counterfeit User agent for absolutely successfully connection.
        session=requests.session()
        headers={"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36"}
        json_data=session.get(url+".json",headers=headers).text
        self.list=json.loads(json_data)
        
    def json_localread(self, filepath):
        with open(filepath) as json_file:
            json_data=json.load(json_file)
            self.list=json_data

    def download(self,url,fakeque=False):
        if fakeque:
            print("Emulating Download : " + url)
            self.img=url
        else:
            session=requests.session()
            headers={"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36"}
            self.img=requests.get(url)

 


    def processing(self):
        readImage=Image.open(BytesIO(self.img.content))
        imageSize=readImage.size
        width=imageSize[0]-24
        height=imageSize[1]-16
        buff=[]
        counterX=0
        counterY=0

        for wx in range(4):
            inbuff=[]
            for lx in range(4):
                cropped=readImage.crop(box=(width/4*counterX,height/4*counterY, width/4*(counterX+1),height/4*(counterY+1)))
                inbuff.append(cropped)
                counterY+=1
            buff.append(inbuff)
            counterX+=1
            counterY=0

        self.converted_img=Image.new("RGB",(int(width),int(height)))
        counterX=0
        counterY=0
        for wdx in buff:
            for ldx in wdx:
                print(str(counterY))
                self.converted_img.paste(ldx, (int(width/4*counterX)     , int(height/4*counterY)))
                counterX+=1
            counterX=0
            print("Current Y Counter:"+str(counterY))
            counterY+=1

    def output(self, file="./"):
        self.converted_img.save(file+str(self.file)+".png")
        self.file+=1

    def convertToPdf(self):
        directory="./"+self.list["readableProduct"]["title"]+"/"
        sourceDir=os.listdir(directory)
        imgcount=0
        img=[]
        filextend=sourceDir[0].split(".")
        filextend=(str(".")+str(filextend[1]))
        for images in sourceDir:
            img.append(directory + str(imgcount) + filextend )
            imgcount=imgcount+1
        with open("./"+self.list["readableProduct"]["title"]+".pdf","wb") as f:
            f.write(img2pdf.convert(img))


    #A simple Json Dumper for debugging.
    def dumpSimplifiedJson(self,jsObject):
        f=open("JSON.json","w")
        json.dump(jsObject, f, ensure_ascii=False, indent=4, sort_keys=True, separators=(',',': '))
    


