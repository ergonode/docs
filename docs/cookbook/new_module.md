
# The Ergonode Module System 

The new module must be compatible with the [architecture] described in [architecture] chapter.

## Folder structure
    
```        
features/
migrations/
tests/
src/
├── Application
├── Domain
├── Infrastructure       
├── Persistence
├── Resources
```
## Create 

To Create new module you need create a `composer.json` in your main module dir.
With your requirements for your module.

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

Next  you need create a new module class which extends `Ergonode\Core\Application\AbstractModule` in `src` folder.

```php
    use Ergonode\Core\Application\AbstractModule;
    
    /**
     */
    class YourModule extends AbstractModule
    {
    }

``` 

In your application you must add a new class to the array in `config/bundles.php` file

```php
YourNamespace\YourModule::class => ['all' => true]
```


[//]: # 

[architecture]: <../backend/architecture.md>