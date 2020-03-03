<?php

namespace App\domain\user\repository;

use App\domain\user\data\UserCreateData;
use Illuminate\Database\Connection;


/**
 * Repository.
 */
class UserCreatorRepository
{
    /**
     * @var Connection  The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param Connection $connection The database connection
     */
    public function __construct(Connection  $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param UserCreateData $user The user
     *
     * @return int The new ID
     */
    public function insertUser(UserCreateData $user): int
    {
        $row = [
            'username' => $user->username,
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
            'email' => $user->email,
        ];

        $newId = $this->connection->table('users')->insertGetId($values);

        return (int)$newId;
    }
}
