# requirements:
+    node
+    npm
+    docker (docker-compose needed)

# run
```
    sudo echo "127.0.0.1   bcs.dev" >> /etc/hosts
    cd bcs
    composer install
    npm install
    ./start.sh
    cd backend
    npm install
    npm start
    cd ../frontend
    npm install
    npm start
```
# urls
+ Admin dashboard -> http://localhost:4200 (authentication is not completed)
+ Website -> http://localhost:4444/all-products (is not completed)
+ api -> http://bcs.dev/api
