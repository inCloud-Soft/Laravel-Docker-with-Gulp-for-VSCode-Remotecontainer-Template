# Laravel template [dockerized]

## Jetstream installation steps

1. Change gulpfile task crateDb: set your database name
2. Change "name" in package.json
3. Run init script
4. Change ENV file in ./site/dist/laravel (add FEATURES_PATH - it mast be absolute path to src directory, including it self, and setup database connection)
5. Run "php artisan migrate" from ./site/dist/laravel 
6. Change ./gulpfile.js "copySrc" task (uncomment jetstream generators)
6. Run "npm run gulp watch" from root directory of repository 
7. Run "composer dumpautoload" from ./site/dist/laravel
8. Setup your web server (point it to ./site/dist/laravel/public)

## Orchid installation

1. Change gulpfile task crateDb: set your database name
2. Change "name" in package.json
3. Run script init_with_orchid
4. Change ENV file in ./site/dist/laravel (add FEATURES_PATH - it mast be absolute path to src directory, including it self, and setup database connection)
5. Run script init_with_orchid_after
6. Edit dist/.../config/platform.php if needed
7. Change ./gulpfile.js "copySrc" task (uncomment orchid generators)
8. Run "npm run gulp watch" from root directory of repository 
9. Go to "<site_url>/admin" by default
