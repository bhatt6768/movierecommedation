import sys
import re
with open("comments.txt","r") as f:
	data = f.readlines()
#print(data[0])
newList = [0]*len(data)
MidStringOne = ""
MidStringTwo = ""
for i in range(0,len(data)):
	MidStringOne = data[i].strip('b')
	MidStringTwo = re.sub('[^a-zA-Z0-9 \n\.]', '',MidStringOne)
	newList[i] = re.sub(r'(http|https|www|youtu|youtube)\w*\.\w*', '', MidStringTwo)
	newList[i] = re.sub(r'\w*[x\/]\w*', '', newList[i])

newList = list(dict.fromkeys(newList))
for i in range(0,len(newList)):
	print(newList[i].strip())