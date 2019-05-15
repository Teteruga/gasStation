<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author Vinicus
 */
class Request {
    protected $request;
 
    public function __construct()
    {
        $this->request = $_REQUEST;
    }
 
    public function __get($nome)
    {
        if (isset($this->request[$nome])) {
            return $this->request[$nome];
        }
        return false;
    }
}
