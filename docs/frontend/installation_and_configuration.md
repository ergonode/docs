# Installation and configuration

## Quick Start

1. Fork [reporistory](https://github.com/ergonode/frontend)
1. In case that you do not have [node.js](https://nodejs.org/en/download/) installed - install latest stable version
1. Choose your package manager:
    1. [npm](https://www.npmjs.com/get-npm)
    1. [yarn](https://yarnpkg.com/en/docs/install#mac-stable)

## Npm - commands

| Commends    | Description                            |
|-------------|----------------------------------------|
| npm install | Installing node package manager |
| npm run dev | Starting local sever listening changes |
| npm run lint | Starting style and code linters |
| npm run test | Starting unit tests |

## Create .env
Based on ```.env.dist``` create ```.env``` file.

1. ```API_PROTOCOL``` - protocol variable (e.g. ```http``` / ```https```)
1. ```API_HOST``` - host variable (e.g. ```localhost```)
1. ```API_PREFIX``` - prefix (e.g. ```/api/{version}```)
1. ```API_PORT``` -  port if exists (e.g. ```8000```)
