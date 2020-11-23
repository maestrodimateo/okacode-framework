<?php
namespace App\Http\RequestHandler;

/**
 * Classe permettant de gérer les requêtes.
 * @author mebale noel <noelmeb12@gmail.com>
 */

class Request
{

    /**
     * La méthode la requete
     */
    private string $method;


    /**
     * L'eventuel corps de la requête
     */
    private array $body = [];

    /**
     * Le chemin de la requete envoyée
     */
    private string $path = '/';

    public function __construct()
    {
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setBody($_POST);
        $this->setPath($_SERVER['REQUEST_URI']);
    }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @return  self
     */ 
    private function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */ 
    private function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get le chemin de la requete envoyée
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set le chemin de la requete envoyée
     *
     * @return  self
     */ 
    private function setPath($path)
    {
        $this->path = trim($path, '/');
        return $this;
    }

    /**
     * Get les parametres de la requete
     */ 
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set les parametres de la requete
     *
     * @return  self
     */ 
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
}