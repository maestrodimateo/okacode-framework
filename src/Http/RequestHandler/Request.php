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
     * The request method
     */
    private string $_method;


    /**
     * The eventual request body
     */
    private array $_body = [];

    /**
     * The path of the sent request
     */
    private string $_path = '/';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->_setMethod($_SERVER['REQUEST_METHOD']);
        $this->_setBody($_POST);
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
    private function _setBody($body)
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
    private function _setMethod($method)
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