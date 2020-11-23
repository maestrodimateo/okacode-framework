<?php
namespace App\Http\RequestHandler;
use App\ExceptionsHandler\NotFoundException;
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
     * Enregistre une route de type get
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
     * Enregistre une route de type post
     *
     * @param string $path : la requete de l'utilisateur
     * @param string $callable : L'action à executer
     * @return void
     */
    public static function post(string $path, $callable)
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
        self::cheDuplicatedRoutes($route, $method, $path);
        self::$routes[$method][] = $route;
    }

    /**
     * Verifie s'il y a des routes dupliquées
     *
     * @param Route $currentRoute
     * @param string $method
     * @param string $longPath
     * @return Exception|null
     */
    public static function cheDuplicatedRoutes(Route $currentRoute, string $method, string $longPath)
    {
        foreach (self::$routes[$method] as $route) {
            if ($route->path === $currentRoute->path) {
                throw new \Exception("La route [$longPath] de type [$method] existe déjà", 1);
            }
        }

        return null;
    }

    /**
     * Execute le chargement de la route demandée
     *
     * @param Request $request
     * 
     * @return void
     */
    public static function run(Request $request)
    {
        foreach (self::$routes[$request->getMethod()] as $route) {
           
            if ($route->match($request->getPath())) {
                return $route->execute($request);
            }

        }

        throw new NotFoundException("Page introuvable");
    }
}