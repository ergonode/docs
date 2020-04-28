# How to create new api endpoint

In Ergonode each action is responsible for one endpoint. 

Name of every action needs to end with `Action.php`

This file should live in following namespace `Your-module\Application\Controller\Api\`

## Adding yaml configuration

If you create a new module and this is your first action you need to add `routes.yml` file to `your-module/src/Resources/config/` directory.

This file should look like this:

```yaml
ergonode_module-name_api:
    resource: '../../Application/Controller/Api/*'
    type: 'annotation'
    prefix: '/api/v1/{language}'
``` 

It will tell the system where files with actions live, that we use annotation and what prefix would be in links to our endpoints.

## Action file structure

As we use annotation for configure our endpoint just before class definition we need to add route details

```php
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     name="ergonode_your-module_read",
 *     path="/your-module/{object}",
 *     methods={"GET"},
 *     requirements={"object"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"}
 * )
 */
class CustomNameAction
```
* `name` - endpoint name
* `path` - endpoint address
* `methods` - what methods are allowed
* `requirements` - route requirements can be used to make a specific route only match under specific conditions

Action class needs to have `__invoke` function. This function should return one of Responses which are under following namespace:
`Ergonode\Api\Application\Response\`

## Api Docs

All endpoints in Ergonode core are documented in annotations by NelmioApiDoc. It is strongly recommended to use this tool for custom endpoints as well. 

For more info click --> [here](https://symfony.com/doc/current/bundles/NelmioApiDocBundle/index.html)
