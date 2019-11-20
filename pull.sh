echo "La machine de dev effectue un Git Pull......."

cd Back
composer update
php bin/console cache:clear --env=prod
php bin/console cache:clear
cd ..
