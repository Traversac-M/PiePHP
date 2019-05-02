<?php
namespace Core;

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }

    public static function get($url)
    {
        if (isset(self::$routes[$url])) { // Si la route existe, la retourne
            return self::$routes[$url]; 
        } else {
            return ['controller' => 'error', 'action' => 'error']; // Si la route n'existe pas, redirige vers une page d'erreur
        }
    }
}