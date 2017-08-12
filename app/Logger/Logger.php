<?php

namespace App\Logger;

use anlutro\cURL\cURL as cURL;

class Logger
{

    const APIKEY = '00f94fdbf4e44676b0c22d0cde9b4951';
    const URL = 'http://api.staging.queroquitar.com.br/logger/api/';

    public static function save($database, $action, array $params, $collection = 'log')  : bool
    {
      try
      {
        $response = static::makeConnection('post', static::makeUrl($database, $collection, $action), $params);
        if ($response->statusCode)
            return true;
            
      } catch (Exception $e) {

        return false;
      }
    }

    public static function retrieve($database, $collection) : array
    {
        $response = static::makeConnection('get', static::makeUrl($database, $collection));
        return json_decode($response->body, true);
    }

    private static function makeConnection(string $type, string $url, array $params = [])
    {
        $curl = new cURL();
        $defaultParams = [
            '_ip' => static::getUserIp()
        ];

        $params = array_merge($defaultParams, $params);

        $request = $curl->newRequest($type, $url, $params)
            ->setHeader('apikey', self::APIKEY)
            ->setHeader('Accept-Charset', 'utf-8');

        return $request->send();
    }

    private static function makeUrl($database, $collection, $action = null) : string
    {
        if (empty($action))
            return self::URL . $database . '/' . $collection;

        return self::URL . $database . '/' . $collection . '/' . $action;
    }

    private static function getUserIp()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}
