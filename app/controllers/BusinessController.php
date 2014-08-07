<?php

class BusinessController extends BaseController {

    public function index(){
        return View::make('business.index')->with(array('page' => 'business'));
    }

    public function signUp(){
        $name = Input::get('name');
        $address1 = Input::get('address1');
        $address2 = Input::get('address2');
        $city = Input::get('city');
        $state = Input::get('state');
        $zipcode = Input::get('zipcode');
        $email = Input::get('email');
        $password = Input::get('password');

        $validator = Validator::make(
            array(
                'name' => $name,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode,
                'email' => $email,
                'password' => $password
            ),
            array(
                'name' => Business::NAME_RULES,
                'address1' => Business::ADDRESS1_RULES,
                'address2' => Business::ADDRESS2_RULES,
                'city' => Business::CITY_RULES,
                'state' => Business::STATE_RULES,
                'zipcode' => Business::ZIP_RULES,
                'email' => User::EMAIL_RULES,
                'password' => User::PASSWORD_RULES,
            )
        );

        if($validator->fails()){
            return Redirect::to('/')->withErrors($validator, 'business_error')->withInput(Input::except('password'));
        }
        else{
            $business = new Business;
            $business->signUp($name, $address1, $address2, $city, $state, $zipcode, $email, $password);
            return Redirect::to('/');
        }
    }

    public function displayAllSettings(){

        $business = Business::where('user_id', '=' , Auth::id())->firstOrFail();

        $businessSettings = array(
            'email' => Auth::user()->email,
            'name' => $business->name,
            'address1' => $business->address1,
            'address2' => $business->address2,
            'city' => $business->city,
            'state' => $business->state,
            'zipcode' => $business->zipcode
        );

        return View::make('business.displayAllSettings')->with($businessSettings)->with(array('page' => 'business'));
    }
}
