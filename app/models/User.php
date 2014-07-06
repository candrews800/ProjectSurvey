<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface{

    use UserTrait, RemindableTrait;

    protected $table = 'users';


    public function signUp($first_name, $last_name, $email, $password, $birthday, $gender){
        $this->first_name = ucfirst($first_name);
        $this->last_name = ucfirst($last_name);
        $this->email = $email;
        $this->password = Hash::make($password);
        $this->birthday = date('Y-m-d', strtotime($birthday));
        $this->gender = $gender;
        $this->last_login = date('Y-m-d H:i:s');

        $this->save();
    }

    public static function signIn($email, $password, $remember_me = false){
        return Auth::attempt(array('email' => $email, 'password' => $password), $remember_me);
    }

}
