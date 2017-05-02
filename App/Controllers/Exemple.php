<?php

namespace App\Controllers;

use Config\Controller\Controller;

class Exemple extends Controller
{
    public function hello()
    {
        $this->template('index');
    }
}