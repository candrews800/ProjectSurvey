<?php

class Business extends Eloquent{

    protected $table = 'business_data';

    const NAME_RULES = 'required|min:2|max:225';
    const ADDRESS1_RULES ='required|min:6|max:100';
    const ADDRESS2_RULES ='max:50';
    const CITY_RULES = 'required|alpha|min:2|max:100';
    const STATE_RULES = 'required';
    const ZIP_RULES = 'required|digits:5|integer';

    public function signUp($name, $address1, $address2, $city, $state, $zipcode, $email, $password){
        $user = new User;
        $this->user_id = $user->signUp($email, $password, $role_id = 2);

        $this->name = ucfirst($name);
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zipcode = $zipcode;

        $this->save();
    }
}
