<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.7
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>{{ str_replace('-',' ',config('app.name', 'Laravel')) }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-no-background.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('{{asset("assets/media/auth/bg4.jpg")}}');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{asset("assets/media/auth/bg4-dark.jpg")}}');
            }
        </style>
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <a href="javascript:void(0)" class="mb-7">
                        <img alt="Logo" src="{{asset('assets/media/logos/logo-no-background.png')}}" style="width:300px;" />
                    </a>
                    <h2 class="text-white fw-normal m-0">Traffic Tracker</h2>
                </div>
            </div>
            <div class="d-flex flex-center w-lg-50 p-10">
                <div class="card rounded-3 w-md-550px">
                    <div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
                        <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="#" action="#">
                                <div class="text-center mb-10">
                                    <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                                </div>
                                <input type="hidden" name="recaptcha" id="recaptcha">
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                                </div>
                                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                    <button type="button" id="kt_password_reset_submit" disabled class="btn btn-primary me-4">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <a href="#" class="btn btn-light">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/authentication/reset-password/reset-password.js')}}"></script>
</body>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.sitekey') }}" defer></script>
<script defer>
    $(document).ready(function() {
        setRecaptchaToken();
        // Every 90 Seconds
        setInterval(function() {
            setRecaptchaToken();
        }, 90 * 1000);
    });

    function setRecaptchaToken() {
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config("captcha.sitekey") }}', {
                action: 'forgotpassword'
            }).then(function(token) {
                if (token) {
                    document.getElementById('recaptcha').value = token;
                    $('button[type="button"]').prop('disabled', false);
                }
            });
        });
    }
</script>

</html>