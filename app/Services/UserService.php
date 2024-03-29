<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
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
    public function paginate($request){
        $requestInput = $request->input();
        if(isset($requestInput) && !empty($requestInput)){
            $condition['publish'] = $request->integer('publish');
        }else{
            $condition['publish'] = -1;
        }
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $users = $this->userRepository->pagination($this->paginateSelect(), $condition, [], $perPage, ['path' => '/user/user/index']);
        return $users;
    }

    public function create(Request $request){
        DB::beginTransaction();
        try{

            $payload = $request->except(['_token', 'confirm_password']);
            $payload['password'] = Hash::make($payload['password']);
            $user = $this->userRepository->create($payload);
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
            $user = $this->userRepository->update($id, $payload);
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
            $user = $this->userRepository->delete($id);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        }
    }

    private function paginateSelect(){
        return ['id', 'email', 'phone', 'address', 'name', 'publish'];
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try{

            $payload[$post['field']] = ($post['value'] == 1) ? 0 : 1;
            $user = $this->userRepository->update($post['modelId'], $payload);
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
            $user = $this->userRepository->updateByWhereIn('id',$post['id'], $payload);
            DB::commit();
            return true;
        }catch(Exception $error){
            DB::rollback();

            echo $error->getMessage(); die();
            return false;
        } 
    }
}
