#!/bin/bash
pwd=$(pwd)

sudo chmod -R 777 $pwd
sudo apt-get install php5 libao-dev libgcrypt11-dev libcurl4-gnutls-dev libgnutls-dev libfaad-dev libmad0-dev libjson0-dev make pkg-config

	read -p "Download and compile FFmpeg?[y/n]" -n 1 -r
	echo    # (optional) move to a new line
	if [[ $REPLY =~ ^[Yy]$ ]] 
	then
	cd ~/
	git clone https://github.com/FFmpeg/FFmpeg.git
	cd FFmpeg
	./configure --disable-yasm
	make clean
	make
	sudo make install
	cd $pwd
	fi
	
	read -p "Download and compile Pianobar?[y/n]" -n 1 -r
	echo    # (optional) move to a new line
	if [[ $REPLY =~ ^[Yy]$ ]] 
	then
	cd ~/
	git clone https://github.com/PromyLOPh/pianobar.git
	cd pianobar
	make clean
	make
	sudo make install
	cd $pwd
	fi

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
	echo "Pandora User Name"
	read uname
	echo "Pandora Password"
	read upass
	sudo chmod 666  ~/.config/pianobar/config
	rm ~/.config/pianobar/config
	touch  ~/.config/pianobar/config
	sudo chmod 666 ~/.config/pianobar/config
	echo "user = $uname" >> ~/.config/pianobar/config
	echo "password = $upass" >> ~/.config/pianobar/config
	fi
else
	touch  ~/.config/pianobar/config
	sudo chmod 666 ~/.config/pianobar/config
	echo "user = $uname" >> ~/.config/pianobar/config
	echo "password = $upass" >> ~/.config/pianobar/config
fi



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
