
# How to create a new module

The new module must be comply with the application [architecture](backend/architecture.md).

## Folder structure
    
```        
features/
migrations/
tests/
src/
├── Application
├── Domain
├── Infrastructure
├── Resources
```
## Create 

To Create new module you need to create a `composer.json` in your module directory `modules/you-module-name/composer.json`.
Please keep in mind that you have to add all dependencies of your module (e.g. other Ergonode modules, php version)

```json
{
    "name": "your-vendor-name/your-module-name",
    "type": "ergonode-module",
    "description": "Your description",
    "license" : "Your Free License",
    "require": {
        "php": "^7.4"
    },
    "require-dev": {
        "phpunit/phpunit": "^7"
    },
    "autoload": {
        "psr-4": {
            "YourVendor\\YourModule\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "YourVendor\\YourModule\\Tests\\": "tests/"
        }
    }
}

```

Next you need create a new module class which extends `Ergonode\Core\Application\AbstractModule` in `your-module-name/src` folder.

```php
    use Ergonode\Core\Application\AbstractModule;
    
    /**
     */
    class YourModule extends AbstractModule
    {
    }

``` 

Last step is adding following line to the array in `erognode/config/bundles.php` file:

```php
YourNamespace\YourModule::class => ['all' => true]
```

To make sure that all changes are in place clear cache `bin/console cache:clear`
