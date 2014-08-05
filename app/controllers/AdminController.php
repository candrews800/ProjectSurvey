<?php

class AdminController extends BaseController {

    public function index(){
        return View::make('admin.index')->with(array('page' => 'admin'));
    }
}
