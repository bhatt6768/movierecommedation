
# coding: utf-8

# In[36]:


from recommender_methords import *
import pandas
import mysql.connector


# Here you can see a demonstration of recommendation top 5 movies in genre of your choice, second argument (5 in this case)
# is the number of movies that recommender will list.

# In[38]:


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
       
       # print(j)
       
   cursor.close()
   
except Error as e :
    print ("Error while connecting to MySQL", e)










data1=genre

# data="Crime"
print(recommendMeMovies(data1, 5))


# Second possibility of the recommeder is to get similar movies to one you have watched. Things that recommender consider in this case
# are geners of the movie watched and the most popular movie from the category/genre of the watched movie.

# In[33]:


# print(recommendationTop("Death Race"))


# # In[17]:



# print(recommendationTop("Death Race"))


# # In[18]:


# print(recommendationTop("Death Race"))


# # One more thing that you can do is to search for the movie, it accepts key words as well, so you don't have to write whole name of the movie.

# # In[19]:


# print(searchByTitle("Death Race"))

