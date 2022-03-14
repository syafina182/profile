@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.user.store'))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}
        <div class="card" style="margin-top:30px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.users.create')
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row" style="margin-top:25px">
                            <label class="col-md-2 form-control-label">Profile Photo</label>
                            <div class="col-md-10">
                                <input type="file" id="avatar" name="avatar" accept=".gif, .png, .jpg, .jpeg">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="first_name" placeholder="Name" required>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">Username</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">E-mail</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">Mobile Number</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile Number" minlength="10" required>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">Occupation</label>
                            <div class="col-md-10">
                                <select name="occupation" class="form-control" style="width: 100%;" required>
                                    <option value="">Please Select</option>
                                    <option value="IT">IT</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">Address</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label">Gender</label>
                            <div class="col-md-10">
                                <input type="radio" name="gender" value="Male" /> Male
                                <input style="margin-left: 30px" type="radio" name="gender" value="Female" /> Female
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col text-right">
                    <button type="button" class="btn btn-sm btn-warning" onclick="history.back()">Back</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="reset();">Cancel</button>
                        <button type="button" class="btn btn-sm btn-success" onclick="confirm();">Create</button>
                        <button type="submit" class="btn btn-sm btn-success" id="save" name="save" hidden>Save</button>
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        function confirm() {
            Swal.fire({
                title: 'Are you sure you want to create this user?',
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

        function reset() {
            var elements = document.getElementsByTagName("input");
            for (var ii=0; ii < elements.length; ii++) {
                if (elements[ii].type == "text") {
                    elements[ii].value = "";
                }
            }
        }
    </script>
@endsection
