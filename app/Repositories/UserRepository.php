<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository 
 * @package App\Repositores
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model){
        $this->model = $model;
    }
    // public function pagination(){
    //     return User::paginate(15);
    // }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        array $join = [], 
        int $perpage = 20,
        array $extend = [],
        array $relation = []
    ){
        $query = $this->model->select($column)->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('phone', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('address', 'LIKE', '%'.$condition['keyword'].'%');
            } 
            if(isset($condition['publish']) && $condition['publish'] != -1){
                $query->where('publish', '=', $condition['publish']);
            }
            return $query;
        });
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage)
                     ->withQueryString()
                     ->withPath(env('APP_URL').$extend['path']);
    }
}
