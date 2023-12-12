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

    public function findById(
        int $id,
        array $column = ['*'],
        array $relation = []
    ){
        return $this->model->select($column)->with($relation)->findOrFail($id);
    }
}
