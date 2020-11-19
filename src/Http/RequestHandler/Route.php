<?php
namespace App\Http\RequestHandler;

/**
 * @author mebale noel <noelmeb12@gmail.com>
 * @category routing
 */
class Route 
{
    /**
     * Le chemin vers la ressource
     *
     * @var string
     */
    private $path = '/';

    /**
     * Les parametres de la requete
     *
     * @var array
     */
    private $params = [];

    /**
     * l'action à executer
     *
     * @var mixed
     */
    private $action;

    public function __construct(string $path, string $callable)
    {
        $this->setPath($path);
        $this->setAction($callable);
    }

    /**
     * Recupere le chemin et les paramètres
     *
     * @param string $path
     * @return self
     */
    private function setPath(string $path)
    {
        $values = explode('/:', $path);
        
        $this->path = $values[0];
        unset($values[0]);

        if (count($values) > 1) {
            $this->params = $values;
        }
        return $this;
    }

    private function setAction($action)
    {

    }

}