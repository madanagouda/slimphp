<?php

namespace App\action;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class HomeAction
{
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        return $response->withJson(['success' => true]);
    }
}