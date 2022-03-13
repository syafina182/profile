@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<section id="login" style="background-image: url('img/backend/brand/developer.jpg');">
    <div class="container-fluid" style="width: 100%;height: 100vh;padding: 0;">
        <div class="row" style="height: 100vh;margin-right: 0;margin-left: 0;">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;padding-right: 0;">
                <div class="text-center login_white_bg" >
                    <div class="card-body">
                        @include('includes.partials.messages')
                        <h4 style="margin-top: 20%; font-size: 60px;">PROGRAMMING</h4>
                        {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                            <div class="form-group text-left">
                                <label style="font-weight: bold;letter-spacing: 2px; margin-top:5%">USERNAME</label>
                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}

                                <label style="font-weight: bold;letter-spacing: 2px;">PASSWORD</label>

                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->required() }}


                            <div class="col-14">
                                <button class="btn btn-warning w-100" type="submit" style="border-radius:10px">@lang('LOGIN')</button>
                            </div>
                            </div><!--form-group-->

                            @if(config('access.captcha.login'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        {{ html()->hidden('captcha_status', 'true') }}
                                    </div><!--col-->
                                </div><!--row-->
                            @endif

                        {{ html()->form()->close() }}

                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    @include('frontend.auth.includes.socialite')
                                </div>
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--card body-->
                </div>
            </div>
        </div><!-- col-md-8 -->
    </div><!-- row -->
</section>

@endsection
<style>
    h4 {
        font-size: 1500px;
        color: #fff;
        text-align: center;
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #0310af, 0 0 20px #0310af, 0 0 25px #0310af, 0 0 30px #0310af, 0 0 35px #0310af;
    }
</style>