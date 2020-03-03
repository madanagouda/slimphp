<?php

use Slim\App;


return function (App $app) {
    $app->get('/', \App\action\HomeAction::class);
    $app->get('/users/{id}', \App\action\UserReadAction::class);
    $app->put('/users/{id}', \App\action\UserUpdateAction::class);
    $app->post('/users', \App\action\UserCreateAction::class);
};