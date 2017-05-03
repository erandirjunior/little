<?php

namespace App\Controllers;

use Config\Controller\Controller;

class Exemple extends Controller
{
    public function hello()
    {
        $this->view->mensagem = "Bem vindo ao Framework little!";
        $this->template('index');
    }
}