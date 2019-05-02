<?php

namespace Core;

class Request
{
    private $request;
    
    public function __construct()
    {
        foreach ($_REQUEST as $key => $value) {
            $this->$key = trim(stripslashes(htmlspecialchars($value)));
            $request[$key] = $this->$key;
        }
        $this->request = $request;
    }

    // public function getQueryParams()
    // {

    // }
}