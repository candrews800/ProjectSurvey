<?php
    if(!isset($page))
        $page = ' ';
?>
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

<div class="contain-to-grid sticky">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="{{ url('/') }}">Project Survey</a></h1>
            </li>
        </ul>

        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="left">
                <li class="<?php if($page == 'customer') echo 'active'; ?>"><a href="{{ url('customer') }}">User</a></li>
                <li class="<?php if($page == 'business') echo 'active'; ?>"><a href="{{ url('business') }}">Business</a></li>
                <li class="<?php if($page == 'admin') echo 'active'; ?>"><a href="{{ url('admin') }}">Admin</a></li>
            </ul>

            <!-- Right Nav Section -->

            <ul class="right">
                @if(Auth::guest())
                <li class="has-form">
                    {{ Form::open(array('url' => 'user/login')) }}
                    <div class="row collapse">
                        <div class="medium-5 columns" style="margin-top: -2px">
                            {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
                        </div>
                        <div class="medium-5 columns" style="margin-top: -2px">
                            {{ Form::password('password', array('placeholder' => 'Password', 'required' => 'required')) }}
                        </div>
                        <div class="medium-2 columns">

                            <li class="has-dropdown">
                                <a href="#" onclick="$(this).closest('form').submit()" class="alert">Login</a>
                                <ul class="dropdown">
                                    <li><a href="{{ action('RemindersController@getRemind') }}">Forgot Your Password?</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>
                    {{ Form::close() }}
                </li>
                @else
                <?php $customer = Customer::where('user_id', '=' , Auth::user()->id)->firstOrFail(); ?>
                <li class="has-dropdown">
                    <a href="#">Hello, {{ $customer->first_name . ' ' . $customer->last_name }}</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('customer/settings') }}">Account Settings</a></li>
                    </ul>
                </li>
                <li class="has-form">
                    <a href="{{ url('user/logout') }}" class="button">Log out</a>
                </li>
                @endif
            </ul>
        </section>
    </nav>
</div>