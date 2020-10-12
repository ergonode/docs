# Installation for development

## Requirements

| Name          | Version    | Extension |
|---------------|------------| ---- |
| PHP           | 7.4        | ctype, exif, gd, iconv, imagick, json, pdo, zip |
| Postgress     | 10         ||
| RabbitMQ      | 3.6        ||
| Composer      | 1.6        ||


## Quick Start

Create new project:
```
composer create-project ergonode/skeleton my_project_name
```

Go to my_project_name directory and type
```
composer install
``` 
Create ```.env.prod``` file and add lines with database access configuration
```
DATABASE_URL=pgsql://db_user:db_password@127.0.0.1:5432/db_name
```
Generate keys for Json Web Token
```
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
While executing above commands you would be asked about password. This password needs to be saved then in .env file 
in line `JWT_PASSPHRASE=yourpassword`

Execute the following commands to initialise the database
```
bin/console doctrine:database:create
bin/console ergonode:migrations:migrate
```

Fill database with initial data execute command:
```
bin/phing database:fixture
```

Now you can add user using [console command](backend/commands) ```ergonode:user:create```

```
ergonode:user:create test@ergonode.com Johny Bravo abcd1234 en_GB
```

Run build in symfony server
```
bin/console server:run
```

See more:
[.ENV Configuration](backend\configuration.md), [console commands](backend\console.md)