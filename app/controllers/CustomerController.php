<?php

class CustomerController extends BaseController {

    public function index(){
        return View::make('user.index')->with(array('page' => 'customer'));
    }

    public function signUp(){
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $password = Input::get('password');
        $birthday = Input::get('birthday_month') . '/' . Input::get('birthday_day') . '/' . Input::get('birthday_year');
        $gender = Input::get('gender');

        $validator = Validator::make(
            array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password,
                'birthday' => $birthday,
                'gender' => $gender
            ),
            array(
                'first_name' => Customer::NAME_RULES,
                'last_name' => Customer::NAME_RULES,
                'email' => User::EMAIL_RULES,
                'password' => User::PASSWORD_RULES,
                'birthday' => Customer::BIRTHDAY_RULES,
                'gender' => Customer::GENDER_RULES
            )
        );

        if($validator->fails()){
            return Redirect::to('/')->withErrors($validator, 'customer_error')->withInput(Input::except('password'));
        }
        else{
            $customer = new Customer;
            $customer->signUp($first_name, $last_name, $email, $password, $birthday, $gender);
            return Redirect::to('/');
        }
    }

    public function displayAllSettings(){

        $customer = Customer::where('user_id', '=' , Auth::id())->firstOrFail();
        if($customer->gender == 'm'){
            $gender = "Male";
        }
        else{
            $gender = "Female";
        }

        $customerSettings = array(
            'email' => Auth::user()->email,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'birthday' => $customer->birthday,
            'gender' => $gender
        );

        return View::make('user.displayAllSettings')->with($customerSettings)->with(array('page' => 'customer'));
    }

    public function displaySingleSetting($setting){
        $customer = Customer::where('user_id', '=' , Auth::user()->id)->firstOrFail();
        $customer->email = Auth::user()->email;
        $editableSettings = "email password first_name last_name birthday gender";

        if(str_contains($editableSettings, $setting)){
            switch($setting){
                case "email":
                case "first_name":
                case "last_name":
                    $settingToEdit = array(
                        $setting => $customer->$setting,
                        'type' => 'text'
                    );
                    break;
                case "password":
                    $settingToEdit = array(
                        'type' => 'password'
                    );
                    break;
                case "birthday":
                    $settingToEdit = array(
                        'birthday_month' => substr($customer->birthday,5,2),
                        'birthday_day' => substr($customer->birthday,8,2),
                        'birthday_year' => substr($customer->birthday,0,4),
                        'type' => 'date'
                    );
                    break;
                case "gender":
                    $settingToEdit = array(
                        'gender' => $customer->gender,
                        'type' => 'radio',
                        $customer->gender => true
                    );
                    break;
            }
        }
        $settingToEdit['field'] = $setting;
        return View::make('user.displaySingleSetting')->with($settingToEdit)->with(array('page' => 'customer'));
    }

    public function editSetting($setting){
        $user = User::find(Auth::id());
        $customer = Customer::where('user_id', '=' , $user->id)->firstOrFail();
        if($setting == 'password'){
            $old_password = Input::get('old_password');
            $new_password = Input::get('new_password');
            $confirm_password = Input::get('confirm_password');
            $validator = Validator::make(
                array(
                    'old_password' => $old_password,
                    'new_password' => $new_password,
                    'confirm_password' => $confirm_password
                ),
                array(
                    'old_password' => 'current_password',
                    'new_password' => User::PASSWORD_RULES,
                    'confirm_password' => 'same:new_password'
                )
            );

            if($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput(Input::except(array('old_password','new_password','confirm_password')))->with(array('page' => 'customer'));
            }

            $user->changePassword($new_password);

            return Redirect::to('customer/settings')->with(array('page' => 'customer'));
        }
        else if($setting == "first_name" || $setting == "last_name" || $setting == "email" || $setting == "gender"){
            $$setting = Input::get($setting);
            $confirm_password = Input::get('confirm_password');

            if($setting == 'email')
                $rules = User::EMAIL_RULES;
            else if($setting == 'gender')
                $rules = Customer::GENDER_RULES;
            else
                $rules = Customer::NAME_RULES;

            $validator = Validator::make(
                array(
                    $setting => $$setting,
                    'confirm_password' => $confirm_password
                ),
                array(
                    $setting => $rules,
                    'confirm_password' => 'current_password'
                )
            );

            if($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput(Input::except('confirm_password'))->with(array('page' => 'customer'));
            }

            if($setting == 'email'){
                $user->changeEmail($$setting);
            }
            else{
                $customer->saveSetting($setting, $$setting);
            }

            return Redirect::to('customer/settings')->with(array('page' => 'customer'));
        }
        else if($setting == 'birthday'){
            $birthday = Input::get('birthday_month') . '/' . Input::get('birthday_day') . '/' . Input::get('birthday_year');
            $confirm_password = Input::get('confirm_password');

            $validator = Validator::make(
                array(
                    'birthday' => $birthday,
                    'confirm_password' => $confirm_password
                ),
                array(
                    'birthday' => Customer::BIRTHDAY_RULES,
                    'confirm_password' => 'current_password'
                )
            );

            if($validator->fails()){
                return Redirect::back()->withErrors($validator)->with(array('page' => 'customer'));
            }

            $customer->saveSetting('birthday', date('Y-m-d', strtotime($birthday)));

            return Redirect::to('customer/settings')->with(array('page' => 'customer'));
        }

    }
}
