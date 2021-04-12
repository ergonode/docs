# Create New Project

#### How to create a new Ergonode project for implementation process.

---
When building your own project based on **Ergonode**, it is best to use the [skeleton-frontend repository][git-skelet].
> [Instructions][doc-install] on how to install the project.

You have full freedom in installing the modules, you can choose the ones you need.<br>
Once the project is installed correctly, you can use the `npm run modules` command to select the modules you are interested in.<br>

> Of course, you can also add your own modules - instruction [here][doc-new-module].

The **skeleton repository** runs on modules installed directly from the **npm server**, which are officially released.<br>
To keep up to date with the project you need to **upgrade modules to the latest version**.

<div class="Alert Alert--warning">

The **Ergonode** npm modules** cannot be modified!<br>

</div>

The only possibility of changes is to use **Ergonode mechanisms** to change or extend the Core elements of the application.

> When making your own modification, you have to remember that when you upgrade the npm modules, problems may arise.<br>
**Be aware of your own changes**.


[git-skelet]: https://github.com/ergonode/skeleton-frontend
[doc-install]: /installation/frontend?id=installation-for-development
[doc-new-module]: /frontend/cookbook/new_module
