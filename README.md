git clone https://github.com/crgdncn/secondnaturecodechallenge.git

cd secondnaturecodechallenge

cp .env.example .env    (then edit)

composer install

npm install

npm run dev

php artisan migrate

php artisan db:seed
