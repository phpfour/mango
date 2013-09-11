# Mango

Mango is an application process tracking and measurement service especially useful for tracking distributed systems and services.

## Installation

Mango currently supports ZMQ as its RPC mechanism. The following installation assumes you have composer installed.

    $ git clone git://github.com/phpfour/mango.git
    $ cd mango
    $ composer install

Once the components are downloaded, run the server using the following command:

    $ cd scripts
    $ ./server.php

In a separate terminal, run the following to see it in action:

    $ cd scripts
    $ ./client.php

The messages should appear in your local MongoDB server, within a database called "mango".

## Roadmap

* YAML based configuration
* REST based API
* More storage backend (MySQL, Redis)
* Metrics (Statsd)
* Silex based web app
