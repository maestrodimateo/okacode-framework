<?php

namespace App\Http\RequestHandler;

use App\ExceptionsHandler\NotFoundException;

/**
 * Redirect the request to the right route
 * 
 * @category Routing
 * 
 * @author mebale noël <noelmeb12@gmail.com>
 */

abstract class Router
{
    /**
     * Keep all the saved routes
     *
     * @var array
     */
    private static $_routes = ['GET' => [], 'PATCH' => [], 'POST' => []];


    /**
     * Declare a route of type GET
     *
     * @param string $path     : The user request
     * @param mixed  $callable : The action to execute
     * 
     * @return void
     */
    public static function get(string $path, $callable)
    {
        self::record_route($path, $callable);
    }

    /**
     * Declare a route of type POST
     *
     * @param string $path     : The user request
     * @param mixed  $callable : The action to execute
     * 
     * @return self
     */
    public static function post(string $path, $callable)
    {
        self::record_route($path, $callable, "POST");
        return self::class;
    }

    /**
     * Save a route
     *
     * @param string $path     : The user request
     * @param mixed  $callable : The action to execute
     * @param string $method   : The method of the request
     * 
     * @return self
     */
    private static function record_route(string $path, $callable, string $method = "GET")
    {
        $route = new Route($path, $callable);
        self::cheDuplicatedRoutes($route, $method, $path);
        self::$_routes[$method][] = $route;
    }

    /**
     * Check if there is no duplicated routes
     *
     * @param Route  $currentRoute : The route to check
     * @param string $method       : The route's method 
     * @param string $longPath     : The route's path
     * 
     * @return Exception|null
     */
    public static function cheDuplicatedRoutes(Route $currentRoute, string $method, string $longPath)
    {
        foreach (self::$_routes[$method] as $route) {
            if ($route->path === $currentRoute->path) {
                throw new \Exception("La route [$longPath] de type [$method] existe déjà", 1);
            }
        }

        return null;
    }

    /**
     * Execute le chargement de la route demandée
     *
     * @param Request $request : The user's request
     * 
     * @return void
     */
    public static function run(Request $request)
    {
        foreach (self::$_routes[$request->getMethod()] as $route) {
           
            if ($route->match($request->getPath())) {
                return $route->execute($request);
            }

        }

        throw new NotFoundException("Page introuvable");
    }
}