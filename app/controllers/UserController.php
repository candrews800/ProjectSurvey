<?php

class UserController extends BaseController {

    public function login(){
        $email = Input::get('email');
        $password = Input::get('password');
        $remember_me = Input::get('remember_me');

        if(User::login($email, $password, $remember_me)){
            //Get Type of User
            $role = DB::table('assigned_roles')->where('user_id', Auth::id())->pluck('role_id');

            //If User is a Business
            if($role == 2){
                return Redirect::to('/business');
            }
            // If User is a Customer
            elseif($role == 1)
            {
                return Redirect::to('/customer');
            }

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
