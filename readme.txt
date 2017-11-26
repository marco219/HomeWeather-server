Steps for installation:

-create /home/pi/HomeWeather/
-copy readTemp.py to /home/pi/HomeWeather/ (check probes values)
-copy homeweather to /usr/local/bin/
-chmod +x homeweather
-copy homeweather.service to /etc/systemd/system/
-change args based on probe (arg1 = probe, arg2 = station-name, arg3 = time)
-systemctl daemon-reload
