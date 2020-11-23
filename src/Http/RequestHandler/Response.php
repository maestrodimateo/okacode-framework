<?php

namespace App\Http\RequestHandler;


abstract class Response
{
    /**
     * Fonction permettant de rendre la vue
     *
     * @param string $path : chemin vers la ressource
     * @param mixed ...$params : Les différents paramètre
     * @return void
     */
    public static function render(string $path, ...$params)
    {
        return require_once VIEWS . $path . '.html';
    }

    /**
     * Redirige vers la ressouce demandée
     *
     * @param string $path : le chemin de redirection
     * @return void
     */
    public static function redirect(string $path)
    {
        header("Location: $path");
    }
}
