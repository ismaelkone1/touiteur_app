<?php

namespace touiteur\app\conf;

use touiteur\app\actions\HomeAction;
use touiteur\app\actions\CreateUserAction;
use touiteur\app\actions\ConnectUserAction;

return function ($app) {

    $app->get('/auth', HomeAction::class)->setName('auth');
    $app->get('/register', CreateUserAction::class)->setName('register');
    $app->get('/login', ConnectUserAction::class)->setName('login');

    $app->get('[/]', HomeAction::class)->setName('auth');
};
