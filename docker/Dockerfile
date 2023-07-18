FROM ubuntu:22.04

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/blast

# Add the PHP repo
RUN apt update \
    # add support for adding apt repositories, install flex and bison.
    && apt install -y \
    software-properties-common \
    flex \
    bison \
    && add-apt-repository ppa:ondrej/php \
    # Install php8
    && apt install -y \
    php8.2 \
    php8.2-cli \
    php8.2-fpm \
    php8.2-mbstring \
    php8.2-curl

CMD ["/bin/bash"]
