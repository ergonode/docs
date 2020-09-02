# Installation
This is only **frontend** installation part.<br>
Run **backend** part to make the application work properly.

<div class="Alert Alert--warning">

1. First visit [backend installation](backend/installation)<br>
2. Use backend URL in your `.env` file or use [cli commend](frontend/installation?id=configuration).
   
</div>

## Server requirements
---

1. In case that you don't have [node.js](https://nodejs.org/en/download/) installed - install latest stable version.
2. Choose your package manager:
   1. [npm](https://www.npmjs.com/get-npm)
   2. [yarn](https://yarnpkg.com/en/)
3. Install [git](https://git-scm.com/downloads) if you need.
   

## First steps
---

**1) Startup**

Clone project repository to your local directory:

```bash
git clone git@github.com:ergonode/frontend.git
```

Install project dependencies:

```bash
npm install
```

Set your local `.env` file:

```bash
npm run env
```
> *You may want to override created .env file by other settings*

**2) Module configuration**

Follow **CLI** steps to configure project:

```bash
npm run modules
```

You might want automatically setup all modules by executing command:
```bash
npm run modules:all
```
**3) Build**

Run development mode

```bash
npm run dev
```

Run production mode

```bash
npm run build
npm run start
```

## Configuration
---

#### Environment variables

| Variable    | Description                            |
|-------------|----------------------------------------|
| ```API_BASE_URL``` | base api url e.g. `http://localhost:8000/api/v1/` |



#### npm - commands

| Commends    | Description                            |
|-------------|----------------------------------------|
| npm run dev | Starting local sever listening changes |
| npm run build | Build code |
| npm run start | Starting building code |
| npm run lint:scss | Run SCSS linter |
| npm run lint | Run style and code linters |
| npm run lint:dev | Run development style and code linters |
| npm run test | Run unit tests |
| npm run test:dev | Run development unit tests |
| npm run test | Run unit tests |
