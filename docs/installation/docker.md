# Docker installation

<div class="Alert Alert--warning">
This is only a development solution! Do not use it on production environments!
</div>

## The docker uses the following services

 - PostgreSQL 10
 - PHP 7.4
 - NGINX 1.17
 - Docsify 4
 - Nodejs 12.6
 - RabbitMQ 3.8

## How should I install it?

At first you must install Docker and Docker Compose (https://docs.docker.com/compose).

Next, you must clone frontend, backend and docs repositories to ergonode directory:

```bash
git clone git@github.com:ergonode/docker.git ergonode
cd ergonode
git clone git@github.com:ergonode/frontend.git
git clone git@github.com:ergonode/backend.git
git clone git@github.com:ergonode/docs.git
```


If you want to test ergonode in multiple directories you need to create the  `.env` file and set
COMPOSE_PROJECT_NAME env var to some unique value

If you want to change any environment variable you can optionally  change this in the `.env` file.
And all environment variables used by our docker you can find in the `docker-compose.yml` files.

Now you can start start docker by simple command

```bash
docker-compose up
```

Now you can fill  app database with basic data by using command
```bash
docker-compose exec php bin/phing database:fixture
```

Or fill database with development data with command
```bash
docker-compose exec php bin/phing database:fixture:dev
```

Enjoy :)

## Ok, but what now?


If you want to view frontend panel just type address from below into your browser

```
http://localhost
```

And to test app you can login as `test@ergonode.com` with password `abcd1234`

If you want to view backend API doc just type address from below into your browser

```
http://localhost:8000/api/doc
```

If you want to review messages on RabbitMQ, type address from below into your browser

```
http://localhost:15672
```

## What can i do with this creature?

To run all tests execute
```bash
docker-compose exec php bin/phing test
```

To run symfony console
```bash
docker-compose exec php bin/console
```

To add new users you can use command
```bash
docker-compose exec php bin/console ergonode:user:create  <email> <first_name> <last_name> <password> <language> [<role>]
```

If you want to enter some container

```bash
docker-compose exec php bash
docker-compose exec postgres bash
docker-compose exec nuxtjs bash
```

<div class="Alert Alert--warning">

You have some problems check our [FAQ](faq.md)

</div>
