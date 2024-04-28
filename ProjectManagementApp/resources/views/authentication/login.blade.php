@extends('layouts.master')

@section('title', 'Sign In')

@section('content')
<body class="body-auth">
    <div class="container">
        <div class="row">
            <div class="col-8 p-0">
                <div class="container-text p-0">
                    <p class="text-title p-0">
                        Yira
                    </p>
                    <p class="sub-text-title p-0">
                        Manage Your Project Easily
                    </p>
                </div>
            </div>
            <div class="col-4">
                <div class="card register">
                    <div class="card-title">Sign In</div>
                    <br></br>
                    <form action="{{route('actionlogin')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <p class="forgot-password">Forgot Password? <a href="#">Click Here</a> </p>
                        <br></br>
                        <button type="submit">Sign In</button>
                        <p class="sign-up-here">Don’t have an account ? <a href="{{route('register')}}">Sign Up</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@stop