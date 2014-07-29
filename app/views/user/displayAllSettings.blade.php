@include('user.layouts.header')

<div class="row">
    <div class="medium-6 columns">
        <fieldset>
            <legend>Account Settings</legend>

            <div class="row">
                <div class="medium-10 columns">
                    <h5>Email: <strong>{{ $email }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('user/settings/email') }}">Edit</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Password: </h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('user/settings/password') }}">Edit</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>First Name: <strong>{{ $first_name }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('user/settings/first_name') }}">Edit</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Last Name: <strong>{{ $last_name }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('user/settings/last_name') }}">Edit</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Birthday: <strong>{{ $birthday }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('user/settings/birthday') }}">Edit</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Gender: <strong>{{ $gender }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('user/settings/gender') }}">Edit</a></small></h5>
                </div>
            </div>
        </fieldset>
    </div>
</div>

@include('user.layouts.footer')