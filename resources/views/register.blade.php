<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <!-- plugins:css -->
    {{-- <link rel="shortcut icon" href="<?php echo url(''); ?>/admin_assets/images/favicon.png" /> --}}
    <link rel="stylesheet" href="<?php echo url(''); ?>/admin_assets/css/classic-vertical/style.css">
    <script src="<?php echo url(''); ?>/admin_assets/js/jquery.min.js"></script>
    <script src="<?php echo url(''); ?>/admin_assets/js/bootstrap.min.js"></script>
    <!-- End layout styles -->
    <style type="text/css">
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color:
                #191c20;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        label {
            color: #fff !important;
        }

        .input-color {
            color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h2 class="card-title text-center mb-4">Registration</h2>
                            @if (session('success'))
                                <div class="alert alert-success mt-1 alert-validation-msg alert-dismissible fade show"
                                    role="alert">
                                    <div class="alert-body">{{ session('success') }}</div>
                                </div>
                            @endif
                            <form method="post" action="{{url('submit_registration')}}">
                                {{ @csrf_field() }}
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name" aria-describedby="login-name" autofocus=""
                                        tabindex="1" value="{{ old('name') }}" autocomplete="off" />
                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="login-email">Email</label>
                                    <input class="form-control" id="login-email" type="text" name="email"
                                        placeholder="john@example.com" aria-describedby="login-email" autofocus=""
                                        tabindex="1" value="{{ old('email') }}" autocomplete="off" />
                                    @error('email')
                                        <span class="error">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="password">Password<span class="required">*</span></label>
                                    <input type="text" name="password" class="form-control" placeholder="Password" value="" autocomplete="off">
                                    @error('password')<span class="error">{{ $message }}</span>@enderror
        
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password<span class="required">*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="off" />
                                </div>
                                <div class="text-center row">
                                    <div class="col-12">
                                       
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary" style="float: right;" tabindex="4">Sign
                                            Up</button>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <a href="{{url('/')}}" style="float: right;">Click here to login...</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

</body>

</html>
