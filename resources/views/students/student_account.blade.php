<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <img src="/images/final-puptg_logo-ojtims_nbg.png">
                        <span class="toptitle">OJTIMS</span>
                    </a>

                </li>

                <a href="{{ url('/student/accountinfo') }}" style="text-decoration: none;">
                    <span class="iconname">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="name"> {{ $data->full_name }} </span>
                    <span class="name2">STUDENT </span>
                </a>

                <a href="{{ url('/student/accountinfo') }}" style="text-decoration: none;">
                    <span class="hidden-on-big">{{ $data->full_name }} </span>
                    <!-- <div class="toggle" id="toggle2">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div> -->
                </a>


                <li>
                    <a href="{{ url('/student/home') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>


                <li>
                    <a href="{{ url('/student/ojtinfo') }}">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">OJT Information</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/class') }}">
                        <span class="icon">
                            <ion-icon name="school-outline"></ion-icon>
                        </span>
                        <span class="title">Class</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/files') }}">
                        <span class="icon">
                            <ion-icon name="download-outline"></ion-icon>
                        </span>
                        <span class="title">Downloadable Files</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/pending') }}">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">MOA</span>
                        <span class="icon" style="margin-left: 30%; font-size: 22px;">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/requirements') }}">
                        <span class="icon">
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                        </span>
                        <span class="title">Requirements</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/ojtSite') }}">
                        <span class="icon">
                            <ion-icon name="briefcase-outline"></ion-icon>
                        </span>
                        <span class="title">OJT Sites</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/login') }}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">


            <div class="topbar">

                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <span class="subtitle">On-the-Job Training Information Management System </span>

            </div>

            <div class="dash">
                <h1>Account Information</h1>
            </div>

            <!-- Editable Account Information Form -->
            <div class="detailsacc">
                <div class="recentOrdersacc">
                    <div class="cardHeader">
                        <h2>Personal Details</h2>
                    </div>

                    <div class="accdetails">
                        <div class="accounts">
                            <form class="account-form" action="{{url('/student/edit',$data->email)}}" method="post" style="color: white;">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name:</label>
                                        <input class="form-input" type="text" id="first_name" name="first_name" value="{{$data->first_name}}">
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name:</label>
                                        <input class="form-input" type="text" id="last_name" name="last_name" value="{{$data->last_name}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="suffix">Suffix:</label>
                                        <input class="form-input" type="text" id="suffix" name="suffix" value="{{$data->suffix}}">
                                    </div>
                                    <!-- Add more form fields for the first column here -->
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Address:</label>
                                        <input class="form-inputadd" type="text" id="address" name="address" value="{{$data->address}}">
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group">
                                        <label class="form-label" for="contact_number">Contact No:</label>
                                        <input class="form-input" type="text" id="contact_number" name="contact_number" value="{{$data->contact_number}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="date_of_birth">Date of Birth:</label>
                                        <input class="form-input" type="date" id="date_of_birth" name="date_of_birth" value="{{$data->date_of_birth}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">E-mail:</label>
                                        <input class="form-input" type="email" id="email" name="email" value="{{$data->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="studentNum">Student No.:</label>
                                        <input class="form-input" type="text" id="studentNum" name="studentNum" value="{{$data->studentNum}}">
                                    </div>
                                    <!-- Add more form fields for the second column here -->
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="course">Course:</label>
                                        <select name="course" class="form-input">
                                            @foreach ($course as $courseI)
                                            <option value="{{ $courseI->course }}" {{ $courseI->course == $data->course ? 'selected' : '' }}>
                                                {{ $courseI->course }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="year_and_section">Year and Section:</label>
                                        <input class="form-input" type="text" id="year_and_section" name="year_and_section" value="{{$data->year_and_section}}">
                                    </div>

                                </div>


                                {{-- <div class="form-group">
                        <button class="edit-button" type="submit">Update</button>
                    </div> --}}



                                <button class="updateBtn" type="submit">Update</button>
                            </form>

                            <button class="updateBtnPass" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span class="btnText">Change Password </span>
                                <i class="uil uil-lock" style="font-size: 14px; margin-left: 5px;"></i>
                            </button>








                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                        </div>

                        <div class="modal-body">


                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <td>{{ $error }}</td>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Change Password -->




                            <form class="account-form" action="{{url('/change_password',$data->id)}}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group form-row">
                                    <label class="form-label" for="current_password">Current Password:</label>
                                    <input class="form-input" type="password" id="current_password" name="current_password">
                                    <span class="text-danger">@error('current_password') {{$message}} @enderror</span>
                                </div>

                                <div class="form-group form-row">
                                    <label class="form-label" for="new_password">New Password:</label>
                                    <input class="form-input" type="password" id="new_password" name="new_password">
                                    <span class="text-danger">@error('new_password') {{$message}} @enderror</span>
                                </div>

                                <div class="form-group form-row">
                                    <label class="form-label" for="confirm_password">Confirm New Password:</label>
                                    <input class="form-input" type="password" id="confirm_password" name="confirm_password">
                                    <span class="text-danger">@error('confirm_password') {{$message}} @enderror</span>
                                </div>

                                <div class="buttonsSection">
                                    <button class="closeBtn" type="button" data-bs-dismiss="modal"> Close </button>
                                    <button type="submit" class="printBtn">Update</button>
                                </div>






                            </form>

                        </div>

                    </div>

                </div>

            </div>







            <!-- =========== Scripts =========  -->
            <script src="{{ asset('assets/js/main.js') }}"></script>
            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>