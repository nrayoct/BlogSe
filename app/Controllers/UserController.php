<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; //ini biar bisa nyimpen ke DB nya, tp perlu dibuat constructornya

class UserController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel(); //nah ini contruct utk usermodel
    }

    public function index()
    {
        $data = [
            'title' => "Admin"
        ];
        return view('v_admin', $data);
    }

    public function register()
    {
        $data = [
            'title' => "Register"
        ];
        return view('user/v_register', $data);
    }

    public function saveRegister()
    {
        $request = service('request');
        $data = [
            'fullname' => $request->getVar('fullname'),
            //ambil data dari inputan fullname di register
            'email' => $request->getVar('email'),
            //ambil data dari inputan email di register
            'password' => $request->getVar('password'),
        ];
        $this->userModel->insert($data);
        return redirect()->to(base_url('blogs/register'));
        //dd($data);
        //fungsi dd untuk memastikan data terinput dg benar dimasing2 field
    }

    public function login()
    {
        $data = [
            'title' => "Form Login",
            'tampil' => "Login"
        ];
        return view('user/v_login', $data);
    }
}
