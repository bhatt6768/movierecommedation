from nltk.corpus import brown, stopwords
from nltk.cluster.util import cosine_distance
import numpy as np
from operator import itemgetter 
from textblob import TextBlob
from textblob import Word
from textblob.sentiments import NaiveBayesAnalyzer
import pandas as pd
stop_words = stopwords.words('english')
with open("TextToString.txt","r") as f:
	data = f.readlines()
#print(data[0])
newList = [0]*len(data)
FinalList = [0]*len(data)
for i in range(0,len(data)):
	newList[i] = data[i].strip()
PositiveComment = [0]*len(data)
NegativeComment = [0]*len(data)
j1 = 0
j2 = 0
for i in range(0,len(data)):
    textB = TextBlob(newList[i])
    sentiment = textB.sentiment.polarity
    if sentiment <0.00:
        SentimentClass = 'Negative'
        NegativeComment[j1] = newList[i]
        j1 = j1+1
    elif sentiment >0.00:
        SentimentClass = 'Positive'
        PositiveComment[j2] = newList[i]
        j2 = j2+1
    else:
        SentimentClass = 'Neutral'
PositiveCommentF = list(filter((0).__ne__,PositiveComment))
NegativeCommentF = list(filter((0).__ne__, NegativeComment))
# print(PositiveCommentF)
# print("----------------------------")
# print(NegativeCommentF)

def textrank(sentences, top_n, stopwords=None):
    S = build_similarity_matrix(sentences, stopwords) 
    sentence_ranking = page_rank(S)
 
    # Sort the sentence ranks
    ranked_sentence_indexes = [item[0] for item in sorted(enumerate(sentence_ranking), key=lambda item: -item[1])]
    selected_sentences = sorted(ranked_sentence_indexes[:top_n])
    summary = itemgetter(*selected_sentences)(sentences)
    return summary

def build_similarity_matrix(sentences, stop_words=None):
    S = np.zeros((len(sentences), len(sentences)))

    for i in range(len(sentences)):
        for j in range(len(sentences)):
            if i != j:
                S[i][j] = sentence_similarity(sentences[i], sentences[j], stop_words)

    #Normalize the matrix
    for i in range(len(S)):
        if S[i].sum() == 0:
        	S[i] /= S[i].sum()+1
        else :
        	S[i] /= S[i].sum()
    
    return S

def page_rank(A, eps=0.0001, d=0.5):
    P = np.ones(len(A)) / len(A)
    while True:
        P_new = np.ones(len(A)) * (1 - d) / len(A) + d * A.T.dot(P)
        delta = abs((P_new - P).sum())
        if delta <= eps:
            return P_new
        P = P_new

def sentence_similarity(sent1, sent2, stopwords=None):
    if stopwords is None:
        stopwords = []
 
    sent1 = [w.lower() for w in sent1]
    sent2 = [w.lower() for w in sent2]
 
    all_words = list(set(sent1 + sent2))
 
    vector1 = [0] * len(all_words)
    vector2 = [0] * len(all_words)
 
    # Vector for the first sentence
    for w in sent1:
        if w in stopwords:
            continue
        vector1[all_words.index(w)] += 1
 
    # Vector for the second sentence
    for w in sent2:
        if w in stopwords:
            continue
        vector2[all_words.index(w)] += 1
 
    return 1 - cosine_distance(vector1, vector2)

n = 5
final_summ = []
print("Postive Comments :)")
print("<div><div><div class=\"list-group\"><ul class=\"list-group\">")
for idx, sentence in enumerate(textrank(PositiveCommentF, n, stop_words)):
    print("<li class=\"list-group-item list-group-item-info\">%s</li>" %  ''.join(sentence))
print("</ul></div></div>")
print("Negative Comments :(")
print("<div><div class=\"list-group\"><ul class=\"list-group\">")

for idx, sentence in enumerate(textrank(NegativeCommentF, n, stop_words)):
    print("<li class=\"list-group-item list-group-item-info\"> %s</li>" % ''.join(sentence))
print("</ul></div></div></div>")