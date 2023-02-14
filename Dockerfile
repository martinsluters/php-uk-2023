FROM php:fpm-alpine

ARG uid=1000
ARG user=martins

RUN apk update && apk add shadow

RUN useradd -G	www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

USER $user

#RUN composer install

