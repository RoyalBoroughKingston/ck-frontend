#!/usr/bin/env bash

# Bail on error.
set -e

########################################
# Build.
########################################

# Create the .env file.
cat > .env << EOF
MIX_APP_ENV=$APP_ENV
MIX_API_URI=$API_URI
MIX_BUGSNAG_API_KEY=$BUGSNAG_API_KEY
EOF

# Install composer dependencies.
composer install --no-interaction

# Install NPM dependencies.
npm install

# Compile assets.
npm run dev

########################################
# Deploy.
########################################

# Create the secrets.yml file.
cat > secrets.yml << EOF
route: $FRONTEND_URI
EOF

# Connect to the Cloud Foundry API.
cf api $CF_API

# Login to Cloud Foundry.
cf login -u "$CF_USERNAME" -p "$CF_PASSWORD" -o "$CF_ORGANISATION" -s "$CF_SPACE"

# Deploy.
echo "Pushing to CloudFoundry..."
cf push --vars-file secrets.yml &> /dev/null
