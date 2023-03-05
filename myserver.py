from flask import Flask, request, url_for
import time
import requests
import math
from flask_cors import CORS
# import pymysql
import json
app = Flask(__name__ , static_folder='static' , static_url_path='/static')
CORS(app)

# conn = pymysql.connect(
#     host = 'localhost',
#     user = 'root' ,
#     password = '' ,
#     database = 'restraunt_sys' ,
#     charset = 'utf8'
# )
# cursor = conn.cursor(cursor=pymysql.cursors.DictCursor)
#
# cursor.execute('select * from user')
# res = cursor.fetchall()
# print(res)


# 涉及写操作注意要提交
# conn.commit()


# 导出环境变量
# export FLASK_APP=app.py

# 打开调试模式
# export FLASK_EVE=development

# 运行 (内部服务器运行)
# flask run

# 外部可见服务器运行
# flask run --host=0.0.0.0

# url_for('static', filename='xxx.txt')



@app.route('/')
def hello_world():
    return 'hello world, 我是主界面111222'

@app.route('/user/<username>')
def show_user_name(username):
    return username

@app.route('/upload' , methods=['POST'])
def uploadFn():
    f = request.files['myfile']
    f.save('./static/' + str(math.trunc(time.time())) + '.jpg')
    return '上传成功'

@app.route('/aaa', methods=['GET', 'POST'])
def aaa():
    if request.method == 'GET': 
        r = requests.get('http://localhost:5000/json_api')
        print(r.json())
        return r.json()
    else: 
        return '我是 post 方法'

@app.route('/post_test' , methods=['POST'])
def post_test():
    print(request.form['name'])
    return '123'

@app.route('/dazhong_tuijian' , methods=['GET'])
def post_tuijian():
    # area_id = areas[request.args.get("city")]
    url = "http://www.dianping.com/searchads/ajax/suggestads"
    tou = {
        "Accept": "application/json, text/javascript",
        "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
        "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36"
    }

    xxx = {
        "cityId": 1,
        "keyword": "",
        "channelId": 10,
        "categoryId": 10,
        "pageId": 2,
        "notAdShops": ["G89WDrHStwDNChTV","GakkNEOHoOKRLpSZ","l548Lt58FCWyPOSX","H8u8ZjnavsaYWLxP","las2wxLtGE4LWbr1","GaSdc6j8mTxhtU0d","jWDwzICAQ109ZRCZ","l99ikCgiDXNhOmRo","G5CIV0OSNKR671AR","jkYwk8bM1hvR4RMs","G9WeM4dc4lZawh0t","k3EH03xWDHqDMvku","H7jbYtKVSmVVgEMe","l32itAXZnlzZinC6","l87fAVdzLu1vKahf"]
    }

    res = requests.post(url , data=xxx , headers=tou)
    data = json.loads(res.text)

    my_list = []
    for item in data["msg"]["slots"][0]["launches"]:

        if item["shopName"] is None: 
            item["shopName"] = " "

        if item["branchName"] is None: 
            item["branchName"] = " "

        if item["mainRegionName"] is None: 
            item["mainRegionName"] = " "

        if item["mainCategoryName"] is None: 
            item["mainCategoryName"] = " "

        tup = (item["shopId"] , item["shopName"] , item["branchName"] , item["mainRegionName"] , item["mainCategoryName"])
        my_list.append(tup)
        sql_str = "insert ignore into house (h_id , h_name , h_info , h_address , h_cook) values(%s , %s , %s , %s , %s)"
        # sql_str = ""
        cursor.executemany(sql_str , my_list)
        conn.commit()
    return res.text


@app.route('/dazong_test' , methods=['GET'])
def dazong_test():
    areas = {
        "上海":"fce2e3a36450422b7fad3f2b90370efd71862f838d1255ea693b953b1d49c7c0",

        "北京":"d5036cf54fcb57e9dceb9fefe3917fff71862f838d1255ea693b953b1d49c7c0",

        "广州":"e749e3e04032ee6b165fbea6fe2dafab71862f838d1255ea693b953b1d49c7c0",

        "深圳":"e049aa251858f43d095fc4c61d62a9ec71862f838d1255ea693b953b1d49c7c0",

        "天津":"2e5d0080237ff3c8f5b5d3f315c7c4a508e25c702ab1b810071e8e2c39502be1",

        "杭州":"91621282e559e9fc9c5b3e816cb1619c71862f838d1255ea693b953b1d49c7c0",

        "南京":"d6339a01dbd98141f8e684e1ad8af5c871862f838d1255ea693b953b1d49c7c0",

        "苏州":"536e0e568df850d1e6ba74b0cf72e19771862f838d1255ea693b953b1d49c7c0",

        "成都":"c950bc35ad04316c76e89bf2dc86bfe071862f838d1255ea693b953b1d49c7c0",

        "武汉":"d96a24c312ed7b96fcc0cedd6c08f68c08e25c702ab1b810071e8e2c39502be1",

        "重庆":"6229984ceb373efb8fd1beec7eb4dcfd71862f838d1255ea693b953b1d49c7c0",

        "西安":"ad66274c7f5f8d27ffd7f6b39ec447b608e25c702ab1b810071e8e2c39502be1"
    }
    area_id = areas[request.args.get("city")]
    url = "http://www.dianping.com/mylist/ajax/shoprank?rankId=" + area_id
    tou = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/22.0.1207.1 Safari/537.1'
    }
    res = requests.get(url  , headers=tou)
    data = json.loads(res.text)

    my_list = []
    for item in data["shopBeans"]:

        
        if item["shopName"] is None: 
            item["shopName"] = " "

        if item["branchName"] is None: 
            item["branchName"] = " "

        if item["mainRegionName"] is None: 
            item["mainRegionName"] = " "

        if item["mainCategoryName"] is None: 
            item["mainCategoryName"] = " "

        tup = (item["shopId"] , item["shopName"] , item["branchName"] , item["mainRegionName"] , item["mainCategoryName"])
        my_list.append(tup)
        sql_str = "insert ignore into house (h_id , h_name , h_info , h_address , h_cook) values(%s , %s , %s , %s , %s)"
        # sql_str = ""
        cursor.executemany(sql_str , my_list)
        conn.commit()
    return res.text

@app.route('/music_list' , methods=['POST'])
def music_api():
    keyword = request.form['keyword']
    music_api = 'http://www.kuwo.cn/api/www/search/searchMusicBykeyWord?key=' + keyword + '&pn=2&rn=30&httpsStatus=1&reqId=485610e0-eb5c-11ea-b9da-7f8928444f5d'
    
    r = requests.get(music_api , headers={
        'Cookie': '_ga=GA1.2.1617498609.1590546594; _gid=GA1.2.1257867913.1598858233; Hm_lvt_cdb524f42f0ce19b169a8071123a4797=1598858232,1598858635; Hm_lpvt_cdb524f42f0ce19b169a8071123a4797=1598858635; kw_token=GPHUW3PJUN4',
        'csrf': "GPHUW3PJUN4" , 
        'User-Agent': "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36" , 
        'Accept': "application/json, text/plain, */*" , 
        'Referer': "http://www.kuwo.cn/search/list?key=%E5%91%A8%E6%9D%B0%E4%BC%A6"
    })
    return r.json()


@app.route('/get_mp3' , methods=['POST'])
def get_mp3():
    rid = request.form['rid']
    music_api = 'http://www.kuwo.cn/url?format=mp3&rid=' + rid + '&response=url&type=convert_url3&br=128kmp3&from=web&t=1621482540909&httpsStatus=1&reqId=501bd1d1-b91e-11eb-a4d9-5d1b23269940'
    
    r = requests.get(music_api)
    return r.json()




@app.route('/json_api')
def json_api():
    return {
        'name': "zhangsan" , 
        'age': 12,
        'hobby': ['篮球', '足球' , '排球']
    }


# url_for('static', filename='xxx.txt')
