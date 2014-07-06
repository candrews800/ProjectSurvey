<?php

class UserController extends BaseController {

    const FIRST_NAME_RULES = 'required|alpha|min:2|max:25';
    const LAST_NAME_RULES = 'required|alpha|min:2|max:25';
    const EMAIL_RULES = 'required|email|unique:users,email';
    const PASSWORD_RULES = 'required|min:6|max:40';
    const BIRTHDAY_RULES = 'required|date|after:1/1/1900|before:today';
    const GENDER_RULES = 'required|in:m,f';

    public function signup(){
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $password = Input::get('password');
        $birthday = Input::get('birthday_month') . '/' . Input::get('birthday_day') . '/' . Input::get('birthday_year');
        $gender = Input::get('gender');
        $gender = substr($gender, 0, 1); // Return first letter

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
                'first_name' => self::FIRST_NAME_RULES,
                'last_name' => self::LAST_NAME_RULES,
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

    public function signin(){
        $email = Input::get('email');
        $password = Input::get('password');

        if(Auth::attempt(array('email' => $email, 'password' => $password))){
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
