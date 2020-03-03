<?php

namespace App\domain\user\service;

use App\domain\user\data\UserData;
use App\domain\user\repository\UserUpdaterRepository;
use UnexpectedValueException;

/**
 * Service.
 */
final class UserUpdater
{
    /**
     * @var UserUpdaterRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserUpdaterRepository $repository The repository
     */
    public function __construct(UserUpdaterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param UserData $user The user data
     *
     * @return int The new user ID
     */
    public function updateUser(UserData $user): int
    {
        // Validation
        if (empty($user->username)) {
            throw new UnexpectedValueException('Username required');
        }

        // Insert user
        $userId = $this->repository->updateUser($user);

        // Logging here: User created successfully

        return $userId;
    }
}