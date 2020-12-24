# Laravel template [dockerized]
## Installation

1. Change gulpfile task crateDb: set your database name
2. Change "name" in package.json
3. Run init script
4. Change ENV file in ./site/dist/laravel (add FEATURES_PATH - it mast be absolute path to src directory, including it self, and setup database connection)
5. Run "php artisan migrate" from ./site/dist/laravel 
6. Run "npm run gulp watch" from root directory of repository 
7. Setup your web server (point it to ./site/dist/laravel/public)