#!/bin/sh

# Check composer installation
if ! type /usr/local/bin/composer > /dev/null 2>&1; then

    # Check brew installation
    if ! type /usr/local/bin/brew > /dev/null 2>&1; then
        echo 'Installing homebrew'
        ruby -e "$(curl -fsSL https://raw.github.com/mxcl/homebrew/go/install)"
    fi

    echo 'Installing composer using Homebrew'
    brew tap josegonzalez/homebrew-php
    brew install josegonzalez/php/composer
fi

# Check composer installation
if ! type /usr/local/bin/phpunit > /dev/null 2>&1; then

    # Check wget installation
    if ! type /usr/local/bin/wget > /dev/null 2>&1; then
        echo 'Installing wget'
        /usr/local/bin/brew install wget
    fi
    
    echo 'Installing phpunit'
    wget https://phar.phpunit.de/phpunit.phar
    chmod +x phpunit.phar
    mv phpunit.phar /usr/local/bin/phpunit
    phpunit --version
fi

echo 'Fetching dependencies'
/usr/local/bin/composer install

echo 'Run unit tests'
/usr/local/php5/bin/phpunit
