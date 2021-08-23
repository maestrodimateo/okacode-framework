<?php
namespace App\Http\RequestHandler;

use App\Http\RequestHandler\Request;

/**
 * @category Routing
 * 
 * @author mebale noel <noelmeb12@gmail.com>
 */
class Route 
{
    /**
     * Le chemin vers la ressource
     *
     * @var string
     */
    private $path;

    /**
     * l'action à executer
     *
     * @var mixed
     */
    private $action;

    private $params;

    public function __construct(string $path, $callable)
    {
        $this->setPath($path);
        $this->setAction($callable);
    }

    /**
     * Recupere le chemin
     *
     * @param string $path
     * 
     * @return self
     */
    private function setPath(string $path)
    {
        $this->path = trim($path, '/');
        return $this;
    }

    /**
     * Récupere l'action à executer
     *
     * @param mixed $action
     * 
     * @return self
     */
    private function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Execute le getter d'un attribut privé
     *
     * @param string $name : Le nom de l'attribut
     * 
     * @return \Exception|void
     */
    public function __get($name)
    {
        $method = 'set' . ucfirst($name);
        $exist  = method_exists($this, $method);

        if ($exist) {
            return $this->$name;
        }

        throw new \Exception("La propriété [$name] n'existe pas dans [$this]", 1);
        
    }

    /**
     * Compare le chemin de la requete à un chemin déclaré
     *
     * @param string $url : le chemin de la requete
     * 
     * @return boolean
     */
    public function match(string $url)
    {
        $path_pattern = preg_replace("/(:[\w]+)/", "([a-zA-Z0-9]+)", $this->path);
        $path_match = "#^". $path_pattern ."$#";
        $matching = preg_match($path_match, $url, $matches);

        unset($matches[0]);
        $this->params = $matches;

        return ($matching) ? true : false;
    }

    /**
     * L'action de la route
     *
     * @return void
     */
    public function execute(Request $request)
    {
        if (is_string($this->action)) {
            Response::render($this->action);
        }

        if (is_array($this->action)) {
            $this->action[0] = new $this->action[0];

            return call_user_func($this->action, $request, ...$this->params);
        }

    }
}