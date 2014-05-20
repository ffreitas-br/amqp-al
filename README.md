## Description

This library permits `exchange messages` between applications using [RabbitMQ](http://www.rabbitmq.com/). It permits too invocation of `remote methods` implemented through message exchanges.

## How to install

You will need [composer](http://getcomposer.org/) to work with this library. Install the composer is very easy:

	$ curl -sS https://getcomposer.org/installer | php
	$ sudo mv composer.phar /usr/local/bin/composer

From this point you have **two install methods**.

### First Method

This method is recommended if you wish `develop/contribute` with the library. It uses `git` and `composer`:

	$ git clone git@bitbucket.org:westwingbrazil/message-bus-php-lib.git <your-folder>
	$ cd <your-folder> && composer install

### Second Method

This method can be used if you just want to `use` the library. In this case, all you need is add following code to the root of your file `composer.json`:

    "require": {
        "westwingbrazil/message-bus-php-lib": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@bitbucket.org:westwingbrazil/message-bus-php-lib.git"
        }
    ]

And then run `composer install --no-dev` at your project.

## How to install RabbitMQ ?

If you used `composer install` without `--no-dev` option you was gifted with a number of tools for development, including a vagrant machine with RabbitMQ. All you need is execute following command:

    $ cd vendor/westwingbrazil/vagrant-rabbitmq && vagrant up m1

And, it is done ! Now you have a fully configured RabbitMQ enviroment, as described [here](https://bitbucket.org/westwingbrazil/vagrant-rabbitmq).

## How to exchanging messages between processes ?

With your rabbitMQ installation up and running...

### 1. Start daemon

	$ php demo/running-daemon.php

### 2. Send Message

	$ php demo/send-message.php

The result must be daemon showing message in terminal.

## How to call remote procedures ?

With your rabbitMQ installation up and running...

### 1. Start daemon

    $ php demo/running-daemon.php

### 2. Call RPC Method

	$ php demo/remote-procedure-call.php

## Need more performance ?

If you need `more speed` in exchange message process you can use the [amqp extension](http://www.php.net/manual/pt_BR/book.amqp.php) for PHP. Below is a comparison:

    Library            | Messages | Time to publish (s) | Time to deliver (s)
    -------------------|----------|------------------------------------------
    PHP-amqplib        | 10000    | 16                  | 45
    PHP AMQP extension | 10000    | 5                   | 25


To `compile` and `install` extension follow this steps:

    1. $ git clone git://github.com/alanxz/rabbitmq-c.git <your-folder>
    2. $ cd <your-folder>
    3. $ git submodule init && git submodule update
    4. $ autoreconf -i && ./configure && make && sudo make install
    5. $ sudo pecl install amqp
    6. Add extension=amqp.so to php.ini
    7. $ sudo service php5-fpm restart

To assure that extension was correctly installed run

    $ php -i | grep amqp

And you should see amqp section in result.

## How to test ?

    $ ./vendor/bin/phpunit

## A little tip about daemons

You can use [upstart](http://upstart.ubuntu.com/) to assure that your daemons are up and running all the time.
There is a configuration example present in tools/upstart/messagebus.conf, follow this steps:

    1. $ sudo cp tools/upstart/messagebus.conf /etc/init
    2. $ sudo start messagebus