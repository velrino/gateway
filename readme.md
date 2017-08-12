# Gateway API


Simple API is the project default for start API

## Contain
  - Dingo API setting for RESTFULL
  - ENV for envoriment variables

## Installation

After cloning:
- composer update

### Require to run:

 - Docker
	 - https://docs.docker.com/engine/installation/
 -  Image apache2, php 7 for run Lumen:
	 - docker pull velrino/framework-php:laravel52
 -  Image mongo:
	 - https://hub.docker.com/_/mongo


docker run -d --name=NAME -p PORT:80 --restart=unless-stopped --link=mysql57 -v $(pwd):/var/www/html velrino/lap7:lumen

----------


# Lumen Framework

[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

#### Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

#### License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
