<?php

namespace App\domain\user\repository;

use App\domain\user\data\UserCreateData;
use App\domain\user\data\UserData;
use Illuminate\Database\Connection;


/**
 * Repository.
 */
class UserUpdaterRepository
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
     * @param UserData $user The user
     *
     * @return int The new ID
     */
    public function updateUser(UserData $user): int
    {
        $row = [
            'username' => $user->username,
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
            'email' => $user->email,
        ];

        $newId = $this->connection->table('users')->where('id', $user->id)->update($row);

        return (int)$newId;
    }
}
