#!/bin/bash

CWD=$(pwd)

echo "Start deploying application..."
echo ""
echo "---------------------------------------------"
echo "You have to install apache2 and php5 first!!!"
echo "---------------------------------------------"
echo ""
apt-get install redis-server
apt-get install python-software-properties
add-apt-repository ppa:chris-lea/node.js
apt-get update
apt-get install nodejs
apt-get install npm
npm config set registry http://registry.npmjs.org/
npm install -g less
mkdir -p /usr/local
mkdir -p /usr/local/lib
ln -s /usr/bin /usr/local/bin
ln -s /usr/lib/node_modules /usr/local/lib/node_modules
apt-get install curl
curl -sS https://getcomposer.org/installer | php
php composer.phar install
chown -R www-data.www-data ./
chmod -R 0777 app/cache app/logs
php app/console assets:install --env=prod
php app/console assetic:dump --env=prod
php app/console doctrine:cache:clear-metadata
php app/console doctrine:schema:update --force
app/console fos:user:create admin admin@example.com admin
crontab -l | { printf "* * * * * php %s/app/console swiftmailer:spool:send" "$CWD"; echo ""; } | crontab -
mkdir -p app/uploads
chmod -R 0777 app/cache app/logs web/uploads
echo ""
echo "---------------------------------------------------------------"
echo "We've created an user for you: admin:admin (admin@example.com)"
echo "---------------------------------------------------------------"
echo ""