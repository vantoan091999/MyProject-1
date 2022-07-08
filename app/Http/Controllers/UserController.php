<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function login()
    {
        $msg = Session::get('msg');
        return view('login', ['msg' => $msg]);
    }

    public function checklogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
      
        if(Auth::guard('users')->attempt($credentials)) { //check email vaf password co giong vs database k 
            // return redirect()->route('home');
            return view('pages.home');
        } 
        // $user = Auth::guard('users')->user('status');
        // dd($user);
        return redirect()->route('login')->with('msg', 'Sai tk hoac mk');
        // return view('pages.home');
    }

    public function registration()
    {
        // $er = session::get('er');
        // return view('registration', ['er' => $er]);
        return view('registration');
    }

    public function index()
    {
        return view('pages.home');
    }

    public function store(Request $request)
    {
        $data = [
            'name' =>$request['name'],
            'email' =>$request['email'],
            'phone' =>$request['phone'],
            'status' => 'client',
            'password' =>md5($request['password']), 
        ];
        User::create($data); 
        return view('registration')->with('msg', 'đăng ký thành công');
    }
}
