# Tests

If you have already created your module it is recommended to create unit tests and behat tests 
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
We currently use phpunit 9.0. 

https://phpunit.de/documentation.html


## Behat testing

For behat you also create tests  according to behat documentation and recommendations.

If you create a module for creating new model/entity then you may need to create `Behat/Context` to have possibility 
creating this model/entity in behat tests.

We are using `Behatch/contexts` extension for behat, and you should use this extension for testing your modules. 
You can find examples of `Behatch/contexts`  in https://github.com/Behatch/contexts/tree/master/tests/features 
and in backend code `module/account/features/account-behatch.feature`, `module/attribute/features`.


To run all tests you can run commands like:
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
