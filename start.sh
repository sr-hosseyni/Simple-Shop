#!/usr/bin/env bash
docker-compose up -d

echo -ne "Wait for the containers to be available"
while [ "`docker inspect -f {{.State.Running}} bcs_web`" != "true" ]; do
    echo -ne '.';
    sleep 0.1;
done;

while [ "`docker inspect -f {{.State.Running}} bcs_db`" != "true" ]; do
    echo -ne ':';
    sleep 0.1;
done;

docker exec bcs_db bash -c "/usr/bin/mysqld_safe & sleep 5; mysql -u root -e \"CREATE USER 'bcs'@'%' IDENTIFIED BY 'secret'; CREATE DATABASE bcs; GRANT ALL PRIVILEGES ON bcs.* TO 'bcs'@'%';\""
docker exec bcs_web bash -c "/serve.sh bcs.dev /bcs/public"
docker exec bcs_web bash -c "cd /bcs && php artisan migrate"
docker exec bcs_web bash -c "cd /bcs && php artisan db:seed"

#npm start