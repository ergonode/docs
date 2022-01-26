# Upgrade guide

<div class="Alert Alert--alert">

It's very important to run both Backend and Frontend at same versions. Please refer to [versioning guide](versioning.md)

</div>

To upgrade Ergonode to the newer version you need to follow those steps:

#### Frontend

**1) Synchronising packages**

- pull the latest / specific tag from the [frontend skeleton repository](https://github.com/ergonode/skeleton-frontend)

<div class="Alert Alert--warning">

Execute **npm run modules:all** command, it will upgrade to the latest packages only

</div>

- To upgrade to specific version, you need to navigate to the `package.json` and change versions manually for example:

  - You are running Ergonode at 1.0.0
  - Your "@ergonode/attribute-groups": "^1.0.0", module is at 1.0.0
  - You need to change "@ergonode/attribute-groups": "^1.0.0", to "@ergonode/attribute-groups": "^1.1.0",
  - execute command `npm install` 

**2) Checking upgrade guide**

- Look at the latest / specific **UPGRADE-X.md** guide from the [frontend repository](https://github.com/ergonode/frontend) if exists

**3) Build**

- install dependencies

```bash
npm install
```

- rebuild server

```bash
npm run build
```

- start server

```bash
npm run start
```

#### Backend

**1) Synchronising packages**

- To update packages one by on execute

```bash
composer require ergonode/PACKAGE_NAME:VERSION
```

- To update the packages all at once refer to [composer guide](https://getcomposer.org/doc/03-cli.md#require)

**2) Checking upgrade guide**

- Look at the latest / specific **UPGRADE-X.md** guide from the [backend repository](https://github.com/ergonode/backend) if exists

**3) Build**

- install dependencies

```bash
composer install
```

- clear cache
```bash
bin/console cache:clear
```

- migrate database

```bash
bin/console ergonode:migrations:migrate
```
