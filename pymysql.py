import mysql.connector
import os
from mysql.connector import Error


f=open("savesession.txt", "r")
data=f.read()

try:
   mySQLconnection = mysql.connector.connect(host='localhost',
                             database='movierec',
                             user='root',
                             password='')
   sql_select_Query = "select Genre from user where userId=%s"
   user_id = (data,)

   cursor = mySQLconnection .cursor()
   cursor.execute(sql_select_Query,user_id)
   records = cursor.fetchall()
  
   for row in records:
       # print("movietitle = ", row[0], )
       genre=row[0]
       print(genre)
       
       # print(j)
       
   cursor.close()
   
except Error as e :
    print ("Error while connecting to MySQL", e)