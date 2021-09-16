FROM ubuntu:20.04


ENV NGINX_VERSION 1.9.3-1~jessie
RUN apt update
RUN apt upgrade -y

RUN apt install software-properties-common -y

# RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN add-apt-repository ppa:ondrej/php -y
RUN apt update -y

RUN apt-get update && apt-get install -y nginx php7.3-fpm php7.3-common php7.3-mysql php7.3-xml php7.3-xmlrpc php7.3-curl php7.3-gd php7.3-imagick php7.3-cli php7.3-dev php7.3-imap php7.3-mbstring php7.3-opcache php7.3-soap php7.3-zip php7.3-intl  curl git && apt-get clean

# NGINX
RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log
VOLUME ["/var/cache/nginx"]
RUN rm /etc/nginx/sites-available/default
ADD ./config/default /etc/nginx/sites-available/default

# COPY php.ini /etc/php/7.0/fpm/php.ini
CMD service php7.3-fpm start && nginx -g "daemon off;"

COPY . /var/www/html
RUN chmod -R 777 /var/www/html 
RUN mkdir /var/www/.aws
WORKDIR /var/www/html
# CMD  php composer.phar install 

EXPOSE 80 
