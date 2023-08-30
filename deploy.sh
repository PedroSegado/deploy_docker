#!/bin/bash

volumes_=false
help_=false
while getopts ":vh" o
do
	case "$o" in
		v) volumes_=true;;
		h) help_=true;;
		?) echo "PARAMS: [-v] [-h]"; exit 1;
	esac
done
shift $(($OPTIND -1))

usage() {
  echo "Usage: $0 [-v] [-h]" 1>&2 
  echo "- Stop all containers" 1>&2 
  echo "- Remove all containers" 1>&2 
  echo "- Remove all images" 1>&2 
  echo "- Build all" 1>&2 
  echo "- Start all containers" 1>&2 
  echo "Params:" 1>&2 
  echo $'\t'"-h: Print help" 1>&2 
  echo $'\t'"-v: Also remove volumes" 1>&2 
}

if $help_; then
	usage
	exit 0
fi

docker compose down
docker compose rm -f
docker image prune -f
if $volumes_; then
	docker volume prune -f
fi
docker compose build --no-cache
if [[ $? -ne 0 ]]; then
	echo "Error building...."
	exit 1
fi
docker compose up -d