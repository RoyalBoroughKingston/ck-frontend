# Connected Kingston - Frontend

The frontend website component to the [API](https://github.com/RoyalBoroughKingston/ck-api).

## Getting started

These instructions will get you a copy of the project up and running on your local machine for 
development and testing purposes. See [deployment](https://github.com/RoyalBoroughKingston/ck-frontend#deployment) 
for notes on how to deploy the project on a live system.

### Prerequisites

* [Connected Kingston - API](https://github.com/RoyalBoroughKingston/ck-api)
* [Docker](https://www.docker.com)

### Installing

Start by spinning up the docker containers using the convenience script:

```bash
# Once copied, edit this file to configure as needed.
cp .env.example .env

# Spin up the docker containers and detach so they run the background.
APP_PORT=8080 ./develop up -d

# Install dependencies.
./develop npm install

# Compile static assets.
./develop npm run dev
```

You should now be able to view the website by visiting [localhost:8080](http://localhost:8080),
depending on what port you specified above.

## Deployment

This project is intended to be deployed onto AWS infrastructure using 
[CodeDeploy](https://aws.amazon.com/codedeploy).

## Built with

* [Vue.js](https://vuejs.org) - The JavaScript Framework Used
* [Composer](https://getcomposer.org) - Dependency Management

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the
process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the
[tags on this repository](https://github.com/RoyalBoroughKingston/ck-frontend/tags).

## Authors

* [Ayup Digital](https://ayup.agency/)

See also the list of [contributors](https://github.com/RoyalBoroughKingston/ck-frontend/contributors) who
participated in this project.

## License

This project is licensed under the GNU License - see the [LICENSE.md](LICENSE.md) file for details.
