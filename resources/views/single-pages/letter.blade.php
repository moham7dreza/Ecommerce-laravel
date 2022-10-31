<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ثبت نام</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('letter-assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('letter-assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('letter-assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('letter-assets/css/templatemo-style.css') }}">

    <script type="text/javascript" src="{{ asset('letter-assets/js/modernizr.custom.86080.js') }}"></script>

</head>

<body>

<div id="particles-js"></div>

<ul class="cb-slideshow">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>

<div class="container-fluid">
    <div class="row cb-slideshow-text-container ">
        <div class= "tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section mr-5">
            <header class="mb-5"><h1 class="text-center">ارسال ایمیل</h1></header>
            <P class="mb-5 text-center">لطفا برای ورود یا ثبت نام ایمیل خود را وارد کنید</P>

            <form action="#" method="get" class="subscribe-form">
                <div class="row form-section">

                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <input name="email" type="text" class="form-control text-right" id="contact_email" placeholder="ایمیل خود را وارد کنید" required/>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <button type="submit" class="tm-btn-subscribe">ثبت</button>
                    </div>

                </div>
            </form>

            <div class="tm-social-icons-container text-xs-center align-items-end">
                <a href="#" class="tm-social-link"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-twitter"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-linkedin"></i></a>
            </div>

        </div>
    </div>
    <div class="footer-link">
        <p>Copyright © 2022 - Techzilla.com</p>
    </div>
</div>
</body>

<script type="text/javascript" src="{{ asset('letter-assets/js/particles.js') }}"></script>
<script type="text/javascript" src="{{ asset('letter-assets/js/app.js') }}"></script>
</html>
