<?php

class UserController extends BaseController {

    const NAME_RULES = 'required|alpha|min:2|max:25';
    const EMAIL_RULES = 'required|email|unique:users,email';
    const PASSWORD_RULES = 'required|min:6|max:40';
    const BIRTHDAY_RULES = 'required|date|after:1/1/1900|before:today';
    const GENDER_RULES = 'required|in:m,f';

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
                'first_name' => self::NAME_RULES,
                'last_name' => self::NAME_RULES,
                'email' => self::EMAIL_RULES,
                'password' => self::PASSWORD_RULES,
                'birthday' => self::BIRTHDAY_RULES,
                'gender' => self::GENDER_RULES
            )
        );

        if($validator->fails()){
            return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password'));
        }
        else{
            $user = new User;
            $user->signUp($first_name, $last_name, $email, $password, $birthday, $gender);
            return Redirect::to('/');
        }
    }

    public function signIn(){
        $email = Input::get('email');
        $password = Input::get('password');
        $remember_me = Input::get('remember_me');

        if(User::signIn($email, $password, $remember_me)){
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

    public function displayAllSettings(){
        if(Auth::user()->gender == 'm'){
            $gender = "Male";
        }
        else{
            $gender = "Female";
        }

        $userSettings = array(
            'email' => Auth::user()->email,
            'first_name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'birthday' => Auth::user()->birthday,
            'gender' => $gender
        );

        return View::make('displayAllSettings')->with($userSettings);
    }

    public function displaySingleSetting($setting){
        $editableSettings = "email password first_name last_name birthday gender";

        if(str_contains($editableSettings, $setting)){
            switch($setting){
                case "email":
                case "first_name":
                case "last_name":
                    $settingToEdit = array(
                        $setting => Auth::user()->$setting,
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
                        'birthday_month' => substr(Auth::user()->birthday,5,2),
                        'birthday_day' => substr(Auth::user()->birthday,8,2),
                        'birthday_year' => substr(Auth::user()->birthday,0,4),
                        'type' => 'date'
                    );
                    break;
                case "gender":
                    $settingToEdit = array(
                        'gender' => Auth::user()->gender,
                        'type' => 'radio',
                        Auth::user()->gender => true
                    );
                    break;
            }
        }
        $settingToEdit['field'] = $setting;
        return View::make('displaySingleSetting')->with($settingToEdit);
    }

    public function editSetting($setting){
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
                    'new_password' => self::PASSWORD_RULES,
                    'confirm_password' => ''
                )
            );

            if($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput(Input::except(array('old_password','new_password','confirm_password')));
            }

            Auth::user()->changePassword($new_password);

            return Redirect::to('user/settings');
        }
        else if($setting == "first_name" || $setting == "last_name" || $setting == "email" || $setting == "gender"){
            $$setting = Input::get($setting);
            $confirm_password = Input::get('confirm_password');

            if($setting == 'email')
                $rules = self::EMAIL_RULES;
            else if($setting == 'gender')
                $rules = self::GENDER_RULES;
            else
                $rules = self::NAME_RULES;

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
                return Redirect::back()->withErrors($validator)->withInput(Input::except('confirm_password'));
            }

            Auth::user()->saveSetting($setting, $$setting);

            return Redirect::to('user/settings');
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
                    'birthday' => self::BIRTHDAY_RULES,
                    'confirm_password' => 'current_password'
                )
            );

            if($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }

            Auth::user()->saveSetting('birthday', date('Y-m-d', strtotime($birthday)));

            return Redirect::to('user/settings');
        }

    }
}
