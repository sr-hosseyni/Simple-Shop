*requirements:
    node
    npm
    docker (docker-compose needed)

*run
```
    sudo echo "127.0.0.1   bcs.dev" >> /etc/hosts
    cd bcs
    composer install
    npm install
    cd backend
    npm install
    cd ..
    run ./start.sh
    run npm start
```
