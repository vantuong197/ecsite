<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\User;
/**
 * Class BaseRepository 
 * @package App\Repositores
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(User $user){
        $this->model = $user;
    }
    public function getAll(){
        return $this->model->all();
    }
}
