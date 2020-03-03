<?php

namespace App\domain\user\service;

use App\domain\user\data\UserData;
use App\domain\user\repository\UserReaderRepository;
use UnexpectedValueException;

/**
 * Service.
 */
final class UserReader
{
    /**
     * @var UserReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserReaderRepository $repository The repository
     */
    public function __construct(UserReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws UnexpectedValueException
     *
     * @return UserData The user data
     */
    public function getUserDetails(int $userId): UserData
    {
        // Validation
        if (empty($userId)) {
            throw new UnexpectedValueException('User ID required');
        }

        $user = $this->repository->getUserById($userId);

        return $user;
    }
}