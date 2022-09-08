<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Register · {{ config('app.name') }}</title>

    <link rel="canonical" href="{{ config('app.url') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <img class="mb-4" src="{{ asset('assets/images/jawwal-logo-new.png') }}" height="57">
            <h1 class="h3 mb-3 fw-normal">Register New Account</h1>

            <div class="form-floating">
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="firstname" placeholder="First Name">
                <label for="firstname">First Name</label>
            </div>
            @error('first_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-floating">
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="lastname" placeholder="Last Name">
                <label for="lastname">Last Name</label>
            </div>
            @error('last_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-floating">
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Username">
                <label for="username">Username</label>
            </div>
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-floating">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email Address</label>
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            
            <div class="form-floating">
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-floating">
                <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordC" placeholder="Confirm Password">
                <label for="floatingPasswordC">Confirm Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
        </form>
    </main>



</body>

</html>