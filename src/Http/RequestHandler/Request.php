<?php
namespace App\Http\RequestHandler;

/**
 * Class that handles all the requests
 * 
 * @author mebale noel <noelmeb12@gmail.com>
 */

class Request
{
    
    /**
     * La méthode la requete
     */
    private string $_method;


    /**
     * L'eventuel corps de la requête
     */
    private array $_body = [];

    /**
     * Le chemin de la requete envoyée
     */
    private string $_path = '/';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setBody($_POST);
        $this->setPath($_SERVER['REQUEST_URI']);
    }

    /**
     * Get the value of body
     * 
     * @return array
     */ 
    public function getBody()
    {
        return $this->_body;
    }

    /**
     * Set the value of body
     *
     * @return self
     */ 
    private function setBody($body)
    {
        $this->_body = $body;

        return $this;
    }

    /**
     * Get the value of method
     * 
     * @return string
     */ 
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * Set the value of method
     *
     * @return self
     */ 
    private function setMethod($method)
    {
        $this->_method = $method;
        return $this;
    }

    /**
     * Access to the request path
     * 
     * @return string
     */ 
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Mutate the request path
     *
     * @return self
     */ 
    private function setPath($path)
    {
        $this->_path = trim($path, '/');
        return $this;
    }
}