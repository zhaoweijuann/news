
# import os

# pathDir = os.listdir('/Volumes/bigSpace/个人资料/MI6/img转')
# for file_name in pathDir:
#     new_name = file_name.replace('-squashed' , '')
#     os.rename('/Volumes/bigSpace/个人资料/MI6/img转/' + file_name , '/Volumes/bigSpace/个人资料/MI6/img转/' + new_name)



# from selenium import webdriver
# import time

# browser = webdriver.Chrome()

# browser.get('http://www.baidu.com')
# time.sleep(1)
# browser.maximize_window()
# print(browser.title)
# print(browser.find_element_by_id('kw'))
# browser.find_element_by_id('kw').send_keys('刘亦菲')
# time.sleep(2)
# browser.find_element_by_id('su').click()
# # browser.quit()


import asyncio
from pyppeteer import launch

# async def main():
#     browser = await launch({
#         'headless': False,
#         'args': ['--disable-infobars' , f'--window-size=500,300']
#     })
#     page = await browser.newPage()
#     await page.goto('http://www.taobao.com')
#     await page.screenshot({'path': 'xxx.png'})
#     # await browser.close()

async def main():
    browser = await launch({
        'headless': False,
        'executablePath': '/Applications/Google\ Chrome.app'
    })

    page = await browser.newPage()

    await page.setViewport(viewport={
        'width': 1280,
        'height': 800
    })

    await page.setJavaScriptEnabled(enabled=True)

    res = await page.goto('https://www.toutiao.com', options={
        # 'timeout': 1000
    })

    resp_headers = res.headers
    resp_status = res.status

    await asyncio.sleep(2)

    # while not await page.querySelector('.t'):
    #     pass
    
    # await page.evaluate('window.scrollBy(0 , document.body.scrollHeight)')

    await asyncio.sleep(4)



asyncio.get_event_loop().run_until_complete(main())