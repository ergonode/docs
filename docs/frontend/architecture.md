## Architecture

**Ergonode** is a project that has been developed towards **micro service** from the very beginning. <br>
The application is divided into backend part, which provides API and headless front-end part. <br>
Although backend division into microservices is a quite popular approach, it’s not exactly a front-end microservice. <br>
This approach is called micro frontend — not so popular, and not so easy to use.
<br>
<br>
While designing front-end applications we're using Vue and Nuxt as our leading technologies <br>
and we didn’t really want to frame it into some overly complicated tools. <br>We want to stay in one framework and keep the technologies in use to a minimum.

<p align="center">
     <img src="images/full_ergo_architecture.png"
          alt="Ergonode architecture"
          />
</p>

### Assumptions

* **Fully modular application** — apart from functionalities created by the core team, <br>
we want to allow other developers to create their own modules that will be extending the mechanisms of our application. <br>
It is challenging, because you need to properly prepare the architecture for such extensions, not only from the backend, but also from the frontend.

* **Core of the application remains unchanged** — extensions and modules do not affect the code written by the core team.<br>
Modules can use solutions already implemented, but they cannot modify them.

* **Module versioning** — each module should be delivered in releasable versions. <br>
Customers should have a choice whether or not to upgrade a module, and the package update process itself should be very simple.

* **Simple module management** — modules can be stored and hosted in external npm services. <br>
Installation and uninstallation should be a smooth process.

* **Stay with Vue** — as the application was developed on the Vue and Nuxt frameworks, <br>
we want to continue using these technologies and not add any more unnecessary libraries if possible.

* **Simple addition of modules** — a very easy process of creating a new module and smooth communication between the modules.

### Solution

All the problems and needs led us to a situation where we decided that the best solution would <br>
be to write our own library to help create “Microservices” architecture using Vue and Nuxt technology. <br>
This prevented us from adding any new unnecessary frameworks.<br>
We decided to transform the written solution into a library npm, so that it could serve other companies facing similar problems.
<br>
<br>
That’s how the [VueMS](https://www.npmjs.com/package/@ergonode/vuems) library was created. <br>

> *[More information here](frontend/architecture/app-structure.md)*
<br>

### Details

* [**Application structure**](frontend/architecture/app-structure.md)
* [**Module structure**](frontend/architecture/module-structure.md)
