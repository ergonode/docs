# Installation for development

<div class="Alert Alert--warning">

1. First visit [backend installation][be] part to make the application work properly<br>
2. Use backend URL in your `.env` file or use [cli commend](installation/frontend?id=configuration).

</div>

## Requirements
---

1. In case you don't have [node.js][node] installed - install the latest stable version.
2. Choose your package manager:
   1. [npm][npm]
   2. [yarn][yarn]
3. Install [git][git] if needed.

## Quick Start
---
If you are an Ergonode Partner implementing **Ergonode** for your clients - this installation is for you:


**1) Getting started**

Clone project repository to your local directory:

```bash
git clone git@github.com:ergonode/skeleton-frontend.git
cd skeleton-frontend
```

Install project dependencies:

```bash
npm install
```

Set your local `.env` file:

```bash
npm run env
```
> *You may want to override created `.env` file by other settings*

**2) Module configuration**

<div class="Alert Alert--warning">

1. In the skeleton repository all modules ale loaded from [npm.js server][npm-ergo].
2. If you create your own module you have to add it yourself to the `modules.config.js` file.
3. Running the commands below overwrite the `modules.config.js` file and starts the module installation.

</div>

Follow **CLI** steps to choose your modules:

```bash
npm run modules
```

You might want automatically setup all modules by executing command:
```bash
npm run modules:all
```
> *You may want to override created `modules.config.js` file by other settings, but then you mast run `npm install` command!*

**3) Build**

Run **development** mode

```bash
npm run dev
```

Run **production** mode

```bash
npm run build
npm run start
```


## Configuration
---

#### Environment variables

| Variable    | Default | Description                   |
|-------------|---------|-------------------------------|
| ```API_BASE_URL``` | `http://localhost:8000/api/v1/` | Base backend API url  |
| ```LEAVE_TEST_TAG_ATTRS``` | `false` | Leave Cypress e2e ids when needed |


#### Npm commands

| Commends    | Description                            |
|-------------|----------------------------------------|
| npm run dev | Starting local sever listening changes |
| npm run build | Build code |
| npm run start | Starting building code |
| npm run env | CLi with .env configuration |
| npm run modules | CLI with modules configuration |
| npm run modules:all | CLI to set all modules |

[be]: installation/backend-contribution
[node]: https://nodejs.org/en/download/
[npm]: https://www.npmjs.com/get-npm
[yarn]: https://yarnpkg.com/en/
[git]: https://git-scm.com/downloads
[npm-ergo]: https://www.npmjs.com/search?q=keywords:ergonode-module