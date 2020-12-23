# MailCenter dev [dockerized]

composer create-project --prefer-dist laravel/laravel laravel \
&& cd ./laravel \
&& composer require laravel/jetstream \
&& php artisan jetstream:install livewire --teams \
&& npm install && npm run dev \
&& php artisan migrate