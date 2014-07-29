@if (isset($status))
{{ $status }}
@endif

@if (isset($error))
{{ $error }}
@endif

@include('layouts.header')

<div class="row">
    <div class="small-12 medium-6 columns">
        {{ Form::open(array('action' => 'RemindersController@postRemind')) }}
        <fieldset>
            <legend>Forgot Your Password?</legend>

            {{ Form::label('email', 'Enter Your Email Address') }}
            {{ Form::email('email', null, array('placeholder' => 'Email', 'required' => 'required')) }}
            @if ($errors->has('email'))
                <small class="error">{{ $errors->first('email') }}</small>
            @endif

            {{ Form::submit('Send Reminder', array('class' => 'button')) }}
        </fieldset>
        {{ Form::close() }}
    </div>
</div>

@include('layouts.footer')