@include('user.layouts.header')

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
                            echo Form::radio('gender', 'm', false, array('id' => 'male'));
                            echo Form::label('male', 'Male');
                        ?>

                        <?php
                            echo Form::radio('gender', 'f', false, array('id' => 'female'));
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


@include('user.layouts.footer')