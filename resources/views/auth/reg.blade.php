<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>
<style>

</style>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
          <div class="card login-card">
            <div class="row no-gutters">
              <div class="col-md-5">
                {{-- <img src="{{ asset('login.jpg') }}" alt="login" class="login-card-img"> --}}
                <img src="https://dasma.pcu.edu.ph/wp-content/uploads/2019/01/pcudasma-1-1024x496.jpg" alt="login" class="login-card-img">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                    <center>
                        <div>
                            <img src="https://manila.pcu.edu.ph/wp-content/uploads/2018/05/pcu_logo_final_feb_2017.png" alt="logo" width="100">
                        </div>
                    </center>
                    <p class="login-card-description text-center">Create Your Account</p>
                    <center>
                        <form action="{{ route('auth.create') }}" method="POST">
                            @csrf
                            <div class="results">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="username" class="sr-only">User Name</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" placeholder="Enter User Name">
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email Address">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Register">
                        </form>
                        <a href="#!" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Already have an account? <a href="{{ route('adm.login') }}" class="text-reset">Login here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </center>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
</body>
</html>