<!doctype html>
<html lang="en">
  <head>
    <title>Register page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets\frontend\css\style.css') }}">
</head>
<style>
    body{
        font-size:15px;font-weight:400;font-family:'Times New Roman'; color:#000000;
    }
</style>
  <body>
        <div class="container my-5 ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header text-center">
                            {{ __('Register') }}
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group mt-2 mb-2">
                                    <label for="">{{__('User Name') }}</label>
                                    <input id="name" type="text" placeholder="Enter username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">{{ __('Email') }}</label>
                                    <input id="email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name') }}"  autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">User type</label>
                                    <select name="user_type" id="user_type"  class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}"  autocomplete="user_type">
                                        <option selected disabled>Select user Type</option>
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                    @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">{{ __('Passwoord') }}</label>
                                    <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                <input type="submit" name="register" value="Register" class="btn bg-primary w-100">
                                </div>
                                <div class="form-group mb-2">
                                have a already your account ? <a href="{{('login')}}">Login</a>
                                  </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>
