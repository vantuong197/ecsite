<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
class UserController extends Controller
{
    //
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){

 
        $users = $this->userService->paginate();
        $config = $this->config();
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));


    }

    private function config(){
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
    }
}
