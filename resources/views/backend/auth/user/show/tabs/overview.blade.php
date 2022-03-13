<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Profile Picture</th>
                <td><img src="{{ $user->picture }}" class="user-profile-image" style="width: 120px; height: 100px;"/></td>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>

            <tr>
                <th>E-mail</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>Mobile Number</th>
                <td>{{ $user->mobile }}</td>
            </tr>

            <tr>
                <th>Gender</th>
                <td>{{ $user->gender }}</td>
            </tr>

            <tr>
                <th>Occupation</th>
                <td>{{ $user->occupation }}</td>
            </tr>

            <tr>
                <th>Address</th>
                <td>{{ $user->address }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->
