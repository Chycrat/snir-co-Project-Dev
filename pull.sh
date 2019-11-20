echo "La machine de dev effectue un Git Pull......."
git pull -u origin master
cd Back
composer update
php bin/console cache:clear --env=prod
php bin/console cache:clear
