import requests
from time import sleep
import sys

while True :
    file = open("/sys/bus/w1/devices/" + sys.argv[1] + "/w1_slave","r") #read temperature file
    temperature = int((file.read().split("t=")[1]))
    print(temperature)
    if temperature < 85000 :
        request = "http://192.168.1.27/write_to_db.php?station_id="+ str(sys.argv[2]) +"&temperature=" + str(temperature)
        print(request)
        r = requests.post(request)
        print(r.status_code, r.reason)
        print(r.text[:300] + '...')
    else :
        print("init temp")
    print("Waiting " + str(sys.argv[3]) + " seconds...")
    sleep(float(sys.argv[3]))
