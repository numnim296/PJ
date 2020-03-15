import requests
import time
ii = 1
while ii:
    # contrys = ['thailand','korea','japan','russia','united-states','united-kingdom']
    x = requests.get("http://localhost/TwitterTest/realtimeWord")
    print(x.status_code)
    time.sleep(60)