<?php
namespace App\Http\RequestHandler;

/**
 * Rédirige la requete vers la bonne route
 * @author mebale noel <noelmeb12@gmail.com>
 * @category Routing
 */

 abstract class Router
{
    /**
     * Contient toutes les routes enregistrées
     *
     * @var array
     */
    private static $routes = ['GET' => [], 'PATCH' => [], 'POST' => []];


    /**
     * Enregitre une route de type get
     *
     * @param string $path : la requete de l'utilisateur
     * @param mixed $callable : L'action à executer
     * @return void
     */
    public static function get(string $path, $callable)
    {
        self::record_route($path, $callable);
    }

    /**
     * Enregitre une route de type post
     *
     * @param string $path : la requete de l'utilisateur
     * @param string $callable : L'action à executer
     * @return void
     */
    public static function post(string $path, string $callable)
    {
        self::record_route($path, $callable, "POST");
    }

    /**
     * Enregistre une route
     *
     * @param string $path
     * @param mixed $callable
     * @return void
     */
    private static function record_route(string $path, $callable, string $method = "GET")
    {
        $route = new Route($path, $callable);
        self::$routes[$method][] = $route;
    }
}