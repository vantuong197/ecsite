<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Models\UserCatalogue;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository 
 * @package App\Repositores
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{
    protected $model;
    public function __construct(UserCatalogue $model){
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
        array $relations = []
    ){
        $query = $this->model->select($column)->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                      ->orWhere('description', 'LIKE', '%'.$condition['keyword'].'%');
            } 
            if(isset($condition['publish']) && $condition['publish'] != -1){
                $query->where('publish', '=', $condition['publish']);
            }
            return $query;
        });
        if(isset($relations) && !empty($relations)){
            foreach($relations as $relation){
                $query->withCount($relation);
            }
            
        }
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage)
                     ->withQueryString()
                     ->withPath(env('APP_URL').$extend['path']);
    }
}
