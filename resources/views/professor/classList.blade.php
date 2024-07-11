<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png"> 
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"><link rel="stylesheet" href="assets/css/style.css">

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

                <a href="{{ url('/professor/accountinfo') }}" style="text-decoration: none;">
                    <span class="iconname">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="name"> {{ $data->full_name }} </span>
                    <span class="name2">PROFESSOR </span>
                </a>
                <a href="{{ url('/professor/accountinfo') }}" style="text-decoration: none;">
                    <span class="hidden-on-big">{{ $data->full_name }}</span>
                    <!-- <div class="toggle" id="toggle2">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div> -->
                </a>


                <li>
                    <a href="{{ url('/professor/home') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title" >Dashboard</span>
                    </a>
                </li>



                <li  class="active">
                    <a href="{{ url('/professor/class') }}">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Class</span>
                    </a>
                </li>



                <li>
                    <a href="{{ url('/professor/upload') }}">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Upload Templates</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/reportsExpiredProf') }}">
                        <span class="icon">
                            <ion-icon name="cellular-outline"></ion-icon>
                        </span>
                        <span class="title">MOA</span>
                       
                    </a>
                </li>
                <li>
                    <a href="{{ url('/professor/maintain') }}">
                        <span class="icon">
                            <ion-icon name="code-working-outline"></ion-icon>
                        </span>
                        <span class="title">Maintenance</span>
                       
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
                <h1 >Class</h1>
            </div>



            <!-- ================ Order Details List =================-->

            <div class="buttons" style="margin-left: 70%;">
                <div class="AddProfBtn">
                <i class="fa fa-arrow-left" aria-hidden="true"  style="font-size: 15px;color:white;"></i>
                    <!-- Remove the href attribute from the button -->
                    <button class="updateBtn" type="button" id="previousButton" >Previous</button>
                   
                </div>
            </div>


            <script>
                document.getElementById('previousButton').addEventListener('click', function () {
                    // Redirect to the previous page when the button is clicked
                    window.location.href = "{{ url('/professor/class') }}";
                });
            </script>
           <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Student List</h2>
                </div>

                <table id="fileTable" class="display">

                    <thead>
                        <tr>
                            <td data-orderable="true">Student Name</td>
                            <td data-orderable="true">Course</td>
                            <td data-orderable="true">Year & Section</td>
                            <td>Personal Information</td>
                            <td>OJT Information</td>
                            <td>Student Requirements</td>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($studentData as $data)
                    
                        <tr>
                            <td>{{$data['student']->full_name}}</td>
                            <td>{{$data['student']->course }}</td>
                            <td>{{ $data['student']->year_and_section }}</td>
    



                            <td class="text-center">
                                <button class="btnView" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left:1%"
                                    data-full-name="{{ $data['student']->full_name }}"
                                    data-contact-number="{{ $data['student']->contact_number }}"
                                    data-email="{{ $data['student']->email }}"
                                    data-address="{{ $data['student']->address }}"
                                    data-date-of-birth="{{ $data['student']->date_of_birth }}"
                                    data-student-num="{{ $data['ojt']->studentNum }}"
                                >
                                    <i class="fa fa-eye"></i>
                                    View
                                </button>
                    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Student Personal Information</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                

                                                @csrf

                                                <h4 style="color: black" id="full-name"></h4>
                                                <p style="color: maroon">Contact Number: <span id="contact-number"></span></p>
                                                <p style="color: maroon">Email Address: <span id="email"></span></p>
                                                <p style="color: maroon">Address: <span id="address"></span></p>
                                                <p style="color: maroon">Date of Birth: <span id="date-of-birth"></span></p>
                                                <p style="color: maroon">Student Number:<span id="student-num"></span></p>

                                                

                                            </div>

                                            <!-- <div class="buttons" style="margin-left: 450px;">
                                                                            
                                                <button class="modalCloseBtn" type="button" data-bs-dismiss="modal" style="width: 100px; font-size: 18px; font-weight: 400; background-color:#FFA800;"> Close </button>
                                            </div> -->

                                            <br>
                                            <br>
                                            <br>
                                            <div class="buttonsSection">
                                                <button class="closeBtn" type="button" data-bs-dismiss="modal"> Close </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>   

                            <td class="text-center">
                                <button class="btnView" data-bs-toggle="modal" data-bs-target="#exModal" style="margin-left:1%"
                                    data-full-name="{{ $data['student']->full_name }}"
                                    data-company-name="{{ $data['ojt']->company_name }}"
                                    data-company-address="{{ $data['ojt']->company_address }}"
                                    data-nature-of-business="{{ $data['ojt']->nature_of_bus }}"
                                    data-nature-of-linkages="{{ $data['ojt']->nature_of_link }}"
                                    data-company-link = "{{$data ['ojt']->companyLink}}"
                                    data-level="{{ $data['ojt']->level }}"
                                    data-start-date="{{ $data['ojt']->start_date }}"
                                    data-finish-date="{{ $data['ojt']->finish_date }}"
                                    data-report-time="{{ $data['ojt']->report_time }}"
                                    data-contact-name="{{ $data['ojt']->contact_name }}"
                                    data-contact-position="{{ $data['ojt']->contact_position }}"
                                    data-contact-number="{{ $data['ojt']->contact_number }}"
                                >
                                    <i class="fa fa-eye"></i>
                                    View
                                </button>
                            

                                <!-- Modal -->
                                <div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exLabel">Student OJT Information</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                
                                        
                                                @csrf
                                    
                                                <h4 style="color: black" id="full-name"></h4>
                                                <p style="color: maroon">Company Name: <span id="company-name"></span></p>
                                                <p style="color: maroon">Company Address: <span id="company-address"></span></p>
                                                <p style="color: maroon">Nature of Business: <span id="nature-of-business"></span></p>
                                                <p style="color: maroon">Nature of Networking or Linkages: <span id="nature-of-linkages"></span></p>
                                                <p style="color: maroon">Company Link: <span id="company-link"></span></p>
                                                <p style="color: maroon">Level: <span id="level"></span></p>
                                                <p style="color: maroon">Start Date: <span id="start-date"></span></p>
                                                <p style="color: maroon">End Date: <span id="finish-date"></span></p>
                                                <p style="color: maroon">Reporting Time: <span id="report-time"></span></p>
                                                <p style="color: maroon">Contact Name: <span id="contact-name"></span></p>
                                                <p style="color: maroon">Position of Contact: <span id="contact-position"></span></p>
                                                <p style="color: maroon">Contact Number of Representative: <span id="contact-number"></span></p>
                                        
                                            </div>

                                            <!-- <div class="buttons" style="margin-left: 450px;">
                                            
                                                <button class="modalCloseBtn" type="button" data-bs-dismiss="modal" style="width: 100px; font-size: 18px; font-weight: 400; background-color:#FFA800;"> Close </button>
                                            </div> -->

                                            <br>
                                            <br>
                                            <br>
                                            <div class="buttonsSection">
                                                <button class="closeBtn" type="button" data-bs-dismiss="modal"> Close </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>        


                            <script>
                                $(document).ready(function () {
                                    // Handle "Personal Information" modal
                                    $('#exampleModal').on('show.bs.modal', function (event) {
                                        var button = $(event.relatedTarget);
                                        var modal = $(this);
                            
                                        // Populate modal with data from "data-*" attributes
                                        modal.find('#full-name').text(button.data('full-name'));
                                        modal.find('#contact-number').text(button.data('contact-number'));
                                        modal.find('#email').text(button.data('email'));
                                        modal.find('#address').text(button.data('address'));
                                        modal.find('#date-of-birth').text(button.data('date-of-birth'));
                                        modal.find('#student-num').text(button.data('student-num'));
                                    });
                            
                                    // Handle "OJT Information" modal
                                    $('#exModal').on('show.bs.modal', function (event) {
                                        var button = $(event.relatedTarget);
                                        var modal = $(this);
                            
                                        // Populate modal with data from "data-*" attributes
                                        modal.find('#full-name').text(button.data('full-name'));
                                        modal.find('#company-name').text(button.data('company-name'));
                                        modal.find('#company-address').text(button.data('company-address'));
                                        modal.find('#nature-of-business').text(button.data('nature-of-business'));
                                        modal.find('#nature-of-linkages').text(button.data('nature-of-linkages'));
                                        modal.find('#company-link').text(button.data('company-link'))
                                        modal.find('#level').text(button.data('level'));
                                        modal.find('#start-date').text(button.data('start-date'));
                                        modal.find('#finish-date').text(button.data('finish-date'));
                                        modal.find('#report-time').text(button.data('report-time'));
                                        modal.find('#contact-name').text(button.data('contact-name'));
                                        modal.find('#contact-position').text(button.data('contact-position'));
                                        modal.find('#contact-number').text(button.data('contact-number'));
                                        // Populate other data fields similarly
                                    });
                                });
                            </script>
                            



                            <td>
                                <!-- Button for routing to requirements -->

                                <button class="btnView">
                                    <a href="/studentrequire?value={{$data['student']->full_name}}" style="color: white; text-decoration:none;">
                                        <span class="remove-button">Requirements</span>
                                    </a>
                                </button>
                            </td>

                            

                          
                   
                        </tr>
                    
                    
                    </tbody>
                @endforeach
                </table>
                
            </div>

        </div> 
    </div>
</div>



</body>
</html>

<!-- =========== Scripts =========  -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

                    <!-- Include jQuery and DataTables scripts -->
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                
                    <!-- Enable sorting for the fileTable -->
                    <script>
                        $(document).ready(function() {
                            $('#fileTable').DataTable();
                        });
                    </script>
