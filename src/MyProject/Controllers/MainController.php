<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;

class MainController
{
    private $view;

    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }
    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
        var_dump($articles);
    }

}
