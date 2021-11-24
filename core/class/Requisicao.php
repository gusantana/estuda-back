<?php

namespace core;

class Requisicao
{
    protected $url;

    public function __construct()
    {
        if (isset($_SERVER['PATH_INFO'])) {
            $this->url  = $_SERVER['PATH_INFO'];
        } else {
            $this->url = '/';
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function get()
    {
        return $_GET;
    }

    public function post()
    {
        if (empty($_POST)) {
            return json_decode(file_get_contents('php://input'), true);
        }
        return $_POST;
    }
}
