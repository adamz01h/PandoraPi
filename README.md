# PandoraPi
Pianobar + PHP + HTML
Install apache and php5
Install pianobar
Run Pianobar
exit Pianobar
Copy contents to /var/www/
Run install.sh
Reboot
Run Pianobar
enjoy!
Note: 
You may need to change the paths in eventcommand.sh to match your Apache working directory default is set to /var/www.
All web files must be set to read & write for all users.
Soundset.php can use PCM or Master , default is set for PCM

---Automate Pi---
sudo apt-get install screen

$sudo nano /etc/inittab
change to - > 1:2345:respawn:/sbin/getty -a pi 38400 tty1

$nano  ~/.profile
add ->>
TTY=$(tty);
if [[ "$TTY" == "/dev/tty1" ]];
then
 screen -dmS "pandora" pianobar
fi

$nano ~/.config/pianobar/config
add ->>
autostart = 00stationid00
