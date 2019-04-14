import httplib2
import os
import sys  

from apiclient.discovery import build_from_document
from apiclient.errors import HttpError
from oauth2client.client import flow_from_clientsecrets
from oauth2client.file import Storage
from oauth2client.tools import argparser, run_flow

CLIENT_SECRETS_FILE = "client_secret.json"

YOUTUBE_READ_WRITE_SSL_SCOPE = "https://www.googleapis.com/auth/youtube.force-ssl"
YOUTUBE_API_SERVICE_NAME = "youtube"
YOUTUBE_API_VERSION = "v3"

MISSING_CLIENT_SECRETS_MESSAGE = """
WARNING: Please configure OAuth 2.0

To make this sample run you will need to populate the client_secrets.json file
found at:
   %s
with information from the APIs Console
https://console.developers.google.com

For more information about the client_secrets.json file format, please visit:
https://developers.google.com/api-client-library/python/guide/aaa_client_secrets
""" % os.path.abspath(os.path.join(os.path.dirname(__file__),
                                   CLIENT_SECRETS_FILE))
def get_authenticated_service(args):
  flow = flow_from_clientsecrets(CLIENT_SECRETS_FILE, scope=YOUTUBE_READ_WRITE_SSL_SCOPE,
    message=MISSING_CLIENT_SECRETS_MESSAGE)

  storage = Storage("%s-oauth2.json" % sys.argv[0])
  credentials = storage.get()

  if credentials is None or credentials.invalid:
    credentials = run_flow(flow, storage, args)

  with open("youtube-v3-discoverydocument.json", "r", encoding="utf8" ) as f:
    doc = f.read()
    return build_from_document(doc, http=credentials.authorize(httplib2.Http()))


def get_comment_threads_orderOne(youtube, video_id):
  results = youtube.commentThreads().list(
    part="snippet",
    videoId=video_id,
    textFormat="plainText",
    maxResults = 100
  ).execute()

  # with open("test.out", 'w') as f:
  # sys.stdout = fs
  for item in results["items"]:
    comment = item["snippet"]["topLevelComment"]
    author = comment["snippet"]["authorDisplayName"]
    text = comment["snippet"]["textDisplay"]
    print("%s" %(text.encode("utf-8")))
  return results["items"]


# def get_comment_threads_orderTwo(youtube, video_id):
#   results = youtube.commentThreads().list(
#     part="snippet",
#     videoId=video_id,
#     textFormat="plainText",
#     maxResults = 100,
#     order = "relevance"
#   ).execute()

#   for item in results["items"]:
#     comment = item["snippet"]["topLevelComment"]
#     author = comment["snippet"]["authorDisplayName"]
#     text = comment["snippet"]["textDisplay"]
#     print("%s" % (text.encode("utf-8")))
#   #print(results["pageInfo"]["totalResults"])
#   #print(results["pageInfo"]["resultsPerPage"])
#   return results["items"]
if __name__ == "__main__":
  argparser.add_argument("--videoid",
    help="Required; ID for video for which the comments will be extracted.")
  args = argparser.parse_args()

  if not args.videoid:
    exit("Please specify videoid using the --videoid= parameter.")

  youtube = get_authenticated_service(args)
  try:
    video_comment_threads_orderOne = get_comment_threads_orderOne(youtube, args.videoid)
    parent_id_One = video_comment_threads_orderOne[0]["id"]
    # video_comment_threads_orderTwo = get_comment_threads_orderTwo(youtube,args.videoid)
    # parent_id_Two = video_comment_threads_orderTwo[0]["id"]
  except HttpError as e:
    print("An HTTP error %d occurred:\n%s" % (e.resp.status, e.content))