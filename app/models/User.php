<?php

class User extends Eloquent{
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
}
