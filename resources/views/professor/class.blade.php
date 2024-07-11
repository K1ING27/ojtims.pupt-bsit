<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

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
                        <span class="title">Dashboard</span>
                    </a>
                </li>


                <li class="active">
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
                <h1>Class</h1>
            </div>



            <!-- ================ Order Details List =================-->

            <!-- Button trigger modal -->
            {{-- <div class="buttons"style="margin-left: 70%;">
                <div class="AddProfBtn">
                    <button class="updateBtn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >Add New Room</button>
                    <i class="uil uil-plus" style="font-size: 15px;color:white;"></i>
                </div>
            </div> --}}

            <!-- Modal -->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Room</h1>
                        </div>

                        <div class="modal-body">
                            <form action="{{url('/roomCreate')}}" method="post" enctype="multipart/form-data">

            @csrf
            <table>
                <div class="form-group" style="font-size: 22px;">
                    <label class="form-label" for="room">Room Name:</label>
                    <input class="form-input" type="text" name="room">
                </div>

                <div class="form-group" style="font-size: 22px;">
                    <label class="form-label" for="course">Course:</label>

                    <select name="course" class="form-input">
                        @foreach ($course as $course)
                        <option value="{{$course->course}}">{{$course->course}}</option>
                        @endforeach
                    </select>
                </div>

            </table>


            <div class="buttons" style="margin-left: 100px;">
                <button class="modalCloseBtn" type="button" data-bs-dismiss="modal" style="font-size: 18px; font-weight: 400; background-color:#FFA800;"> Close </button>
                <button class="submitBtn" type="submit" data-bs-dismiss="modal" style="font-size: 18px; font-weight: 400;"> Submit </button>
            </div>

            </form>
        </div>
    </div>
    </div>
    </div> --}}

    <!--Room List-->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Rooms</h2>
            </div>

            <table id="fileTable" class="display">
                <thead>
                    <tr>

                        <td data-orderable="true">Course</td>
                        <td>Subject Code</td>
                        <td>Description</td>
                        <td>Academic Year</td>
                        <td>Semester</td>
                        <td>Schedule Day</td>
                        <td>Needing Approval</td>
                        <td>Students List</td>
                        <td>Add Announcements</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($class as $class)
                    <tr>
                        <td>{{$class->course}}</td>
                        @foreach($professor as $prof)
                        @foreach($prof->subjects as $subject)
                        @foreach($sched as $schedule)
                        <td>{{ $subject->subject_code }}</td>
                        <td>{{ $subject->subject_description }}</td>
                        <td>{{ $schedule->academic_year }}</td>
                        <td>{{ $schedule->semester }}</td>
                        <td>
                            <ul id="scheduleList">
                                @if (!empty($schedule->schedule_day))
                                @php
                                $scheduleData = json_decode($schedule->schedule_day, true);
                                @endphp
                                @foreach ($scheduleData as $data)
                                <li>{{ $data['day'] }}: {{ $data['start_time'] }} - {{ $data['end_time'] }}</li>
                                @endforeach
                                @endif
                            </ul>
                        </td>
                        <td>
                            <button class="btnView1" style="margin-left: 10%;">
                                <i class="fa fa-eye"></i>
                                <a href="{{ url('/professor/listStudents', $class->course) }}" style="color: white; text-decoration: none;">View</a>
                            </button>
                        </td>
                        <td>
                            <button class="btnView1" style="margin-left: 10%;">
                                <i class="fa fa-eye"></i>
                                <a href="{{ url('/professor/classList', $class->course) }}" style="color: white; text-decoration: none;">View</a>
                            </button>
                        </td>
                        <td>
                            <!-- Button to trigger modal -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exModal" class="btnAdd" style="margin-left: 20%;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exModalLabel">Create Announcement</h1>
                                        </div>

                                        <div class="modal-body">
                                            <form id="createAnnouncementForm" method="POST" action="{{url('/announcements')}}">
                                                @csrf

                                                <div class="form-group" style="font-size: 22px;">
                                                    <label class="form-label" for="title">Title:</label>
                                                    <input class="form-input" type="text" id="title" name="title" required>
                                                </div>

                                                <div class="form-group" style="font-size: 22px;">
                                                    <label class="form-label" for="content">Content:</label>
                                                    <input class="form-input" type="text" id="content" name="content" rows="4" required>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Create Announcement</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Check if there is a success message from the server
                                    @if(session('success'))
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: '{{ session('
                                        success ') }}'
                                    });
                                    @endif

                                    // Handle form submission
                                    document.getElementById('createAnnouncementForm').addEventListener('submit', function(event) {
                                        event.preventDefault();
                                        var form = this;
                                        Swal.fire({
                                            title: 'Submitting Announcement',
                                            text: 'Please wait...',
                                            icon: 'info',
                                            allowOutsideClick: false,
                                            showConfirmButton: false,
                                            onBeforeOpen: () => {
                                                Swal.showLoading()
                                            }
                                        });
                                        form.submit();
                                    });
                                });
                            </script>


                        </td>

                    </tr>
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
                </tbody>

                <script>
                    // Script for schedule list creation
                    @foreach($sched as $schedule)
                    var scheduleData {
                        {
                            $loop - > iteration
                        }
                    } = {
                        !!json_encode($schedule - > schedule_day) !!
                    };
                    if (scheduleData {
                            {
                                $loop - > iteration
                            }
                        }) {
                        var ul = document.getElementById('scheduleList_{{$loop->iteration}}');
                        var schedule = JSON.parse(scheduleData {
                            {
                                $loop - > iteration
                            }
                        });
                        schedule.forEach(function(data) {
                            var li = document.createElement('li');
                            li.textContent = data.day + ': ' + data.start_time + ' - ' + data.end_time;
                            ul.appendChild(li);
                        });
                    }
                    @endforeach
                </script>
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


<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to show SweetAlert toast
    function showSuccessToast() {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        Toast.fire({
            icon: "success",
            title: "Announcement created successfully!",
            customClass: {
                icon: 'custom-icon-class',
                title: 'custom-title-class'
            }
        });
    }

    // Add event listener to the form submission
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Close the modal
            $('#exModal').modal('hide');

            // Submit form data using AJAX
            $.ajax({
                type: 'POST',
                url: "{{ url('/announcements') }}",
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Show SweetAlert toast upon successful announcement creation
                    showSuccessToast();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        });
    });
</script>