<?php

class UserController extends BaseController {

    public function login(){
        $email = Input::get('email');
        $password = Input::get('password');
        $remember_me = Input::get('remember_me');

        if(User::login($email, $password, $remember_me)){
            return Redirect::to('/');
        }
        else{
            return Redirect::to('/');
        }
    }

    public function logout(){
        Auth::logout();

        return Redirect::to('/');
    }
}
