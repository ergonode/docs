# Installation and Configuration


## Quick Start

(to be complted)

## Phing - commands

| Commands           | Description                                                                                                                                                                         | Dependencies                                                                 |
|--------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------|
| `test:unit:coverage` | Unit test coverage - phpunit                                                                                                                                                        |                                                                              |
| `test:unit`          | Unit test - phpunit                                                                                                                                                                 |                                                                              |
| `test:behat`         | Black-box testing- behat                                                                                                                                                            |                                                                              |
| `test`               | Full application  testing (migrations, fixtures, PHPUnit, Behat)                                                                                                                    | database:migrate, database:fixture, test:unit, test:behat                    |
| `database:migrate`   | Adding migration to database                                                                                                                                                        |                                                                              |
| `database:fixture`   | Adding fixtures to database                                                                                                                                                         |                                                                              |
| `create:directory`   | Essential directory creation                                                                                                                                                        |                                                                              |
| `check:style`        | Code inspection (CS, MD, CPD)                                                                                                                                                       | check:php, check:cs, check:cpd, check:md                                     |
| `check:php`          | Checking compatibility with PHP 7.2 - code sniffer                                                                                                                                  |                                                                              |
| `check:md`           | Mass detector                                                                                                                                                                       |                                                                              |
| `check:cs`           | Checking coding standards - code sniffer ([coding standards](backend/quality_and_code_standards.md)) |                                                                              |
| `check:cpd`          | Copy/paste detector                                                                                                                                                                 |                                                                              |
| `cache:clear`        | Clear cache                                                                                                                                                                         |                                                                              |
| `build:local`        | Local application update (directory creation, migrations, tests)                                                                                                                    | create:directory, check:style, database:migrate, database:fixture, test:unit |
| `build`              | Production - build                                                                                                                                                                  | cache:clear, create:directory, database:migrate                              |
