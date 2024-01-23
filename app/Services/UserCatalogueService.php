<?php

namespace App\Services;

use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
/**
 * Class UserService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    private $userCatalogueRepository;
    public function __construct(UserCatalogueRepository $userCatalogueRepository){
        $this->userCatalogueRepository = $userCatalogueRepository;
    }
    public function paginate($request){
        $requestInput = $request->input();
        if(isset($requestInput) && !empty($requestInput)){
            $condition['publish'] = $request->integer('publish');
        }else{
            $condition['publish'] = -1;
        }
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $users = $this->userCatalogueRepository->pagination($this->paginateSelect(), $condition, [], $perPage, ['path' => '/user/catalogue/index'], ['users']);
        return $users;
    }

    public function create(Request $request){
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token',]);
            $user = $this->userCatalogueRepository->create($payload);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        }  
    }
    public function update($id, Request $request){
        DB::beginTransaction();
        try{

            $payload = $request->except(['_token']);
            $user = $this->userCatalogueRepository->update($id, $payload);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        }  
    }
    public function delete($id){
        DB::beginTransaction();
        try{
            $user = $this->userCatalogueRepository->delete($id);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        }
    }

    private function paginateSelect(){
        return ['id','name', 'publish', 'description'];
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try{

            $payload[$post['field']] = ($post['value'] == 1) ? 0 : 1;
            $user = $this->userCatalogueRepository->update($post['modelId'], $payload);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        }  
    }

    public function updateStatusAll($post = []){
        DB::beginTransaction();
        try{

            $payload[$post['field']] = $post['value'];
            $user = $this->userCatalogueRepository->updateByWhereIn('id',$post['id'], $payload);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        } 
    }
    private function updateUser(){
        
    }
}
