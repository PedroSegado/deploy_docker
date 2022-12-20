#!/bin/bash

pipefile="./pipe/hostpipe"

[[ -d $pipefile ]] && rmdir $pipefile
echo "" > $pipefile

while true; do
	ok="$(cat ${pipefile})"
	if [[ $ok == 'restart' ]]; then
		echo "restarting $(date)" >> ./panic-restart.log
		docker-compose down
		docker-compose rm -f
		docker-compose up -d
	fi
	echo "" > $pipefile
	sleep 10
done
