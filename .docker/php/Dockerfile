FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
USER root
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libonig-dev \
    libpq-dev \
    libgd-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmagickwand-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-install mbstring zip exif pcntl \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-configure gd --with-jpeg --with-freetype
RUN docker-php-ext-install -j$(nproc) gd
RUN rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 sergey
RUN useradd -u 1000 -ms /bin/bash -g sergey sergey

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=sergey:sergey . /var/www

# Change current user to www
USER sergey

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
