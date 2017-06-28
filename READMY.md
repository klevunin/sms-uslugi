# http://sms-uslugi.ru/ API PHP

## Installation

The recommended installation way is through [Composer](https://getcomposer.org).

```sh
$ composer require klev/sms-uslugi
```
Change the configuration file

    config/config.php


## Usage:
Two API methods
 - №1 - JSON - file_get_contents - lite
 - №2 - Class PHP - curl / file_get_contents

## Metod JSON:
Data array

    $data = array();
    
Please see

    src/JsonSms.php


Example 1: ( ADD CONTACT )

    require(__DIR__ . "/../vendor/autoload.php");
    $sms = new Klev\SmsUslugi\JsonSms();
    $sms->addContact($data));
    
Example 2: (DELETE CONTACT)

    require(__DIR__ . "/../vendor/autoload.php");
    $sms = new Klev\SmsUslugi\JsonSms();
    $sms->removeContact($data));
