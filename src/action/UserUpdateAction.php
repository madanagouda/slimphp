<?php

namespace App\Action;

use App\domain\user\data\UserData;
use App\domain\user\service\UserUpdater;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class UserUpdateAction
{
    private $userUpdater;

    public function __construct(UserUpdater $userUpdater)
    {
        $this->userUpdater = $userUpdater;
    }

    public function __invoke(ServerRequest $request, Response $response, array $args = []): Response
    {
        // Collect input from the HTTP request
        $userId = (int)$args['id'];

        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Mapping (should be done in a mapper class)
        $user = new UserData();
        $user->id = $userId;
        $user->username  = $data['username'];
        $user->firstName = $data['first_name'];
        $user->lastName  = $data['last_name'];
        $user->email = $data['email'];

        // Invoke the Domain with inputs and retain the result
        $userId = $this->userUpdater->updateUser($user);

        // Transform the result into the JSON representation
        $result = [
            'user_id' => $userId
        ];

        // Build the HTTP response
        return $response->withJson($result)->withStatus(201);
    }
}