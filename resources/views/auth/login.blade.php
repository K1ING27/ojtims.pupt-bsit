<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('/frontend/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/frontend/css/custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        .input-field, .alert {
            width: 100%;
            box-sizing: border-box;
        }

        .alert-custom {
            margin-bottom: 1rem;
        }
        </style>
</head>
<!---This is the faculty login -->

<body>
   
    <div class="card">
        <img src="/images/final-puptg_logo-ojtims_nbg.png">
        <br>

        <div class="container">
            {{-- <div class="row justify-content-center align-items-center vh-100">
                <div class="col-md-6"> --}}
                    <div class="row">
                        {{-- <div > --}}
                            <!-- <h2>On-<span>t</span>he-<span>j</span>ob<span> T</span>raining<span> I</span>nformation<span> M</span>anagement<span> S</span>ystem</h2> -->
                            <h2>ON-THE-JOB TRAINING <br> INFORMATION MANAGEMENT SYSTEM</h2>
                            <h4>Faculty Login</h4>

                            <div class="card2">

                                <form action="{{route('login-user')}}" method="post" class="mt-4">

                                    @if(Session::has('success'))
                                    <div class="alert alert-success alert-custom">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                    <div class="alert alert-danger alert-custom" id="fail-alert">{{Session::get('fail')}}</div>
                                    @endif

                                    @csrf
                                    <!-- <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" placeholder="Enter Email"
                                        name="email" value = "{{old('email')}}">
                                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    </div> -->

                                    <label for="email">E-mail</label>
                                    <div class="input-field">
                                        <i class="fa fa-user" ></i>
                                        <input type="text" class="form-control" placeholder="Enter Email"
                                        name="email" value = "{{old('email')}}">
                                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    </div>

                                    <!--    <label for="studentNum">Student No.</label>
                                        <div class="input-field">
                                        <input type="text" class="form-control" placeholder="Enter Student No."
                                        name="studentNum" value = "{{old('studentNum')}}">
                                        <span class="text-danger">@error('studentNum') {{$message}} @enderror</span>
                                        </div>
                                    <br>-->

                                    <!--<div class="password-container">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password"
                                        name="password" autocomplete="current-password" required="" id="id_password">
                                        <i class="far fa-eye" id="togglePassword"></i>
                                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                    </div>-->

                                    <label for="password">Password</label>
                                    <div class="input-field">
                                        <i class="far fa-eye" id="togglePassword"></i>
                                        <input type="password" class="form-control" placeholder="Enter Password"
                                        name="password" autocomplete="current-password" required="" id="id_password">
                                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                                    </div>

                                    <br>

                                    <a href="/forgot-faculty">Forgot Password?</a>
                                    <br>
                                   
                                </form>
                            </div>
                        {{-- </div> --}}
                    </div>
                {{-- </div>
            </div> --}}
        
        </div>
    </div>
    <script>
        
        // Hide the alert after 3 seconds
        setTimeout(function() {
            var failAlert = document.getElementById('fail-alert');
            if (failAlert) {
                failAlert.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
<script src="{{url('/frontend/js/script.js')}}"></script>