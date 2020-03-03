<?php

namespace App\domain\user\repository;

use App\domain\user\data\UserData;
use DomainException;
use Illuminate\Database\Connection;

/**
 * Repository.
 */
class UserReaderRepository
{
    /**
     * @var Connection The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param Connection $connection The database connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws DomainException
     *
     * @return UserData The user data
     */
    public function getUserById(int $userId): UserData
    {
        
        $row = $this->connection->table('users')->select('id','username','first_name','last_name','email')->where('id',$userId)->first();
        if (!$row) {
            throw new DomainException(sprintf('User not found: %s', $userId));
        }

        // Map array to data object
        $user = new UserData();
        $user->id = (int)$row->id;
        $user->username = (string)$row->username;
        $user->firstName = (string)$row->first_name;
        $user->lastName = (string)$row->last_name;
        $user->email = (string)$row->email;

        return $user;
    }
}
