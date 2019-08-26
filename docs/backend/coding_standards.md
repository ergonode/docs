# Coding standards

## PHP Standards Recommendations (PSR)

Ergonode coding standards are based on PSR rules:

* [PSR-1](https://www.php-fig.org/psr/psr-1/) Basic Coding Standard
* [PSR-2](https://www.php-fig.org/psr/psr-2/) Coding Style Guide
* [PSR-4](https://www.php-fig.org/psr/psr-4/) Autoloader
* [PSR-12](https://www.php-fig.org/psr/psr-12/) Extended Coding Style

## Symfony Coding Standards

Ergonode uses [Symfony](https://symfony.com/) so it is natural that we apply to 
[Symfony Coding Standards](https://symfony.com/doc/4.3/contributing/code/standards.html) but with a few exceptions.

### Multiline inheritance and implementations

``
Declare the class inheritance and all the implemented interfaces on the same line as the class name
``

PSR-12 change it, now we can use multilines.

### Multiline arguments

``
Declare all the arguments on the same line as the method/function name, no matter how many arguments there are
``

In our opinion this is not the best way. PSR-12 change it.

### Aliases

``
Add class aliases for public services (e.g. alias Symfony\Component\Something\ClassName to something.service_name).
``

From Symfony 4 we can use interfaces. Aliasing it's not neccesery.

### Author

``
When adding a new class or when making significant changes to an existing class, an @author tag with personal contact 
information may be added, or expanded. Please note it is possible to have the personal contact information updated or 
removed per request to the core team
``

Do not use `@author` tag. Git can show the author of the changes.

## License

Egonode is released under the [OSL-3.0](https://opensource.org/licenses/osl-3.0.php) license, and the license block has 
to be present at the top of every PHP file, before the namespace.

Example:
```php
<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Ergonode;
```

## Code Sniffer

To make life easier we use a [Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) which provides validation 
of code stylistics as you type.
 
Symfony Coding Standards compliance ensures `escapestudios/symfony2-coding-standard` vendor.
