<?php
namespace App\utils;

abstract class Str
{
    /**
     * Array of services
     */
    private static array $_services;


    public static function setService($service, string $id) {

        if (!is_object($service)) {
             throw new \Exception("The parameter one must be an object", 1);
        }

        self::$_services[$id] = $service;
    }

    /**
     * Pluralize a word
     *
     * @param string $word : The word to pluralize
     * 
     * @return string
     */
    public static function pluralize(string $word)
    {
        return self::$_services['inflector']->pluralize($word);
    }
}
