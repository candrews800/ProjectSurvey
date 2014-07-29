<?php
    $status = Session::get('status');
    $error = Session::get('error');
?>



@include('layouts.header')

<div class="row">
    <div class="small-12 medium-6 columns">
        {{ Form::open(array('action' => 'RemindersController@postRemind')) }}
        <fieldset>
            <legend>Forgot Your Password?</legend>

            @if(!empty($status) || !empty($error))
            <div data-alert class="alert-box alert">
                {{ $status }}
                {{ $error }}
                <a href="#" class="close">&times;</a>
            </div>
            @endif

            {{ Form::label('email', 'Enter Your Email Address') }}
            {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}

            {{ Form::submit('Send Reminder', array('class' => 'button')) }}
        </fieldset>
        {{ Form::close() }}
    </div>
</div>

@include('layouts.footer')