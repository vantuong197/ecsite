<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
/**
 * Class UserRepository 
 * @package App\Repositores
 */
class UserRepository implements UserRepositoryInterface
{
    public function pagination(){
        return User::paginate(15);
    }
}
