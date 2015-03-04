#!/bin/bash
pwd=$(pwd)
fold="$HOME/.config/pianobar"
stl="var/www/station.txt"
ctlf="$fold/ctl"
nowplaying="$fold/nowplaying"
songinfofile="/var/www/songinfo.txt"
while read L; do
        k="`echo "$L" | cut -d '=' -f 1`"
        v="`echo "$L" | cut -d '=' -f 2`"
        export "$k=$v"
done < <(grep -e '^\(title\|artist\|album\|stationName\|pRet\|pRetStr\|wRet\|wRetStr\|songDuration\|songPlayed\|rating\|songDuration\|songPlayed\|coverArt\|stationCount\|station[0-9]\+\)=' /dev/stdin)

case "$1" in

        songstart)
        echo -e "$artist \n$title \n$stationName \n$rating \n$coverArt \n$album \n$songDuration" > "$songinfofile"
;;
	songlove)
        echo -e "$artist \n$title \n$stationName \n$rating \n$coverArt \n$album" > "$nowplaying"
;;
	songban)
	echo -e "" > "$nowplaying"
;;
	
	 usergetstations)
	   if [[ $stationCount -gt 0 ]]; then
		  rm -f "$stl"
		  for stnum in $(seq 0 $(($stationCount-1))); do
			 echo "$stnum) "$(eval "echo \$station$stnum") >> "$stl"
		  done
	   fi

	   ;;
	   stationcreate)
           if [[ $stationCount -gt 0 ]]; then
                  rm -f "$stl"
                  for stnum in $(seq 0 $(($stationCount-1))); do
                         echo "$stnum) "$(eval "echo \$station$stnum") >> "$stl"
                  done
           fi

           ;;
	stationaddgenre)
         if [[ $stationCount -gt 0 ]]; then
                  rm -f "$stl"
                  for stnum in $(seq 0 $(($stationCount-1))); do
                         echo "$stnum) "$(eval "echo \$station$stnum") >> "$stl"
                  done
           fi

           ;;
	songexplain)
          if [[ $stationCount -gt 0 ]]; then
                  rm -f "$stl"
                  for stnum in $(seq 0 $(($stationCount-1))); do
                         echo "$stnum) "$(eval "echo \$station$stnum") >> "$stl"
                  done
           fi

           ;;
           stationaddshared)
          if [[ $stationCount -gt 0 ]]; then
                  rm -f "$stl"
                  for stnum in $(seq 0 $(($stationCount-1))); do
                         echo "$stnum) "$(eval "echo \$station$stnum") >> "$stl"
                  done
           fi

           ;;
        stationdelete)
           if [[ $stationCount -gt 0 ]]; then
                  rm -f "$stl"
                  for stnum in $(seq 0 $(($stationCount-1))); do
                         echo "$stnum) "$(eval "echo \$station$stnum") >> "$stl"
                  done
           fi
		echo -e "" > "$nowplaying"
           ;;
esac
