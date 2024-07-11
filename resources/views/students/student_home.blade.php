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
                    <span class="name"> {{ $user->first_name }} {{ $user->last_name }} </span>
                    {{-- <span class="name"> {{ $user->full_name }} </span> --}}
                    <span class="name2">STUDENT </span>
                </a>

                <a href="{{ url('/student/accountinfo') }}" style="text-decoration: none;">
                    <span class="hidden-on-big">{{ $user->first_name }} {{ $user->last_name }}</span>
                    <!-- <div class="toggle" id="toggle2">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div> -->
                </a>

                <li class="active">
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
                <h1>Home</h1>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">

                <div class="card">
                    <div>
                        <a href="{{ url('/student/files') }}" style="color:maroon;text-decoration:none;">
                        <div class="numbers">{{ $fileCount }}</div>
                        <div class="cardName" style="font-size: 18px;">Downloadable Templates</div>
                        
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </div>
                    </a>
                </div>
                <div class="card">
                    <div>
                        <a href="{{ url('/student/ojtSite') }}" style="color:maroon;text-decoration:none;">
                        
                        <div class="cardName" style="font-size: 18px;">Online Platform</div>
                        
                    </div>

                    <div class="iconBx">
                        <ion-icon name="briefcase-outline"></ion-icon>
                    </div>
                    </a>
                </div>
            </div>

        
            <br>
            {{-- <!-- ================ Order Details List =================-->
            <div class="details">
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
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->content }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->announcer }}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                    @endforeach
                                </table>

  
                </div> --}}
                
                <div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Companies</h2>
        </div>
        <div class="table-container">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#companyTable').DataTable({
                        "order": [[0, 'desc']],
                        "columnDefs": [
                            { "targets": 0, "visible": false }
                        ]
                    });
            
                   /* $('.autofillButton').click(function() {
                        var companyName = $(this).data('company_name');
                        var companyAddress = $(this).data('company_address');
                        var companyLink = $(this).data('company_link');
                        var nature_of_bus = $(this).data('nature_of_bus');
                        var nature_of_link = $(this).data('nature_of_link');

                        window.location.href = "{{ route('ojtinfo') }}" + 
                            '?company_name=' + encodeURIComponent(companyName) + 
                            '&company_address=' + encodeURIComponent(companyAddress) + 
                            '&companyLink=' + encodeURIComponent(companyLink);
                            '&nature_of_bus' +encodeURIComponent(nature_of_bus);
                            '&nature_of_link' +encodeURIComponent(nature_of_link);
                    });*/
                });
            </script>
           <!-- <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const autofillButtons = document.querySelectorAll('.autofillButton');

                    autofillButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const companyId = this.getAttribute('data-id');
                            const companyName = this.getAttribute('data-company_name');
                            const companyAddress = this.getAttribute('data-company_address');
                            const companyLink = this.getAttribute('data-companyLink');
                            const nature_of_bus = this.getAttribute('data-nature_of_bus');
                            const nature_of_link = this.getAttribute('data-nature_of_link');

                            const url = new URL('{{ route("ojtinfo") }}', window.location.origin);
                            url.searchParams.append('company_name', companyName);
                            url.searchParams.append('company_address', companyAddress);
                            url.searchParams.append('companyLink', companyLink);
                            url.searchParams.append('nature_of_bus', nature_of_bus);
                            url.searchParams.append('nature_of_link',nature_of_link);
                            
                            // Redirect to the ojtinfo page with query parameters
                            window.location.href = url.toString();
                        });
                    });
                });
            </script>-->
             


            <table id="companyTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>Company Contact No.</th>
                        <th>Company Email</th>
                        <th>Company Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>{{ $company->companyNo }}</td>
                        <td>{{ $company->company_email }}</td>
                        <td><a href="{{ $company->companyLink }}" target="_blank" style="color: black; text-decoration: none" class="comLinkTd">{{ $company->companyLink }}</a></td>
                        <td>
                            <div class="tooltip">
                            <button class="autoApply" id='autoF' data-company-email="{{ $company->company_email }}" data-company-name="{{ $company->company_name }}" data-student-name="{{ $user->full_name }}">
                                Apply
                            </button>
                            <span class="tooltiptext">Apply to Company</span>
                        </td>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script> 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.autoApply');

        buttons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const companyEmail = button.getAttribute('data-company-email');
                const companyName = button.getAttribute('data-company-name');
                const studentName = button.getAttribute('data-student-name');

                if (!companyEmail) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Email Found!',
                        text: 'This company does not have an email.',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                const subject = 'OJT Application';
                const body = `Dear ${companyName},\n\nThis is my application.\n\nRegards,\n${studentName}`;

                // Construct the Gmail compose URL
                const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(companyEmail)}&su=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;

                // Redirect to the Gmail compose URL
                window.open(gmailUrl, '_blank');
            });
        });
    });
</script>


        </div>



            




    </div>
</body>
</html>


<script src="{{url('/assets/js/main.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

