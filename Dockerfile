FROM php:5.4-apache

RUN for key in AA8E81B4331F7F50 7638D0442B90D010 9D6D8F6BC857C906; do \
        gpg --recv-keys "$key" \
        && gpg --export "$key" | apt-key add - ; \
    done
    
    
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get install -y python3 python3-pip
RUN apt-get install -y php5-gd 
RUN service apache2 restart