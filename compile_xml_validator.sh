docker compose stop xml-validator
docker rm xml-validator_container
docker image rm xml-validator_img
docker compose build --no-cache xml-validator
docker compose up -d xml-validator