<?php

class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Hello World";
    }

    public function test($param)
    {
        echo "Hello World test: $param";
    }
}