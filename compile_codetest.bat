docker-compose stop tsugi-codetest
docker rm tsugi_codetest_container
docker image rm tsugi_codetest_img
docker-compose build --no-cache tsugi-codetest
docker-compose up -d tsugi-codetest