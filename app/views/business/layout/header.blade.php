<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project Survey</title>
    <link rel="stylesheet" href="{{ url('css/foundation.css') }}" />
    <script src="{{ url('js/vendor/modernizr.js') }}"></script>
</head>
<body>

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Business Sign In</legend>
            @if(Auth::guest())
            {{ Form::open(array('url' => 'business/signin')) }}
            <div class="row collapse">
                <div class="medium-4 columns">
                    {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
                    @if ($errors->has('email'))
                    <small class="error">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="medium-4 medium-offset-1 columns">
                    {{ Form::password('password', array('placeholder' => 'Password', 'required' => 'required')) }}
                </div>
                <div class="medium-2 columns">
                    {{ Form::submit('Sign In', array('class' => 'button postfix')) }}
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <a href="{{ action('RemindersController@getRemind') }}">Forgot Your Password?</a>
                </div>
            </div>
            {{ Form::close() }}
            @else
            <div class="row collapse">
                <div class="medium-6 columns">
                    <h3>Hello, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h3>
                </div>
                <div class="medium-3 columns">
                    <a href="{{ url('business/logout') }}" class="button">Log out</a>
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <a href="{{ url('business/settings') }}">Account Settings</a>
                </div>
            </div>
            @endif
        </fieldset>
    </div>
</div>