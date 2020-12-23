FROM ubuntu:bionic

# Fixes some weird terminal issues such as broken clear / CTRL+L
# ENV TERM=linux

# Ensure apt doesn't ask questions when installing stuff
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y \
    && apt-get install -y --no-install-recommends software-properties-common \
    && add-apt-repository universe \
    && apt dist-upgrade -y \
    && apt-get update -y

# Install Ondrej repos for Ubuntu Bionic, PHP7.3, composer and selected extensions - better selection than
# the distro's packages
RUN apt-get install -y --no-install-recommends mc \
    && apt-get install -y --no-install-recommends gnupg \
    && echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu bionic main" > /etc/apt/sources.list.d/ondrej-php.list \
    && apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys 4F4EA0AAE5267A6C \
    && apt-get update \
    && apt-get -y --no-install-recommends install \
        apt-utils \
        ca-certificates \
        curl \
        wget \
        unzip \
        apache2 \
        apache2-utils \
        mysql-server \
        # php-apcu-bc \
        php7.4 \
        libapache2-mod-php7.4 \
        php7.4-apcu \
        php7.4-cli \
        php7.4-curl \
        php7.4-json \
        php7.4-mbstring \
        php7.4-opcache \
        php7.4-readline \
        php7.4-xml \
        php7.4-zip \
        php7.4-gd \
        php7.4-mysql 

# Enable Xdebug
# RUN apt-get install -y php-dev \
#     php-pear
RUN apt-get install -y php-xdebug
RUN echo "zend_extension=/usr/lib/php/20190902/xdebug.so" > /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_autostart = 1" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_enable = 1" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_handler = dbgp" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_host = 127.0.0.1" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_log = /tmp/xdebug_remote.log" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_mode = req" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.remote_port = 9000" >> /etc/php/7.4/mods-available/xdebug.ini
# RUN yes | pecl install xdebug && \
#     echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini && \
#     echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini && \
#     echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini && \
#     php -m

# # Install FPM
# RUN apt-get update \
#     && apt-get -y --no-install-recommends install php7.3-fpm \
#     && apt-get clean \
#     && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get install -y --no-install-recommends 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
RUN composer clear-cache 
RUN apt-get clean 
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* ~/.composer

SHELL ["/bin/bash", "-c"]
RUN usermod -s /bin/bash root
USER root
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.36.0/install.sh | bash \
    # && /bin/bash -c "source ~/.profile" \
    # && eval $(cat ~/.profile | sed 's/^/export /')
    && export NVM_DIR="$HOME/.nvm" \
    && [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" \
    && nvm install 13.11.0 \
    && nvm use 13.11.0

# COPY ./share/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
EXPOSE 80

# RUN mkdir /var/www/dist/ && cd /var/www/dist/ \
#     && composer create-project --prefer-dist laravel/laravel laravel \
#     && cd /var/www/dist/laravel \
#     && composer require laravel/jetstream \
#     && php artisan jetstream:install livewire --teams \
#     && npm install && npm run dev \
#     && php artisan migrate
# RUN cd /var/www/ \
#     && npm install --save-dev gulp merge-stream

RUN php -a
ENV LANG en_US.UTF-8
CMD apachectl -D FOREGROUND
