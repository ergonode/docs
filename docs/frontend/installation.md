# Installation
This is only **frontend** installation part.<br>
Run **backend** part to make the application work properly.

<div class="Alert Alert--warning">

1. First visit [backend installation](backend/installation_and_configuration)<br>
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

1. Clone project repository to your local directory:
```bash
git clone git@github.com:ergonode/frontend.git
```

2. Open your terminal in your local project and install all node modules:
```bash
npm install
```

3. Execute CLI command and set you API URL ([env](frontend/installation?id=environment-variables)):
```bash
npm run cli:run
```

    <div class="Alert Alert--info">

    <b>Info: </b> You can also copy <code>.env.dist</code> file as <code>.env</code> and set your API URL configuration.

    </div>

2. Run server
   
    ```bash
    #development mode
    npm run dev

    #production mode
    npm run build
    npm run start
    ```


## Configuration
---

#### Environment variables

| Variable    | Description                            |
|-------------|----------------------------------------|
| ```API_PROTOCOL``` | protocol variable (e.g. ```http``` / ```https```) |
| ```API_HOST``` | host variable (e.g. ```localhost```) |
| ```API_PREFIX``` | prefix (e.g. ```/api/{version}```) |
| ```API_PORT``` | port if exists (e.g. ```8000```) |



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
