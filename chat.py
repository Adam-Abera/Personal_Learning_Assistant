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
    query = "SELECT * FROM "+sys.argv[1]+"_conversation where title = '"+sys.argv[2]+"'"
    mycursor.execute(query)

    myresult = mycursor.fetchall()
    #print(sys.argv[1] + ' ' + str(myresult))
    base_url = "https://api.openai.com/v1/"
    openai_token = "open ai token"
    hf_api_key = "Hugging Face API key"


    openai_header = {
        "Content-Type": "application/json",
        "Authorization":"Bearer {}".format(openai_token)
    }
    history = []
    n = 1
    for x in myresult:
        history.append({"role": x[1],"content": x[3]})
        n = n+1
    data = {
        "model": "gpt-3.5-turbo",  # model ID can be selected from the above models that are described
        "messages": history,
        "n": 1
    }
    response = requests.post(base_url+"/chat/completions", headers=openai_header, json=data)
    response = json.loads(response.text)
    print(response)
    role = response["choices"][0]["message"]["role"]
    content1 = response["choices"][0]["message"]["content"][0:4999]
    print("\n", role," ", content1,"\n")
    mycursor2 = mydb.cursor()
    try:
        sql = "INSERT INTO "+sys.argv[1]+"_conversation (Id, Role, Title, Content) VALUES (%s, %s, %s, %s)"
        val = (n, response["choices"][0]["message"]["role"],sys.argv[2], response["choices"][0]["message"]["content"][0:4999])
        mycursor2.execute(sql, val)
        mydb.commit()
        mydb.close()
    except Exception as e:
        print(e)
except Exception as e:
    print(e)
