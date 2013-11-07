import re
import urllib
import urllib2
import time

def request(tree):
   url = 'http://www.americanforests.org/bigtrees/bigtrees-search/'
   user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)"
   values  = {'search_val' : tree }
   headers = { 'User-Agent' : user_agent }
   data = urllib.urlencode(values)
   req = urllib2.Request(url, data, headers)
   response = urllib2.urlopen(req)
   the_page = response.read()
   return the_page

def match(html):
   common_name = re.compile("\<span id='bigtrees_results_cell'\>.*\>([a-zA-z]+)\</a\>")
   results = common_name.search(html)
   data = [""]
   if results != None:
      data = results.groups()
   return data

if __name__ == '__main__':
   names = open('latin_names','r').readlines()
   names.reverse() #keep alphabetical order lol
   fh = open('common_names', 'a') #don't try to open the file while script is running
   count = 0
   while len(names) > 0:
      latin = names.pop() # just for output
      data = match(request(latin))
      output = "{} => {}".format(latin.strip(), data[0].strip())
      print output
      fh.write(output + "\n")
      if data[0] != "":
         count += 1
      print count
      time.sleep(15)
   fh.write("Gathered {} sample and ".format(count))
   fh.close()
