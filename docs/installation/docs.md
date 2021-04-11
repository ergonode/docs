# Documentation installation

### Quick start

**1) Getting started**

Clone project repository to your local directory:

```bash
git clone git@github.com:ergonode/docs.git
cd docs
```

> *In case you don't have [node.js][node] and [npm][npm] installed - install the latest stable version*

**2) Start server**

* **Quick start without installing packages locally**

    ```bash
    npx docsify-cli serve docs
    ```

* **Start with package installation globally**

    ```bash
    npm i docsify-cli -g
    docsify serve docs
    ```

[npm]: https://www.npmjs.com/get-npm
[node]: https://nodejs.org/en/download/