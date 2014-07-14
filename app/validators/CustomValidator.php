<?php

// app/validators/CustomValidator

class CustomValidator extends Illuminate\Validation\Validator{
    public function validateCurrentPassword($field, $value, $params){
        if (!Hash::check($value, Auth::user()->password)){
            return false;
        }
        return true;
    }
}