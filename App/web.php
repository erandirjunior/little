<?php

/**
 * Utilizado para não ter que toda vez que for adicionar uma nova rota, usar o namespace completo da classe Route
 */
use Config\Init\Route;


Route::add(['/', 'Exemple', 'hello']);
