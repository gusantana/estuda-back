<?php

namespace core;

class BaseServer
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST');
        if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
            die();
        }
    }
}
