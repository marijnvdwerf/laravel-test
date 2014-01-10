#!/bin/sh

# Check brew installation
if ! type /usr/local/bin/brew > /dev/null 2>&1; then
    echo 'Installing homebrew'
    ruby -e "$(curl -fsSL https://raw.github.com/mxcl/homebrew/go/install)"
fi

# Check wget installation
if ! type /usr/local/bin/wget > /dev/null 2>&1; then
    echo 'Installing wget'
    /usr/local/bin/brew install wget
fi

# Check composer installation
if ! type /usr/local/bin/composer > /dev/null 2>&1; then
    echo 'Installing composer'
    /usr/local/bin/wget https://getcomposer.org/installer
    /usr/bin/php installer
    /bin/chmod +x composer.phar
    /bin/mv composer.phar /usr/local/bin/composer
    /usr/local/bin/composer --version
fi

# Check phpunit installation
if ! type /usr/local/bin/phpunit > /dev/null 2>&1; then
    echo 'Installing phpunit'
    /usr/local/bin/wget https://phar.phpunit.de/phpunit.phar
    /bin/chmod +x phpunit.phar
    /bin/mv phpunit.phar /usr/local/bin/phpunit
    /usr/local/bin/phpunit --version
fi

echo 'Add different PHP distribution to path'
PATH=/usr/local/php5/bin:$PATH

echo 'Fetching dependencies'
/usr/local/bin/composer install

echo 'Run unit tests'
/usr/local/bin/phpunit
