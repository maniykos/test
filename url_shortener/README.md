# Задание
    
    1. Application should have form with field where user can put valid url (validation should be done by direct call of the provided url and check HTTP response code).
    
    2. Application should generate short url. Example: http://domaincom/cedwdsfl
    
    3. It should be possible to enter desired short url (another field).
    
    4. Application should validate if requested short url is not in use yet.
    
    5. Application should store original and short url pair in DB. User than can share short url with other users and once they try to access short url they should be redirected to
    
    original url.




Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```


Task
-------------------
```
	1. Application should have form with field where user can put valid url (validation should be done by direct call of the provided url and check HTTP response code).
	2. Application should generate short url. Example: http://domaincom/cedwdsfl
	3. It should be possible to enter desired short url (another field).
	4. Application should validate if requested short url is not in use yet.
	5. Application should store original and short url pair in DB. User than can share short url with other users and once they try to access short url they should be redirected to
original url.

Extra Credit
	1. Application should have configuration file. logging system.
	2. Application should remove origin-short url pair from DB on the 15th day after its creation.
	3. Application should count amount of short url usage. Application should have API for short url creations.
```

Install
-------------------
```
	1. #php init
	2. Edit configuration file:  /my-project-name.local/common/config/main-local.php
	3. #php yii migrate
	4. Create user account in domain/site/signup
	5. Put in url domain/url-shortener
	6. Create Url Shortener located at :domain/url-shortener/create
```

Crone
-------------------
```	
	#yii urlshortener/clean     -  remove origin-short url pair from DB on the 15th day after its creation
```		
	
Config file
-------------------
```	
	\common\config\params.php	 -  configuration file
```





















