# Tests 

If you have already created your module it is recommended to create unit tests and beaht tests 
in `tests` (unit tests) and `features` (behat tests) directory.

## Module Folder structure
    
```        
features/  Beaht tests
migrations/
tests/   Unit tests
├── Behat/Context  Some behat Context related to your module.
src/
├── Application
├── Domain
├── Infrastructure       
├── Persistence
├── Resources
```

## Unit tests

You should do unit tests according to phpunit documentation and recommendations.
We currently using phpunit 9.0. 

https://phpunit.de/documentation.html


## Behat testing

For behat you also create tests  according to behat documentation and recommendations.

If You create some module for creating new kind model/entity then you should create `Behat/Context` for possibility 
creating this model/entity in behat tests.

And we using `Behatch/contexts` extension for behat and you should use this extension for testing your modules.
You should look  for  `Behatch/contexts` you can find in https://github.com/Behatch/contexts/tree/master/tests/features
And in backend code `module/account/features/account-behatch.feature` and in `module/attribute/features`.

And this example 
```behat
And store response param "id" as "attribute_id"
```
is deprecated because we also should provide Behat Contexts for creating data/models for your tests.


Tu run all tests you can run commands like:
```
bin/phing test
```

Only unit tests:
```
bin/phing test:unit
```

Only behat tests:
```
bin/phing test:behat
```