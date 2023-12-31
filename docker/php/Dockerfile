FROM php:8.2-fpm

USER root

ARG USER_ID
ARG GROUP_ID

RUN userdel -f www-data
RUN if getent group www-data ; then groupdel www-data; fi
RUN groupadd -g ${GROUP_ID} www-data
RUN useradd -l -u ${USER_ID} -g www-data www-data
RUN chown -R www-data:www-data /var/www

RUN install -d -m 0755 -o www-data -g www-data /home/www-data
RUN chown -R www-data:www-data /home/www-data

RUN mkdir /var/log/supervisor
RUN chown -R www-data:www-data /var/log/supervisor
RUN touch /var/run/supervisord.pid
RUN touch /var/run/crond.pid
RUN chown -R www-data:www-data /var/run
RUN chown www-data:www-data /var/run/supervisord.pid /var/run/crond.pid

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install -y nano git curl zip unzip zlib1g-dev libicu-dev g++ libxml2-dev supervisor default-mysql-client cron libmcrypt-dev openssh-client libzip-dev libmagickwand-dev imagemagick

RUN export EDITOR="/usr/bin/nano"

RUN pecl update-channels

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install intl && docker-php-ext-configure intl
RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN pecl install imagick && docker-php-ext-enable imagick
RUN docker-php-ext-install gd && docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install zip exif pcntl bcmath soap pdo_mysql sockets gettext

RUN curl -sL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt-get install -y nodejs
RUN npm update -g

ADD ./docker/php/crontab /etc/cron.d/laravel-cron
RUN crontab -u www-data /etc/cron.d/laravel-cron

RUN usermod -a -G crontab www-data
RUN chmod gu+s /usr/sbin/cron

RUN python3 -c "import socket as s; sock = s.socket(s.AF_UNIX); sock.bind('/dev/shm/supervisor.sock')"

USER www-data

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

WORKDIR /var/www
