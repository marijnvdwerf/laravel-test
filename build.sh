#!/bin/sh

# Check composer installation
if ! type /usr/local/bin/composer > /dev/null 2>&1; then

    # Check brew installation
    if ! type /usr/local/bin/brew > /dev/null 2>&1; then
        echo 'Installing homebrew'
        ruby -e "$(curl -fsSL https://raw.github.com/mxcl/homebrew/go/install)"
    fi

    echo 'Installing composer using Homebrew'
    /usr/local/bin/brew tap josegonzalez/homebrew-php
    /usr/local/bin/brew install josegonzalez/php/composer
fi

# Check composer installation
if ! type /usr/local/bin/phpunit > /dev/null 2>&1; then

    # Check wget installation
    if ! type /usr/local/bin/wget > /dev/null 2>&1; then
        echo 'Installing wget'
        /usr/local/bin/brew install wget
    fi
    
    echo 'Installing phpunit'
    /usr/local/bin/wget https://phar.phpunit.de/phpunit.phar
    /bin/chmod +x phpunit.phar
    /bin/mv phpunit.phar /usr/local/bin/phpunit
    /usr/local/bin/phpunitphpunit --version
fi

echo 'Fetching dependencies'
/usr/local/bin/composer install

echo 'Run unit tests'
/usr/local/php5/bin/phpunit
