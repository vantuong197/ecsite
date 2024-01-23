<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    //
    private $userService;
    private $provinceRepository;
    private $userRepository;
    public function __construct(UserService $userService, ProvinceRepository $provinceRepository, UserRepository $userRepository){
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request){

 
        $users = $this->userService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
        $config["seo"] = config('apps.user.index');
        $template = 'backend.user.user.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));


    }

    public function create(){
        $provinces = $this->provinceRepository->getAll();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config["seo"] = config('apps.user.create');
        $config['method'] = 'create';
        $template = 'backend.user.user.store';
        return view('backend.dashboard.layout', compact('template', 'config', 'provinces'));
    }

    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.user.index')->with('success', 'Add new user successfully!');
        }
        return redirect()->route('user.user.index')->with('error', 'Add new user failed, Please retry again!');
    }

    public function edit($id){
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->getAll();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config["seo"] = config('apps.user.edit');
        $config['method'] = 'edit';
        $template = 'backend.user.user.store';
        return view('backend.dashboard.layout', compact('template', 'config', 'provinces', 'user'));
    }

    public function update($id, UpdateUserRequest $request) {
        if($this->userService->update($id, $request)){
            return redirect()->route('user.user.index')->with('success', 'Update user successfully!');
        }
        return redirect()->route('user.user.index')->with('error', 'Update user failed, Please retry again!');
    }

    public function delete($id) {
        $user = $this->userRepository->findById($id);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config["seo"] = config('apps.user.delete');
        $template = 'backend.user.user.delete';
        return view('backend.dashboard.layout', compact('template', 'config', 'user'));
    }
    public function destroy($id){
        if($this->userService->delete($id)){
            return redirect()->route('user.user.index')->with('success', 'Delete user successfully!');
        }
        return redirect()->route('user.user.index')->with('error', 'Delete user failed, Please retry again!');
    }
}
