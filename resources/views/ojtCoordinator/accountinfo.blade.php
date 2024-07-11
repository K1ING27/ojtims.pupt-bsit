<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png">
    <!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

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

                <a href="{{ url('/accountinfo') }}" style="text-decoration: none;">
                    <span class="iconname">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="name"> {{ $data->full_name }} </span>
                    <span class="name2">OJT COORDINATOR </span>

                </a>

                <a href="{{ url('/accountinfo') }}" style="text-decoration: none;">
                    <span class="hidden-on-big">{{ $data->full_name }}</span>
                    <!-- <div class="toggle" id="toggle2">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div> -->
                </a>


                <li>
                    <a href="{{ url('/dashboard') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/studentLists') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Students</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/professorTab') }}">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Professors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/uploadpage') }}">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Upload Templates</span>
                    </a>
                </li>


                <li>
                    <a href="{{ url('/maintenance') }}">
                        <span class="icon">
                            <ion-icon name="code-working-outline"></ion-icon>
                        </span>
                        <span class="title">Maintenance</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/MOA') }}">
                        <span class="icon">
                            <ion-icon name="folder-outline"></ion-icon>
                        </span>
                        <span class="title">MOA</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/reports') }}">
                        <span class="icon">
                            <ion-icon name="cellular-outline"></ion-icon>
                        </span>
                        <span class="title">Reports</span>
                        <span class="icon" style="margin-left: 30%; font-size: 22px;">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/professor/login') }}">
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
                    <!-- <div class="cardHeader" >
                        <h2>Personal Details</h2>
                    </div> -->

                    <div class="accdetails">
                        <div class="accounts">
                            <form class="account-form" action="{{url('/edit',$data->email)}}" method="post" style="color: white;">
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
                                    <!-- Add more form fields for the second column here -->
                                </div>


                                <div class="form-group">

                                </div>



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
                                </div>

                                <div class="form-group form-row">
                                    <label class="form-label" for="new_password">New Password:</label>
                                    <input class="form-input" type="password" id="new_password" name="new_password">
                                </div>

                                <div class="form-group form-row">
                                    <label class="form-label" for="confirm_password">Confirm New Password:</label>
                                    <input class="form-input" type="password" id="confirm_password" name="confirm_password">
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
            <script src="assets/js/main.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.account-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission for now
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to update the account details.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Form submission confirmed, proceed with AJAX or regular form submit
                    form.submit(); // Submit the form
                }
            });
        });
    });
</script>
