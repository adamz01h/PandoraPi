#!/bin/bash
pwd=$(pwd)
echo "Pandora User Name"
read uname
echo "Pandora Password"
read upass
sudo chmod -R 777 $pwd

if [ -d ~/.config/ ]
then
echo "Found hidden folder config ... Skipping"
else
mkdir ~/.config/
fi

if  [  -d ~/.config/pianobar/  ]
then
echo "Found pianobar config directory...Skipping"
else 
mkdir ~/.config/pianobar/
fi

if  [  -a ~/.config/pianobar/config  ] 
then
	read -p "A config file has been found!  Do you want to delete it? [y/n]" -n 1 -r
	echo    # (optional) move to a new line
	if [[ $REPLY =~ ^[Yy]$ ]] 
	then
	sudo chmod 666  ~/.config/pianobar/config
	rm ~/.config/pianobar/config
	fi
else
	touch  ~/.config/pianobar/config
	sudo chmod 666 ~/.config/pianobar/config
fi

echo "user = $uname" >> ~/.config/pianobar/config
echo "password = $upass" >> ~/.config/pianobar/config

if  [  -a ctl  ]
then
echo "Found ctl file... Skipping"
else
sudo mkfifo ctl
fi
sudo chmod 666 ctl
sudo chmod 777 eventcommand.sh
echo "event_command = "$pwd"/eventcommand.sh" >> ~/.config/pianobar/config
echo "fifo = "$pwd"/ctl" >> ~/.config/pianobar/config
sudo usermod -a -G audio www-data
sudo chmod 777 vol
sudo chmod 777 playctl
sudo chmod 777 station.txt
sudo chmod 777 songinfo.txt
echo "Complete!"
