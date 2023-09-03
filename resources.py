try:
    import mysql.connector
    import sys
    import json
    import requests

    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="learningassistant",
    port=3308
    )

    mycursor = mydb.cursor()
    query = "SELECT * FROM "+sys.argv[1]+"_info"
    mycursor.execute(query)

    myresult = mycursor.fetchall()

    base_url = "https://api.openai.com/v1/"
    openai_token = "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"


    openai_header = {
        "Content-Type": "application/json",
        "Authorization":"Bearer {}".format(openai_token)
    }
    subject = myresult[0][0]
    level = myresult[0][1]
    content = "Can you send me URLs for resources that can help me understand "+ subject + "at a " + level + "level"
    data = {
        "model": "gpt-3.5-turbo",
        "messages": [
            {
                "role": "user",
                "content": content
            }
        ],
        "n": 1
    }

    response = requests.post(base_url+"/chat/completions", headers=openai_header, json=data)
    response = json.loads(response.text)

    mydb.close()
    for x in response["choices"]:
        print(x["message"]["content"])
except Exception as e:
    print(e)
