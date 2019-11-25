@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome</h3>
                </div>
                <div class="card-body">
                    <h4>My take on the Second Nature code challenge.</h4>

                    <p>
                        There are two kinds of users: customers and admins. Both are defined in the users table. Admins have the admin flag set to true. Customers have their own model, otherwise everyone can be defined in a User model.
                    </p>
                    <p>
                        A customer/admin *must* register by themselves, they cannot be created by an admin. However to become an admin, another admin must grant a customer admin permissions. Seed the database (php artisan db:seed) to create the first admin user [admin@sncc.test / password]. <br><br>
                        All other registered users *must* verify their email address or they will not be able to access the full functionality of the site. [mailtrap.io anyone?]
                    </p>
                    <p>
                        Admins and only admins can CRUD widgets. <br>
                        Admins can disable customers.
                    </p>
                    <p>
                        Customers can add/remove widgets to/from their account.<br>
                        Customers can ship widgets to any address they have defined.
                    </p>
                    <p>
                        This is *not* a shopping cart application.
                    </p>
                    <p>
                        There is a minimal amount of configuration needed to get this application to run, but it is essential for testing that a mailtrap or equivalent account be used to manage multiple customer/admin registration verifications. Sorry, but if I have been asked to put this much effort in, a little effort on your behalf is not too much to ask in return.
                    </p>
                    <p>
                        Note: due to time constraints, no effort to style this application beyond the default Laravel install CSS has been made (hence the reason why mobile hamburger menu does not function correctly).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
