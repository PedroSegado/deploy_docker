docker-compose stop feedback-manager
docker rm feedback-manager_container
docker image rm feedback-manager_img
docker-compose build --no-cache feedback-manager
docker-compose up -d feedback-manager