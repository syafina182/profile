@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}
    <div class="card" style="margin-top:30px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">@lang('labels.backend.access.users.edit')
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row" style="margin-top:25px">
                        <label class="col-md-2 form-control-label">Profile Photo</label>
                        <div class="col-md-10">
                            <div>
                                <img src="{{ $user->picture }}" class="user-profile-image" style="width: 160px; height: 190px;"/>
                            </div>
                            <input type="file" style="margin-top: 30px" id="avatar" name="avatar" accept=".gif, .png, .jpg, .jpeg">
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="first_name" placeholder="Name" value="{{$user->first_name}}" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Username</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{$user->first_name}}" required>
                        </div><!--col-->
                    </div><!--form-group-->


                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">E-mail</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" placeholder="E-mail"  value="{{$user->email}}" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Mobile Number</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="mobile" placeholder="Mobile Number"  value="{{$user->mobile}}" minlength="10" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Occupation</label>
                        <div class="col-md-10">
                            <select name="occupation" class="form-control" style="width: 100%;" required>
                                <option value="">Please Select</option>
                                <option id="IT" value="IT">IT</option>
                                <option id="Engineer" value="Engineer">Engineer</option>
                                <option id="Accountant" value="Accountant">Accountant</option>
                                <option id="Teacher" value="Teacher">Teacher</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="address" placeholder="Address" value="{{$user->address}}" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Gender</label>
                        <div class="col-md-10">
                            <input type="text" id="gd" name="gd"  value="{{$user->gender}}" hidden>
                            <input type="text" id="oc" name="oc"  value="{{$user->occupation}}" hidden>
                            <input type="radio" name="gender" id="male" value="Male" checked/> Male
                            <input style="margin-left: 30px" id="female" type="radio" name="gender" value="Female" /> Female
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col text-right">
                    <button type="button" class="btn btn-sm btn-danger" onclick="history.back()">Cancel</button>
                    <button type="button" class="btn btn-sm btn-success" onclick="confirm();">Update</button>
                    <button type="submit" class="btn btn-sm btn-success" id="save" name="save" hidden>Save</button>
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var gender = document.getElementById("gd").value;
    var occupation = document.getElementById("oc").value;

    if(gender == "Male") {
        document.getElementById("male").checked = true;

    } else if (gender == "Female") {
        document.getElementById("female").checked = true;

    }

    if(occupation == "IT") {
        document.getElementById("IT").selected = true;

    } else if (occupation == "Engineer") {
        document.getElementById("Engineer").selected = true;

    } else if (occupation == "Accountant") {
        document.getElementById("Accountant").selected = true;

    } else if (occupation == "Teacher") {
        document.getElementById("Teacher").selected = true;

    }

    function confirm() {
        Swal.fire({
            title: 'Are you sure you want to update this user?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true,
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                document.getElementById("save").click();
            }
        });
    }
</script>
@endsection
