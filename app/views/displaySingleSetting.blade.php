@include('layouts.header')

<div class="row">
    <div class="medium-6 columns">
        {{ Form::open(array('url' => 'user/settings/' . $field . '/edit')) }}
            <fieldset>
                <legend>Account Settings</legend>
                @if($type != 'password')
                    @if($type == 'text')
                        {{ Form::label($field, ucfirst(str_replace('_', ' ', $field))) }}
                        {{ Form::text($field, $$field, array('placeholder' => ucfirst(str_replace('_', ' ', $field)), 'required' => 'required')) }}
                        @if ($errors->has($field))
                            <small class="error">{{ $errors->first($field) }}</small>
                        @endif
                    @endif
                @else
                    {{ Form::label('old_password', 'Old Password') }}
                    {{ Form::password('old_password', array('placeholder' => 'Old Password', 'required' => 'required')) }}
                    @if ($errors->has('old_password'))
                        <small class="error">{{ $errors->first('old_password') }}</small>
                    @endif

                    {{ Form::label('new_password', 'New Password') }}
                    {{ Form::password('new_password', array('placeholder' => 'New Password', 'required' => 'required')) }}
                    @if ($errors->has('new_password'))
                        <small class="error">{{ $errors->first('new_password') }}</small>
                    @endif
                @endif

                {{ Form::label('confirm_password', 'Confirm Password') }}
                {{ Form::password('confirm_password', array('placeholder' => 'Confirm Password', 'required' => 'required')) }}
                @if ($errors->has('confirm_password'))
                    <small class="error">{{ $errors->first('confirm_password') }}</small>
                @endif

                <div class="row">
                    <div class="medium-6 columns">
                        {{ Form::submit('Change ' . ucfirst(str_replace('_', ' ', $field)), array('class' => 'button')) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>

@include('layouts.footer')