# TravelCard

You are given a stack of boarding cards for various transportations that will take you from a point A to point B via several stops on the way. All of
the boarding cards are out of order and you don't know where your journey starts, nor where it ends. Each boarding card contains information
about seat assignment, and means of transportation (such as flight number, bus number etc)

Write an API that lets you sort this kind of list and present back a description of how to complete your journey.
For instance the API should be able to take an unordered set of boarding cards, provided in a format defined by you

## Description

+ To write the program was used Domain-driven design (DDD) approach. 
+ The Laravel command bus provides a convenient method of encapsulating tasks your application needs to perform into simple, easy to understand "commands".
+ In order to reduce the number of requests on the server, caching of query results was used.
+ Basically, a .env file is an easy way to load custom configuration variables that your application needs without having to modify .htaccess files or Apache/nginx virtual hosts.
+ Monolog sends your logs to files, sockets, inboxes, databases and various web services.
+ The EventDispatcher component use for dispatching events and listening to them.
+ Use a PHP HTTP client Guzzle to send HTTP requests and trivial to integrate with web services.
+ Use a PHPUnit testing framework for cover application tests 

## Server

For run application use a Docker - is an open platform for developers and sysadmins to build, ship, and run distributed applications. 

## Client
 - **[<code>POST</code> client/index/:data](https://github.com/dykyi-roman/TravelCard/blob/master/client/README.md)**
 
## Install

+ composer install && composer dumpautoload -o
+ change URL path to client API in .env file
 
## Usage

```php
 php index.php
```

```
**************************************************
************ Welcome to Application **************
**************************************************

Usage:
   command [options]

Available commands:
   Version    - Application version
   BuildRoute - Build Route
```

```php
 php index.php BuildRoute
```
```
Take train 78A From Madrid to Barcelona. Sit in seat 45B.
Take airport bus From Barcelona to Gerona.No seat assignment.
Take flight SK455, Gate 45B. From Gerona to Stockholm. Sit in seat 3A. Baggage drop at ticket counter 344.
Take flight SK22, Gate 22. From Stockholm to New York. Sit in seat 7B. Baggage will we automatically transferred from your last leg.
You have arrived at your final destination

```

## Author
[Dykyi Roman](https://www.linkedin.com/in/roman-dykyi-43428543/), e-mail: [mr.dukuy@gmail.com](mailto:mr.dukuy@gmail.com)
