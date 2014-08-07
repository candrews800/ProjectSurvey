@include('layout.header')

<div class="row">
    <div class="small-12 medium-6 columns">
        {{ Form::open(array('url' => 'customer/signup')) }}
            <fieldset>
                <legend>User Sign Up</legend>

                <div class="row">
                    <div class="medium-6 columns">
                        {{ Form::label('first_name', 'First Name') }}
                        {{ Form::text('first_name', null, array('placeholder' => 'First Name', 'required' => 'required')) }}
                        @if ($errors->customer_error->has('first_name'))
                            <small class="error">{{ $errors->customer_error->first('first_name') }}</small>
                        @endif
                    </div>
                    <div class="medium-6 columns">
                        {{ Form::label('last_name', 'Last Name') }}
                        {{ Form::text('last_name', null, array('placeholder' => 'Last Name', 'required' => 'required')) }}
                        @if ($errors->customer_error->has('last_name'))
                            <small class="error">{{ $errors->customer_error->first('last_name') }}</small>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
                        @if ($errors->customer_error->has('email'))
                            <small class="error">{{ $errors->customer_error->first('email') }}</small>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('placeholder' => 'Password', 'required' => 'required')) }}
                        @if ($errors->customer_error->has('password'))
                            <small class="error">{{ $errors->customer_error->first('password') }}</small>
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
                            @if ($errors->customer_error->has('birthday'))
                                <small class="error">{{ $errors->customer_error->first('birthday') }}</small>
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
                        @if ($errors->customer_error->has('gender'))
                            <small class="error">{{ $errors->customer_error->first('gender') }}</small>
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

    <div class="small-12 medium-6 columns">
        {{ Form::open(array('url' => 'business/signup')) }}
        <fieldset>
            <legend>Business Sign Up</legend>

            <div class="row">
                <div class="medium-12 columns">
                    {{ Form::label('name', 'Business Name') }}
                    {{ Form::text('name', null, array('placeholder' => 'Business Name', 'required' => 'required')) }}
                    @if ($errors->business_error->has('name'))
                    <small class="error">{{ $errors->business_error->first('name') }}</small>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="medium-12 columns">
                    {{ Form::label('address1', 'Address Line 1') }}
                    {{ Form::text('address1', null, array('placeholder' => 'Address Line 1', 'required' => 'required')) }}
                    @if ($errors->business_error->has('address1'))
                    <small class="error">{{ $errors->business_error->first('address1') }}</small>
                    @endif
                </div>
                <div class="medium-12 columns">
                    {{ Form::label('address2', 'Address Line 2') }}
                    {{ Form::text('address2', null, array('placeholder' => 'Address Line 2')) }}
                    @if ($errors->business_error->has('address2'))
                    <small class="error">{{ $errors->business_error->first('address2') }}</small>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="small-6 columns">
                    {{ Form::label('city', 'City') }}
                    {{ Form::text('city', null, array('placeholder' => 'City', 'required' => 'required')) }}
                    @if ($errors->business_error->has('city'))
                    <small class="error">{{ $errors->business_error->first('city') }}</small>
                    @endif
                </div>
                <div class="small-3 columns">
                    {{ Form::label('state', 'State') }}
                    {{ Form::states() }}
                    @if ($errors->business_error->has('state'))
                    <small class="error">{{ $errors->business_error->first('state') }}</small>
                    @endif
                </div>
                <div class="small-3 columns">
                    {{ Form::label('zipcode', 'Zip Code') }}
                    {{ Form::text('zipcode', null, array('placeholder' => 'Zip Code', 'required' => 'required')) }}
                    @if ($errors->business_error->has('zipcode'))
                    <small class="error">{{ $errors->business_error->first('zipcode') }}</small>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="medium-12 columns">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
                    @if ($errors->business_error->has('email'))
                    <small class="error">{{ $errors->business_error->first('email') }}</small>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="medium-12 columns">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', array('placeholder' => 'Password', 'required' => 'required')) }}
                    @if ($errors->business_error->has('password'))
                    <small class="error">{{ $errors->business_error->first('password') }}</small>
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


@include('layout.footer')