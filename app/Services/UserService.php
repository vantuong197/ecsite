<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    private $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public function paginate(){
        $users = $this->userRepository->pagination();
        return $users;
    }
}
