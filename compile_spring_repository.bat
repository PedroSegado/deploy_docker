docker-compose stop spring-codetest
docker rm spring_codetest_container
docker image rm spring_codetest_img
docker-compose build --no-cache spring-codetest
docker-compose up -d spring-codetest