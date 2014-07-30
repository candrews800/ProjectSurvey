<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Business extends Eloquent implements RemindableInterface{

    use RemindableTrait;

    protected $table = 'businesses';

    
}
