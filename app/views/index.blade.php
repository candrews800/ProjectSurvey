@include('layouts.header')

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>User Sign In</legend>
            @if(Auth::guest())
            {{ Form::open(array('url' => 'user/signin')) }}
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
            {{ Form::close() }}
            @else
                Hello, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                <a href="{{ url('user/logout') }}" class="button">Log out</a>
            @endif
        </fieldset>
    </div>
</div>

<div class="row">
    <div class="small-12 medium-6 columns">
        {{ Form::open(array('url' => 'user/signup')) }}
            <fieldset>
                <legend>User Sign Up</legend>

                <div class="row">
                    <div class="medium-6 columns">
                        {{ Form::label('first_name', 'First Name') }}
                        {{ Form::text('first_name', null, array('placeholder' => 'First Name', 'required' => 'required')) }}
                        @if ($errors->has('first_name'))
                            <small class="error">{{ $errors->first('first_name') }}</small>
                        @endif
                    </div>
                    <div class="medium-6 columns">
                        {{ Form::label('last_name', 'Last Name') }}
                        {{ Form::text('last_name', null, array('placeholder' => 'Last Name', 'required' => 'required')) }}
                        @if ($errors->has('last_name'))
                            <small class="error">{{ $errors->first('last_name') }}</small>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
                        @if ($errors->has('email'))
                            <small class="error">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('placeholder' => 'Password', 'required' => 'required')) }}
                        @if ($errors->has('password'))
                            <small class="error">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="medium-7 columns">
                        <label>Birthday
                            <div class="row">
                                <div class="medium-6 columns">
                                    {{ Form::selectMonth('birthday_month') }}
                                </div>
                                <div class="medium-3 columns">
                                    {{ Form::text('birthday_day', null, array('placeholder' => 'Day', 'required' => 'required')) }}
                                </div>
                                <div class="medium-3 columns">
                                    {{ Form::text('birthday_year', null, array('placeholder' => 'Year', 'required' => 'required')) }}
                                </div>
                            </div>
                            @if ($errors->has('birthday'))
                                <small class="error">{{ $errors->first('birthday') }}</small>
                            @endif
                        </label>
                    </div>
                    <div class="medium-5 columns">
                        <label>Gender</label>
                        <?php
                            echo Form::radio('gender', 'male', false, array('id' => 'male'));
                            echo Form::label('male', 'Male');
                        ?>

                        <?php
                            echo Form::radio('gender', 'female', false, array('id' => 'female'));
                            echo Form::label('female', 'Female');
                        ?>
                        @if ($errors->has('gender'))
                            <small class="error">{{ $errors->first('gender') }}</small>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="medium-6 columns">
                        {{ Form::submit('Sign Up', array('class' => 'button')) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>


@include('layouts.footer')