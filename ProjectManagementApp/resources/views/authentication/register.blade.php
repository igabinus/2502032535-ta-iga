@extends('layouts.master')

@section('title', 'Sign Up')

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
                    <div class="card-title">Sign Up</div>
                    <br></br>
                    <form action="{{route('actionregister')}}" method="post" onsubmit="return validatePasswords()">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="fullname" name="fullname" placeholder="Fullname" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                        </div>
                        <br></br>
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm-password");

    function validatePasswords() {
        const passwordValue = passwordInput.value;
        const confirmPasswordValue = confirmPasswordInput.value;

        if (passwordValue !== confirmPasswordValue) {
            alert("Passwords do not match! Please re-enter.");
            confirmPasswordInput.value = "";
            confirmPasswordInput.focus();
            return false;
        }
        
        return true;
    }

</script>
@stop