docker-compose stop java-validator
docker rm java-validator_container
docker image rm java-validator_img
docker-compose build --no-cache java-validator
docker-compose up -d java-validator