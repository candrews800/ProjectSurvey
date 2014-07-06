<?php

class UserController extends BaseController {

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
                'first_name' => 'required|alpha|min:2|max:25',
                'last_name' => 'required|alpha|min:2|max:25',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:40',
                'birthday' => 'required|date|after:1/1/1900|before:today',
                'gender' => 'required|in:m,f'
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
        
    }

}
