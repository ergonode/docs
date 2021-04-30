# Installation

**Ergonode** is a headless system which uses two different application [**frontend**][frontend] and [**backend**][backend].  
This is the sample installation that allows you to run the application quickly to familiarize yourself with it.

![Service Architecture](./images/service_architecture.png "Architecture")

From the user site Backend is PHP application to which frontend communicates using the REST API.

## Before installation
* PostgreSQL
* RabbitMQ
* PHP 7.4
* Node 12 or higher
* Composer
* npm

## Setup
For Ergonode to start correctly, it is best to run the applications in the correct order.

#### 1. PostgreSQL
Start or [install PostgreSQL][postgresql-install], of course you can use an external service.

#### 2. RabbitMQ
Start or [install RabbitMQ][rabbitmq-install], of course you can use an external service.

#### 3. Backend application setup.
If you want to install Ergonode on your local machine, you can use following command:
```shell
composer create-project ergonode/skeleton my_backend_project_name
```
It will create a `my_backend_project_name` directory with a brand new backend Ergonode application inside.
Go to `my_backend_project_name` directory, create ```.env.local``` file and add lines with database access configuration
```
DATABASE_URL=pgsql://db_user:db_password@127.0.0.1:5432/db_name
```
Generate keys for Json Web Token
```
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
While executing above commands you will be asked for your password. This password needs to be saved then in ```.env.local``` file
in line `JWT_PASSPHRASE=yourpassword`

Execute the following commands to initialise the database
```
bin/console doctrine:database:create
bin/console ergonode:migrations:migrate
```

Fill database with initial data executing command:
```
bin/console ergonode:fixture:load
```

Now you can add user using [console command][create-user-command] ```ergonode:user:create```

```
ergonode:user:create email@ergonode.com name surname password en_GB
```

See more about: [backend installation][backend-development]

#### 4. Frontend application setup.
Clone project repository to your local directory:

```bash
git clone git@github.com:ergonode/skeleton-frontend.git my_frontend_project_name
```
It will create a `my_frontend_project_name` directory with a brand new frontend Ergonode application inside.

Go to `my_frontend_project_name` directory install project dependencies:

```bash
npm install
```

Set your local `.env` file:

```bash
npm run env
```

Automatically setup all modules by executing command:
```bash
npm run modules:all
```

Build and start application 

```bash
npm run build
npm run start
```

See more about: [frontend installation][frontend-development]

#### 5. Launching application
* Launching backend php server - easiest [Symfony server][symfony-server] or via [nginx][nginx-symfony-server].
* Lunch node server 

To use the application in your browser, open:
```
localhost:3000
```

If you want to check the operation of the api, backend is:
```
localhost:8000
```

## Contribution

If you are a developer who is interested in **open-source** projects, you're in the right place because **Ergonode** is such a project.<br>
You will be very interested in installing the application this way:
* [Frontend contribution installation][frontend-contribution]
* [Backend contribution installation][backend-contribution]

We also have a docker repository in our project, which will certainly make the work easier for many people:
* [Docker installation][docker]

[backend]: backend
[frontend]: frontend
[postgresql-install]: https://www.postgresql.org/download/
[rabbitmq-install]: https://www.rabbitmq.com/download.html
[create-user-command]: backend/commands?id=create-new-user
[backend-development]: installation/backend-development
[frontend-development]: installation/frontend-development
[backend-contribution]: installation/backend-contribution
[frontend-contribution]: installation/frontend-contribution
[symfony-server]: https://symfony.com/doc/current/setup/symfony_server.html
[nginx-symfony-server]: https://symfony.com/doc/current/setup/web_server_configuration.html#nginx
[docker]: installation/docker
