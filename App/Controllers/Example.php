<?php

namespace App\Controllers;

use Config\Controller\Controller;

class Example extends Controller
{
    public function hello()
    {
        $this->view->mensagem = "Bem vindo ao Framework little!";
        $this->template('index');
    }
}