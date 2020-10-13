# Installation

<div class="Alert Alert--warning">

This document is for everyone who wants to develop Ergonode application. If you want to use it [check here](installation/backend-development.md)

</div>

## Requirements

| Name          | Version    | Extension |
|---------------|------------| ---- |
| PHP           | 7.4        | ctype, exif, gd, iconv, imagick, json, pdo, zip |
| Postgress     | 10         ||
| RabbitMQ      | 3.6        ||
| Composer      | 1.6        ||

*Use for running application in asynchronous mode.

## Quick Start

Clone [backend project repository][repository] to your local directory:
```
git clone git@github.com:ergonode/backend.git
```

<div class="Alert Alert--info">

Application on default starts on **develop** branch

</div>

If you want to run last stable application version execute:
```
git checkout master
``` 
In .env file you need to configure database connection

Open your terminal in local project, and execute:
```
composer install
``` 
In .env file you need to configure database connection
```
DATABASE_URL=pgsql://db_user:db_password@127.0.0.1:5432/db_name
```
Generate keys for Json Web Token
```
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
While executing above commands you will be asked for your password. This password needs to be saved then in .env file 
in line `JWT_PASSPHRASE=yourpassword`

In terminal execute command which configures application (available phing commands):
```
bin/phing build
```

To fill database witch basic data execute command:
```
bin/phing database:fixture
```
or for development data use:
```
bin/phing database:fixture:dev
```

Run build in server
```
bin/console server:run
```

## Default user

If you fill database with basic data:

| Role       | Login             | Password |
|------------|-------------------|----------|
| Superadmin | test@ergonode.com | abcd1234 |

If you fill database with development data:

| Role             | Login                         | Password |
|------------------|-------------------------------|----------|
| Superadmin       | superadmin@ergonode.com       | abcd1234 |
| Admin            | admin@ergonode.com            | abcd1234 |
| Data Inputer     | data_inputer@ergonode.com     | abcd1234 |
| Category Manager | category_manager@ergonode.com | abcd1234 |

# Phing commands

Those command are available only in development mode

| Commands              | Description                                                                                          | Dependencies                                                                 |
|-----------------------|------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------|
| `test`                | Full application  testing (clean database, migrations, fixtures, PHPUnit, Behat)                     | database:migrate, database:fixture, test:unit, test:behat                    |
| `test:unit`           | Unit test - phpunit                                                                                  |                                                                              |
| `test:unit:coverage`  | Unit test - phpunit  with coverage                                                                   |                                                                              | 
| `test:behat`          | Behat - api integration tests                                                                        |                                                                              |
| `database:migrate`    | Run migration to database                                                                            |                                                                              |
| `database:create`     | Create database                                                                                      |                                                                              |
| `database:drop`       | Drop database                                                                                        |                                                                              |         
| `database:fixture`    | Adding basic fixtures to database                                                                    |                                                                              |
| `database:fixture:dev`| Adding development fixtures to database                                                              |                                                                              |
| `check:style`         | Code inspection (CS, MD, CPD)                                                                        | check:php, check:cs, check:cpd, check:md                                     |
| `check:md`            | Mass detector                                                                                        |                                                                              |
| `check:cs`            | Checking coding standards - code sniffer ([coding standards](backend/coding_standards.md)) |                                                                              |
| `check:cpd`           | Copy/paste detector                                                                                  |                                                                              |
| `check:phpstan`       | PHP stan -level 1 inspection                                                                         |                                                                              |
| `cache:clear`         | Clear cache                                                                                          | cache:clear, create:directory, database:migrate                              |
| `check:dependencies`  | Check module dependencies                                                                            |         |

[repository]: https://github.com/ergonode/backend

See more:
[.ENV Configuration](backend\configuration.md), [console commands](backend\console.md)
