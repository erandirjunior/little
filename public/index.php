<?php

require_once '../vendor/autoload.php';
require_once '../App/web.php';

use Config\Init\{Bootstrap, Route};

new Bootstrap(Route::getRoutes());