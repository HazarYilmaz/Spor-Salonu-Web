from selenium import webdriver

import time

browser= webdriver.Chrome()

url="https://store.steampowered.com/search/?sort_by=Price_ASC&specials=1&hidef2p=1&category1=998&category2=29&ndl=1"
browser.get(url)

LenOfPage = browser.execute_script("window.scrollTo(0,document.body.scrollHeight);var lenOfPage=document.body.scrollHeight;return lenOfPage;")
match=False



for i in range(1,2):
    lastcount=LenOfPage
    time.sleep(3)
    LenOfPage=browser.execute_script("window.scrollTo(0,document.body.scrollHeight);var lenOfPage=document.body.scrollHeight;return lenOfPage;")

  
fallowerslist = []
fallowers=browser.Finds("span",attrs={"class":"title"})

for fallower in fallowers:
    fallowerslist.append(fallower.text)


    with open("oyunadi.txt","w",encoding="UTF-8") as file :
        for fallower in fallowerslist:
            file.write(fallower + "/n")




time.sleep(10)




browser.close()
