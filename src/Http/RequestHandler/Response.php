<?php

namespace App\Http\RequestHandler;

/**
 * This class handles the response sent
 * 
 * @author mebale noel <noelmeb12@gmail.com>
 */
abstract class Response
{

    private static int $_statutcode = 200;
    const VIEW_FILE_EXTENSION = ".html";

    /**
     * Render the view
     *
     * @param string $path   : path to the view file
     * @param array  $params : data that will be sent to the view
     * @param string $layout : layout to user for the view
     * 
     * @return void
     */
    public static function render(string $path, array $params = [], string $layout = null)
    {
        http_response_code(self::$_statutcode);

        if ($layout === null) {
            extract($params);
            return include_once VIEWS . $path . self::VIEW_FILE_EXTENSION;
        }

        return self::withLayout($path, $params, $layout);
    }

    /**
     * Render the view with its specific layout
     *
     * @param string $path   : path to the view file
     * @param array  $params : data that will be sent to the view
     * @param string $layout : layout to user for the view
     * 
     * @return void
     */
    public static function withLayout(string $path, array $params, string $layout)
    {
        extract($params);
        ob_start();
        include_once VIEWS . $path . self::VIEW_FILE_EXTENSION;
        $content = ob_get_clean();
        return include_once VIEWS . $layout . self::VIEW_FILE_EXTENSION;
    }

    /**
     * Redirect the user to a specific resource
     *
     * @param string $path : the redirection path
     * 
     * @return void
     */
    public static function redirect(string $path)
    {
        header("Location: $path");
    }

    /**
     * Envoie d'une reponse Json
     *
     * @param array $data : 
     * 
     * @return void
     */
    public function jsonResponse(array $data)
    {

    }
}
