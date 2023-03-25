<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>-K- School Management Register</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('admin/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <span><span>-K- School</span></span>
                        </div>
                        <div class="login-form">
                            <h4>Register to Administration</h4>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                        invalid-message
                                    @enderror"
                                        placeholder="User Name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email')
                                        invalid-message
                                    @enderror"
                                        placeholder="Email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>NRC Number</label>
                                    <input type="text" name="nrcNum"
                                        class="form-control @error('nrcNum')
                                        invalid-message
                                    @enderror"
                                        placeholder="NRC Number">
                                    @error('nrcNum')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone"
                                        class="form-control @error('phone')
                                        invalid-message
                                    @enderror"
                                        placeholder="Phone Number">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address')
                                        invalid-message
                                    @enderror"
                                        placeholder="Address">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password')
                                        invalid-message
                                    @enderror"
                                        placeholder="Password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation')
                                        invalid-message
                                    @enderror"
                                        placeholder="Password">
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="{{ route('auth#loginPage') }}"> Sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
