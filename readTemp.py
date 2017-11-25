import requests

station_id="station_1"

file = open("/sys/bus/w1/devices/28-80000026f9c8/w1_slave","r") #read temperature file
temperature = int((file.read().split("t=")[1])) 
print(temperature)
if temperature < 85000 :
    request = "http://192.168.1.27/write_to_db.php?station_id="+ str(station_id) +"&temperature=" + str(temperature)
    print(request)
    r = requests.post(request)
    print(r.status_code, r.reason)
    print(r.text[:300] + '...')
else :
    print("init temp")
