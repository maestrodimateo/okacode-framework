<?php

namespace App\Http\RequestHandler;


abstract class Response
{

    private static int $statutcode = 200;

    /**
     * Fonction permettant de rendre la vue
     *
     * @param string $path : chemin vers la ressource
     * @param mixed ...$params : Les différents paramètre
     * @return void
     */
    public static function render(string $path, array $params = [], string $layout = null)
    {
        http_response_code(self::$statutcode);

        if ($layout === null) {
            extract($params);
            return require_once VIEWS . $path . '.html';
        }

        return self::withLayout($path, $params, $layout);
    }

    /**
     * Retourne la vue avec son conteneur
     *
     * @param string $path
     * @param array $params
     * @param string $layout
     * 
     * @return void
     */
    public static function withLayout(string $path, array $params, string $layout)
    {
        extract($params);
        ob_start();
        require_once VIEWS . $path . '.html';
        $content = ob_get_clean();
        return require_once VIEWS . $layout .'.html';
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

    /**
     * Envoie d'une reponse Json
     *
     * @param array $data
     * @return void
     */
    public function jsonResponse(array $data)
    {

    }
}
