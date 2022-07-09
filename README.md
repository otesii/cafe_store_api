# cafe store api
## 🍫Description
[cafe store apiドキュメント](https://otesii.github.io/cafe_store_api/openapi/dist/index.html)  
openapi, slim4, gitlabCI, argoCDを触ってみるためにAPIを構築

## 🎏Features

## 🚲Requirement
| name      | version |
| --------- | ------- |
| ubuntu    | 20.04   |
| php       | 8.1.7   |
| composer  | 2.3.9   |
| openapi   | 3.0.0   |
| slim/slim | 4.10.0  |
| slim/psr7 | 1.5     |

## 🚀Installation
```
$ GENERATOR=php-slim4
$ docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/openapi/cafe_store_api/openapi.yaml -g ${GENERATOR} -o /local/src
$ cd ./src
$ sudo apt install php8.1-xml
$ composer install
```

## ☕Usage

## 🧜‍♂️Author
otesii
