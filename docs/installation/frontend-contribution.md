# Contribution installation


<div class="Alert">

If you want to use a simpler installation method, you can use our [docker][docker].

</div>

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
If you are a developer that needs help with building **Ergonode** - this installation is for you:


**1) Getting started**

Clone project repository to your local directory:

```bash
git clone git@github.com:ergonode/frontend.git
cd frontend
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

1. In the development repository all modules are placed locally in the repository.
2. CLI loads all modules from the `_availableModules` property in `package.json` file.
3. These commands overwrite the `modules.config.js` file!

</div>

Follow **CLI** steps to choose your modules:

```bash
npm run modules
```

You might want automatically setup all modules by executing the command:
```bash
npm run modules:all
```
> *You may want to override created `modules.config.js` file by other settings*

**3) Build**

> By default, the server starts at address: <code>http://localhost:3000</code>.

Run **development** mode.

```bash
npm run dev
```
> To set a different **port**, you need run command: <code>npm run dev -- --port 3001</code><br>
> To set a different **hostname**, you need run command: <code>npm run dev -- --hostname 'new-hostname'</code>

Run **production** mode

```bash
npm run build
npm run start
```
> To set a different **port**, you need run command: <code>npm run start -- --port 3001</code><br>
> To set a different **hostname**, you need run command: <code>npm run start -- --hostname 'new-hostname'</code>



## Configuration
---

#### Environment variables

| Variable    | Default | Description                   |
|-------------|---------|-------------------------------|
| ```API_BASE_URL``` | `http://localhost:8000/api/v1/` | Base backend API url  |
| ```LEAVE_TEST_TAG_ATTRS``` | `false` | Leave Cypress e2e ids when needed |



####  Npm commands

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
| npm run env | CLi with .env configuration |
| npm run modules | CLI with modules configuration |
| npm run modules:all | CLI to set all modules |
| npm run storybook | Start storybook  |
| npm run build-storybook | Build storybook  |
| npm run cypress:open | Open cypress tests in browser  |
| npm run cypress:run | Run cypress tests in console |
| npm run publish:all | Publish all npm modules  |
| npm run list:modules | List all modules  |


[be]: installation/backend-contribution
[node]: https://nodejs.org/en/download/
[npm]: https://www.npmjs.com/get-npm
[yarn]: https://yarnpkg.com/en/
[git]: https://git-scm.com/downloads
[docker]: installation/docker
[npm-ergo]: https://www.npmjs.com/search?q=keywords:ergonode-module