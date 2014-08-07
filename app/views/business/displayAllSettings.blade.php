@include('layout.header')

<div class="row">
    <div class="medium-6 columns">
        <fieldset>
            <legend>Account Settings</legend>

            <div class="row">
                <div class="medium-10 columns">
                    <h5>Name: <strong>{{ $name }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('business/settings/name') }}">Change</a></small></h5>
                </div>
            </div>

            <div class="row">
                <div class="medium-10 columns">
                    <h5>Email: <strong>{{ $email }}</strong></h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('business/settings/email') }}">Change</a></small></h5>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <h5>Password: </h5>
                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('business/settings/password') }}">Change</a></small></h5>
                </div>
            </div>

            <div class="row">
                <div class="medium-10 columns">
                    <div class="row">
                        <div class="medium-3 columns">
                            <h5>Address:</h5>
                        </div>
                        <div class="medium-9 columns">
                            <h5>
                                <strong>{{ $address1 }}</strong><br />
                                @if($address2 != "")
                                    <strong>{{ $address2 }}</strong><br />
                                @endif
                                <strong>{{ $city }}, {{ $state }}  {{ $zipcode }}</strong><br />
                            </h5>
                        </div>
                    </div>

                </div>
                <div class="medium-2 columns">
                    <h5><small><a href="{{ url('business/settings/address') }}">Change</a></small></h5>
                </div>
            </div>
        </fieldset>
    </div>
</div>

@include('layout.footer')