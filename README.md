# cafe store api
## Description
いろいろな学習用にAPIを実装

https://otesii.github.io/cafe_store_api/docs/dist/index.html

## Features

## Requirement

## Installation
```
$ GENERATOR=php-slim4
$ docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/openapi/cafe_store_api/openapi.yaml -g ${GENERATOR} -o /local/src
$ cd ./src
$ sudo apt install php8.1-xml
$ composer install
```

## Usage

## Author
otesii