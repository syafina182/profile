@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card" style="border-color:white; background-color: white!important;">
                <div class="card-header" style="background-color:white !important; color: black;">
                    <strong style="font-size:150%">
                        <i class="fas fa-tachometer-alt" style="margin-right: 20px"></i> Home
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
                                <img class="card-img-top center" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fa fa-mobile"></i> {{ $logged_in_user->mobile }}<br/>
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">STRENGTH</div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <dl class="row">
                                                <dt class="col-md-4"> Teamwork </dt>
                                                <dd class="col-md-8">
                                                    <a>Ability to work in a team</a>
                                                </dd>
                                            </dl>
                                        </li>
                                        <li class="list-group-item">
                                            <dl class="row">
                                                <dt class="col-md-4">Responsible</dt>
                                                <dd class="col-md-8">
                                                    <a>Able to deliver task on time</a>
                                                </dd>
                                            </dl>
                                        </li>
                                        <li class="list-group-item">
                                            <dl class="row">
                                                <dt class="col-md-4">Dedication</dt>
                                                <dd class="col-md-8">
                                                    <a>Able to work under pressure</a>
                                                </dd>
                                            </dl>
                                        </li>
                                    <ul>
                            </div><!--card-->
                            <div class="card mb-4">
                                <div class="card-header">WEAKNESS</div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <dl class="row">
                                            <dt class="col-md-4"> Delegating </dt>
                                            <dd class="col-md-8">
                                                <a>Choose to take on a larger workload</a>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="list-group-item">
                                        <dl class="row">
                                            <dt class="col-md-4">Negative Criticism</dt>
                                            <dd class="col-md-8">
                                                <a>Obsessed with perfecting my work</a>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="list-group-item">
                                        <dl class="row">
                                            <dt class="col-md-4">Negative Criticism</dt>
                                            <dd class="col-md-8">
                                                <a>Obsessed with perfecting my work</a>
                                            </dd>
                                        </dl>
                                    </li>
                                <ul>
                            </div>
                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            OBJECTIVE CAREER
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Seeking a position to explore career options for future. A hard-working and self-motivated. To apply and enhance my knowledge and skills where I can contribute the best of my skills that necessary for the growth of the company.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card mb-4">
                                        <div class="card-header">FAMILY BACKGROUND</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <dl class="row">
                                                    <dt class="col-md-5"> Address </dt>
                                                    <dd class="col-md-7">
                                                        <a>Seri Kembangan, Selangor</a>
                                                    </dd>
                                                </dl>
                                            </li>
                                            <li class="list-group-item">
                                                <dl class="row">
                                                    <dt class="col-md-5">No. Of Siblings</dt>
                                                    <dd class="col-md-7">
                                                        <a> 4 (I'm the third child)</a>
                                                    </dd>
                                                </dl>
                                            </li>
                                            <li class="list-group-item">
                                                <dl class="row">
                                                    <dt class="col-md-5">Parent's Occupation</dt>
                                                    <dd class="col-md-7">
                                                        <a>Father - Store Manager</a><br>
                                                        <a>Mother - Housewife</a>
                                                    </dd>
                                                </dl>
                                            </li>
                                        <ul>
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col-md-7">
                                    <div class="card mb-4">
                                        <div class="card-header">EDUCATION</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <dl class="row">
                                                    <dt class="col-md-4"> 2014 – 2015 </dt>
                                                    <dd class="col-md-8">
                                                        <a>Foundation In Science</a><br>
                                                        <a>- Universiti Teknologi Mara (UiTM) Kampus Puncak Alam</a>
                                                    </dd>
                                                </dl>
                                            </li>
                                            <li class="list-group-item">
                                                <dl class="row">
                                                    <dt class="col-md-4">2015 - 2019</dt>
                                                    <dd class="col-md-8">
                                                        <a>Bachelor Of Engineering (Hons) Electronics Engineering</a><br>
                                                        <a>- Universiti Teknologi Mara (UiTM) Shah Alam</a>
                                                    </dd>
                                                </dl>
                                            </li>
                                        <ul>
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">SKILLS</div>
                                            <div class="slideshow-container" style="margin-top:30px">
                                                <div class="mySlides fade">
                                                    <img src="{{ asset('img/backend/brand/python.jpeg') }}" class="pic">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="{{ asset('img/backend/brand/php.png') }}" class="pic">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="{{ asset('img/backend/brand/ionic.png') }}" class="pic">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="{{ asset('img/backend/brand/html.png') }}" class="pic">
                                                </div>

                                            </div>
                                            <br>

                                            <div style="text-align:center">
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </div>
                                    </div>
                                </div>
                            </div><!-- row -->
                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
@section('page-js-script')
<style>
    .card-header {
        background-color: #E77200;
        color: white;
        border-radius: 50px;
    }

    .active {
        background-color: #717171 !important;
        color: white;
    }

    .card-header:first-child {
        border-radius: 40px;
    }

    .card {
        border-color: coral;
        border-radius: 40px;
    }

    .pic {
        width:100%;
        height: 600px;
        border-radius: 30px;
    }

    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 70%;
        border-radius:40px;
        height: 470px;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }


    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 768px) {
        .pic {
            height: 300px !important;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            border-radius:40px;
            height: 270px;
        }
    }
</style>
<script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        var dot = document.getElementById("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
@stop