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
     * 
     * @return void
     */
    public function __construct()
    {
        $this->_setMethod($_SERVER['REQUEST_METHOD']);
        $this->_setBody($_POST);
        $this->_setPath($_SERVER['REQUEST_URI']);
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
     * @param array $body : The body of the request
     * 
     * @return self
     */
    private function _setBody(array $body)
    {
        if (!$body) {
            return null;
        }

        $this->_body = $this->_sanitize($body);
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
     * @param string $method : The method of the request
     * 
     * @return void
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
     * @param string $path : The path of the request
     * 
     * @return self
     */
    private function _setPath(string $path)
    {
        $this->_path = trim($path, '/');
        return $this;
    }

    /**
     * Sanitize data
     *
     * @param array $body : the data that need to be sanitize
     * 
     * @return array
     */
    private function _sanitize(array $body)
    {
        foreach ($body as $key => $data) {

            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            $body[$key] = $data;
        }

        return $body;
    }
}