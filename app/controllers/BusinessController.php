<?php

class BusinessController extends BaseController {

    public function index(){
        return View::make('business.index')->with(array('page' => 'business'));
    }

}
