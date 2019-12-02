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
                        A customer/admin *must* register by themselves, they cannot be created by an other admin. Make sure you have seeded the database to create the first admin account [admin@sncc.test / password]. <br>
                    </p>
                    <p>

                    </p>
                    <p>
                        Admins and only admins can CRUD widgets. <br>
                        Create an admin interface to manage users [optional].<br>
                    </p>
                    <p>
                        Customers can add/remove widgets to/from their account.<br>
                        Customers can ship widgets to any address they have defined [optional].
                    </p>
                    <p>
                        This is *not* a shopping cart application.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
