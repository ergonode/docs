# PHPUnit

At Ergonode we try to test as much as possible using unit tests. By default, tests are run with every pull request.
There are two ways to run all the tests at home.

First use phing
```
bin/phing test:unit
```

Or second 
```
bin/phpunit 
```

If use second options You can run one test  
```
bin/phpunit module/core/tests/Application/Form/DataTransformer/BooleanDataTransformerTest.php 
```

