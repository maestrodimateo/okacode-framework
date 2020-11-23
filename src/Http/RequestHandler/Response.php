<?php


class Response
{
    private $body;
    private $statutCode = 200;
    private $headers = [];

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
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function redirect()
    {

    }

    public function send($statutCode = 404)
    {
        
    }
}