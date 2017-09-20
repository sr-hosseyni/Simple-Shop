#!/bin/bash

/usr/bin/mysqld_safe &
sleep 5
mysql -u root -e "CREATE USER 'bcs'@'%' IDENTIFIED BY 'secret'; CREATE DATABASE bcs; GRANT ALL PRIVILEGES ON bcs.* TO 'bcs'@'%';"
