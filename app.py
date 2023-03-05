from flask import Flask, request, url_for
import requests
import pymysql
import json
app = Flask(__name__ , static_folder='static' , static_url_path='/static')

conn = pymysql.connect(
    host = 'localhost',
    user = 'root' , 
    password = '' , 
    database = 'restraunt_sys' , 
    charset = 'utf8'
)
cursor = conn.cursor(cursor=pymysql.cursors.DictCursor)



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

        tup = (item["shopName"] , item["branchName"] , item["mainRegionName"] , item["mainCategoryName"])
        my_list.append(tup)
        sql_str = "insert ignore into house (h_name , h_info , h_address , h_cook) values(%s , %s , %s , %s)"
        # sql_str = ""
        cursor.executemany(sql_str , my_list)
        conn.commit()
    return res.text




# url_for('static', filename='xxx.txt')
