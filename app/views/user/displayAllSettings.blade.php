@include('layout.header')

<div class="row">
    <div class="medium-6 columns">
        <fieldset>
            <legend>Account Settings</legend>

            <div class="row">
                <div class="medium-10 columns">
                    <h5>Email: <strong>{{ $email }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('customer/settings/email') }}">Change</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Password: </h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('customer/settings/password') }}">Change</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>First Name: <strong>{{ $first_name }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('customer/settings/first_name') }}">Change</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Last Name: <strong>{{ $last_name }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('customer/settings/last_name') }}">Change</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Birthday: <strong>{{ $birthday }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('customer/settings/birthday') }}">Change</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Gender: <strong>{{ $gender }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('customer/settings/gender') }}">Change</a></small></h5>
                </div>
            </div>
        </fieldset>
    </div>
</div>

@include('layout.footer')