# Architecture and technologies

## Technology stack

|         |                                                                       |
|------------------|------------------------------------------------------------------------------------------------------------------------------|
| Language         | PHP 7.2                                                                                                                      |
| Framework        | Symfony 4.1                                                                                                                  |
| Database         | Postgres 10  + uuid-ossp, ltree                                                                                              |
| Message Broker   | RabbitMQ 3.6.10                                                                                                              |
| Testing          | PHPunit 7.2 + ctype, iconv, json, pdo,curl, libxml, xml, xmlrpc, pdo_pgsql, mbstring, intl, fileinfo, bcmath, amqp Behat 3.4 |
| Additional tools | Phing 2.16                                                                                                                   |


## Hexagonal Architecture

In Ergonode is used Hexanogal architecture.

Hexagonal Architecture is an architectural style that moves a programmer’s focus from conceptual layers to a distinction between the software’s inside and outside parts.

If you want to find out more about this concept please [click here](https://herbertograca.com/2017/11/16/explicit-architecture-01-ddd-hexagonal-onion-clean-cqrs-how-i-put-it-all-together/)


## Domain-driven design

Ergonode is using Domain-driven design approach.

DDD is about designing software based on models of the underlying domain. A model acts as a UbiquitousLanguage to help communication between software developers and domain experts. It also acts as the conceptual foundation for the design of the software itself - how it's broken down into objects or functions.

 You can find out more about this concept [click here](https://en.wikipedia.org/wiki/Domain-driven_design)


## Command Query Responsibility Segregation

Ergonode is using CQRS patter.

CQRS pattern states that every method should either be a command that performs an action, or a query that returns data to the caller, but not both.

You can find out more about this concept [click here](https://en.wikipedia.org/wiki/Command%E2%80%93query_separation#Command_query_responsibility_segregation)

## Event Sourcing

Ergonode is using Event Sourcing pattern.

Event Sourcing is focusing on current state, on changes that have occured over time. It is the practice of modeling your system as a sequence of events.

You can find out more about this concept [click here](https://dev.to/barryosull/event-sourcing-what-it-is-and-why-its-awesome)
