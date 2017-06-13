<?php

namespace Klev\SmsUslugi;


class JsonSms
{

    function __construct()
    {
        require_once(__DIR__ . "/../config/config.php");
        if (!defined("HTTPS_LOGIN")) $this->error("Не удалось подключить конфигурационный файл. Проверьте путь до файла config.php и права на него");
    }

    function getContacts($idgroup = null, $phone = null)
    {
        $url = 'https://lcab.sms-uslugi.ru/lcabApi/getContacts.php';


        $url .= '?login=' . HTTPS_LOGIN . '&password=' . HTTPS_PASSWORD;

        if ($idgroup) {
            $url .= '&idGroup=' . $idgroup;
        } else {
            $url .= '&id=' . ID_GROUP;
        }

        if ($phone) {
            $url .= '&phone=' . $phone;
        }

        return json_decode(file_get_contents($url));

    }

    function infoContacts()
    {
        $url = 'https://lcab.sms-uslugi.ru/lcabApi/info.php';


        $url .= '?login=' . HTTPS_LOGIN . '&password=' . HTTPS_PASSWORD;


        return json_decode(file_get_contents($url));

    }

    function getGroups($idgroup = null, $namegroup = null)
    {
        $url = 'https://lcab.sms-uslugi.ru/lcabApi/getGroups.php';


        $url .= '?login=' . HTTPS_LOGIN . '&password=' . HTTPS_PASSWORD;

        if ($idgroup) {
            $url .= '&id=' . $idgroup;
        } else {
            $url .= '&id=' . ID_GROUP;
        }
        if ($namegroup) {
            $url .= '&name=' . $namegroup;
        }


        return json_decode(file_get_contents($url));

    }

    function addContact($data = array())
    {
        $url = 'https://lcab.sms-uslugi.ru/lcabApi/addContact.php';


        $url .= '?login=' . HTTPS_LOGIN . '&password=' . HTTPS_PASSWORD;

        //id группы, в которую нужно добавить контакт
        if (isset($data['idGroup'])) {
            $url .= '&idGroup=' . $data['idGroup'];
        } else {
            $url .= '&idGroup=' . ID_GROUP;
        }
        //Номер телефона
        if (isset($data['phone'])) {
            $url .= '&phone=' . $data['phone'];
        }
        //Email
        if (isset($data['email'])) {
            $url .= '&email=' . $data['email'];
        }
        //Фамилия
        if (isset($data['f'])) {
            $url .= '&f=' . $data['f'];
        }
        //Имя
        if (isset($data['i'])) {
            $url .= '&i=' . $data['i'];
        }
        //Отчество
        if (isset($data['o'])) {
            $url .= '&o=' . $data['o'];
        }
        //День рождения в формате ГГГГ-ММ-ДД
        if (isset($data['bday'])) {
            $url .= '&bday=' . $data['bday'];
        }
        //Пол. 1 - мужской, 2 - женский.
        if (isset($data['sex'])) {
            $url .= '&sex=' . $data['sex'];
        }


        return json_decode(file_get_contents($url));

    }


    function removeContact($data = array())
    {
        $url = 'https://lcab.sms-uslugi.ru/lcabApi/removeContact.php';


        $url .= '?login=' . HTTPS_LOGIN . '&password=' . HTTPS_PASSWORD;

        //Номер телефона
        if (isset($data['phone'])) {
            $url .= '&phone=' . $data['phone'];
        }
        //id группы, в которую нужно добавить контакт
        if (isset($data['idGroup'])) {
            $url .= '&idGroup=' . $data['idGroup'];
        } else {
            $url .= '&idGroup=' . ID_GROUP;
        }

        return json_decode(file_get_contents($url));

    }
}