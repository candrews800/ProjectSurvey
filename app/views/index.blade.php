@include('layouts.header')

<div class="row">
    <div class="small-12 medium-6 columns">
        {{ Form::open(array('url' => 'user/signup')) }}
            <fieldset>
                <legend>User Sign Up</legend>

                <div class="row">
                    <div class="medium-6 columns">
                        {{ Form::label('first_name', 'First Name') }}
                        {{ Form::text('first_name', null, array('placeholder' => 'First Name', 'required' => 'required')) }}
                    </div>
                    <div class="medium-6 columns">
                        {{ Form::label('last_name', 'Last Name') }}
                        {{ Form::text('last_name', null, array('placeholder' => 'Last Name', 'required' => 'required')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('placeholder' => 'Password', 'required' => 'required')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="medium-7 columns">
                        <label>Birthday
                            <div class="row">
                                <div class="medium-6 columns">
                                    {{ Form::selectMonth('month') }}
                                </div>
                                <div class="medium-3 columns">
                                    {{ Form::text('day', null, array('placeholder' => 'Day', 'required' => 'required')) }}
                                </div>
                                <div class="medium-3 columns">
                                    {{ Form::text('year', null, array('placeholder' => 'Year', 'required' => 'required')) }}
                                </div>
                            </div>
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