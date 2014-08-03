<?php

class Customer extends Eloquent{

    protected $table = 'customer_data';

    const NAME_RULES = 'required|alpha|min:2|max:25';
    const BIRTHDAY_RULES = 'required|date|after:1/1/1900|before:today';
    const GENDER_RULES = 'required|in:m,f';

    public function signUp($first_name, $last_name, $email, $password, $birthday, $gender){
        $user = new User;
        $this->user_id = $user->signUp($email, $password, $role_id = 1);

        $this->first_name = ucfirst($first_name);
        $this->last_name = ucfirst($last_name);
        $this->birthday = date('Y-m-d', strtotime($birthday));
        $this->gender = $gender;

        $this->save();
    }

    public function saveSetting($setting, $value, $from_admin=0){
        $this->$setting = $value;
        $this->save();
    }
}
