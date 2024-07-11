<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png"> 
    <!-- ======= Styles ====== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        .table-container {
            max-height: 400px; /* Set your desired maximum height */
            overflow-y: auto;
        }
    </style>

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
                    <span class="hidden-on-big">{{ $data->full_name }}</span>
                    <!-- <div class="toggle" id="toggle2">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div> -->
                </a>


                <li>
                <a href="{{ url('/student/home') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title" >Home</span>
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

                <li class="active">
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

                <li >
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
                        <span class="title" >OJT Sites</span>
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
                <h1>Class</h1>
            </div>



            <!-- ================ Order Details List =================-->

           

  <!--Room List-->          
            <div class="details">
                <div class="recentOrders" style="overflow-x: auto;">
                    <div class="cardHeader">
                        <h2>Rooms</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                            
                                <td>Course</td>
                                <td>Subject Code</td>
                                <td>Description</td>
                                <td>Academic Year</td>
                                <td>Semester</td>
                                <td>Schedule Day</td>
                                <td></td>
                              
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($class as $class)
                            @foreach($professor as $prof)
                            @foreach($prof->subjects as $subject) 
                            @foreach($sched as $schedule)
                            
                            <tr>
                                <td>{{$class->course}}</td>
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
                                            @foreach ($scheduleData as $sdata)
                                                <li>{{ $sdata['day'] }}: {{ $sdata['start_time'] }} - {{ $sdata['end_time'] }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                           
                                
                                <td>
                                    @if ($data->status == 3 || $data->status == 1) <!-- Check if student status-->
                                        <span style="color: red;">Already Joined</span>
                                    @else
                                        <button class="btnJoin5" onclick="joinStudent('{{ url('/student/join', $data->email) }}')">
                                            Join 
                                        </button>
                                    @endif
                                    <script>
                                        function joinStudent(url) {
                                            $.ajax({
                                                type: 'POST',
                                                url: url,
                                                data: {
                                                    _token: "{{ csrf_token() }}"
                                                },
                                                success: function(data) {
                                                    location.reload();
                                                },
                                                error: function() {
                                                    console.error('An error occurred while processing your request.');
                                                }
                                            });
                                        }
                                    </script>
                                    
                                
                                    <button class="btnView1" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 10%;">
                                    <i class="fa fa-eye"></i>
                                        View
                                    </button>


   
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Room Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                        
                                                        @csrf
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <td>Subject Code</td>
                                                                    <td>Description</td>
                                                                   
                                                                    <td>Schedule Day</td>
                                                                    <td>Course</td>
                                                                    <td>Status</td>
                                                                    <td>Adviser</td>
                                                                    
                                                                </tr>
                                                            </thead>
                                        
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td>{{ $subject->subject_code }}</td>
                                                                    <td>{{ $subject->subject_description }}</td>                            
                                                                    
                                                                    <td>
                                                                        <ul id="scheduleList">
                                                                            @if (!empty($schedule->schedule_day))
                                                                                @php
                                                                                    $scheduleData = json_decode($schedule->schedule_day, true);
                                                                                @endphp
                                                                                @foreach ($scheduleData as $sdata)
                                                                                    <li>{{ $sdata['day'] }}: {{ $sdata['start_time'] }} - {{ $sdata['end_time'] }}</li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </td>
                                                                    <td>{{ $class->course}}</td>
                                                                    <td>
                                                                        @if ($data->status == 1)
                                                                            <span style="color: green;">Approved</span>
                                                                            @elseif ($data->status == 2)
                                                                                <span style="color: red;">Denied</span>
                                                                                @elseif ($data->status == 3)
                                                                                <span style="color: orange;">Pending</span>
                                                                        @endif

                                                                    </td>
                                                                    <td>{{ $class->adviser_name}}</td>
                                                                                        
                                                                </tr>
                                                                
                                                            </tbody>
                                                            
                                                         </table>
                                        
                                                    
                                        
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                            </div>
                                        </div>
            

            

                                 </td>                          
                            </tr>
                            @endforeach
                            @endforeach
                            @endforeach
                            @endforeach
                        </tbody>
                        <script>
                            // Script for schedule list creation
                            @foreach ($sched as $schedule)
                                var scheduleData{{$loop->iteration}} = {!! json_encode($schedule->schedule_day) !!};
                                if (scheduleData{{$loop->iteration}}) {
                                    var ul = document.getElementById('scheduleList_{{$loop->iteration}}');
                                    var schedule = JSON.parse(scheduleData{{$loop->iteration}});
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











                <br>
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Announcements</h2>
                    </div>
    
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script>
                    $(document).ready(function() {
                    $('#ATable').DataTable();
                });
                </script>
                                
                                <table id="ATable" class="display">
                                    <thead>
                                        <tr>
                                            <th data-orderable="true">Subject</th>
                                            <th data-orderable="true">Comments</th>
                                            <th data-orderable="true">Date</th>
                                            <th data-orderable="true">Announced By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($announce as $announce)
                                        <tr>
                                            <td>{{ $announce->title }}</td>
                                            <td>{{ $announce->content }}</td>
                                            <td>{{ $announce->created_at }}</td>
                                            <td>{{ $announce->announcer }}</td>
                                            
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
