#!/bin/bash
mkfifo ~/.config/pianobar/ctl
cp eventcommand.sh ~/.config/pianobar/eventcommand.sh
sudo useradd -G audio -a www-data
touch /var/www/vol
touch /var/www/playctl
touch /var/www/station.txt
touch /var/www/songinfo.txt
