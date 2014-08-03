<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface{

    use UserTrait, RemindableTrait, hasRole;

    protected $table = 'users';

    const EMAIL_RULES = 'required|email|unique:users,email';
    const PASSWORD_RULES = 'required|min:6|max:40';


    public function signUp($email, $password, $role_id){
        $this->email = $email;
        $this->password = Hash::make($password);
        $this->last_login = date('Y-m-d H:i:s');
        $this->save();
        $this->attachRole($role_id);

        return $this->id;
    }

    public static function login($email, $password, $remember_me = false){
        return Auth::attempt(array('email' => $email, 'password' => $password), $remember_me);
    }

    public function saveSetting($setting, $value, $from_admin=0){
        $this->$setting = $value;
        $this->save();
    }

    public function changePassword($new_password){
        $this->saveSetting('password', Hash::make($new_password));
    }

    public function changeEmail($new_email){
        $this->saveSetting('email', $new_email);
    }
}
