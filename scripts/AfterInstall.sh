#!/usr/bin/env bash

# Bail on error.
set -e;

# Set permissions.
chown -R ec2-user:apache /var/www/html

# Go to the install directory.
cd /var/www/html

# Create the .env file.
cat > .env << EOF
MIX_APP_ENV=production
MIX_API_URI=https://api.connectedkingston.uk/core/v1
MIX_BUGSNAG_API_KEY=77cdf9175a5584df05a75924b7febf4a
EOF

# Install NPM dependencies.
npm install

# Install composer dependencies.
export COMPOSER_HOME="$HOME/.config/composer/"
composer install --no-interaction --no-dev

# Compile assets.
npm run production
