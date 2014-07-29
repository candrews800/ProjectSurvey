@include('layouts.header')

<div class="row">
    <div class="small-12 medium-6 columns">
        {{ Form::open(array('action' => 'RemindersController@postReset')) }}
        <input type="hidden" name="token" value="{{ $token }}">
        <fieldset>
            <legend>Forgot Your Password?</legend>

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
                <div class="medium-12 columns">
                    {{ Form::label('password_confirmation', 'Confirm Password') }}
                    {{ Form::password('password_confirmation', array('placeholder' => 'Password', 'required' => 'required')) }}
                    @if ($errors->has('password_confirmation'))
                        <small class="error">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
            </div>

            {{ Form::submit('Reset Password', array('class' => 'button')) }}
        </fieldset>
        {{ Form::close() }}
    </div>
</div>

@include('layouts.footer')