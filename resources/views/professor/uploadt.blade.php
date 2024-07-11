<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png"> 
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet"> 
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
 
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
                <span class="name"> {{ $user->full_name }} </span>
                <span class="name2">PROFESSOR </span>
            </a>

            <a href="{{ url('/professor/accountinfo') }}" style="text-decoration: none;">
                <span class="hidden-on-big">{{ $user->full_name }}</span>
                <!-- <div class="toggle" id="toggle2">
                    <ion-icon name="menu-outline"></ion-icon>
                </div> -->
            </a>

            <li >
                <a href="{{ url('/professor/home') }}">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title" >Dashboard</span>
                </a>

            </li>

            
            <li>
                <a href="{{ url('/professor/class') }}">
                    <span class="icon">
                        <ion-icon name="clipboard-outline"></ion-icon>
                    </span>
                    <span class="title">Class</span>
                </a>
            </li>


            <li class="active">
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
            <!--<img src="assets/imgs/OJTIMSbg.png" alt="">-->

            <div class="topbar">

                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <span class="subtitle">On-the-Job Training Information Management System </span>
                
            </div>

            <div class="dash">
                <h1>Upload Files</h1>
            </div>

          
            <form action="{{url('/uploadfile')}}" method="post" enctype="multipart/form-data">

                @csrf
        

        
                <!-- ================ Order Details List ================= -->
 
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
                <!-- Button trigger modal -->
                <div class="buttons">
                    <div class="AddProfBtn">
                        <button type="button" class="updateBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                            Upload New Template
                        </button>
                        <i class="uil uil-plus" style="font-size: 15px;"></i>
                    </div>
                </div>
                @if (session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: "{{ session('success') }}",
                            });
                        </script>
                    @endif

                    @if (session('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "{{ session('error') }}",
                            });
                        </script>
                    @endif
  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                    
                            <div class="modal-body">
                                <form id="uploadForm"  action="{{url('/uploadfile')}}" method="post" enctype="multipart/form-data">

                                    @csrf
                                    <table>

                                        <div class="form-group" style="font-size: 22px;">
                                            <label class="form-label" for="name">Name:</label>
                                            <input class="form-input" type="text" name="name" required>
                                        </div>

                                        <div class="form-group" style="font-size: 22px;">
                                            <label class="form-label" for="file">Choose File:</label>
                                            <input class="form-input" type="file" name="file" required>
                                        </div>

                                    </table>
                                
                            </div>


                            <br>
                            <div class="buttonsSection">
                                <button class="closeBtn" type="button" data-bs-dismiss="modal"> Close </button>
                                <button type="submit"  class="printBtn"> Upload </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

          

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Uploaded Templates</h2>
                    </div>
                    

                    <table id="fileTable" class="display">
                        <thead>
                            <tr>
                                <th data-orderable="true">File Name</th>
                                <th></th>
                                <th data-orderable="true">Uploader Name</th>
                                <th data-orderable="true">Date and Time Submitted</th>
                                
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->file}}</td>
                                <td>{{$data->uploader_name}}</td>
                                <td>{{$data->created_at}}</td>

                                <td>
                                    {{-- <button class="btnView" style="margin-left: 10%;">
                                        <i class="fa fa-eye"></i>
                                        <a href="{{ url('/view', $data->id) }}" style="color: white; text-decoration: none;" target="_blank">View</a>
                                    </button> --}}

                                    <button class="btnDownload" style="margin-left: 10%;">
                                        <i class="fa fa-download"></i>
                                        <a href="{{url('/download',$data->file)}}" method="post" enctype="multipart/form-data" style="color: white; text-decoration: none;" >Download</a>
                                    </button>

                                    <!-- Button for removing item -->
                                    <button class="btnRemove" style="margin-left: 10%;">
                                        <i class="fa fa-trash"></i>
                                        <span class="remove-button" data-file-id="{{ $data->id }}">Remove</span>
                                    </button>
                                    
                                    
                                    {{-- <form action="{{url('/remove',$data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button class="btnRemove">
                                            <i class="fa fa-trash"></i>
                                            Remove
                                        </button>
                                    </form> --}}
                                    
                                </td>

                                {{-- <td>
                                    <form action="{{url('/remove',$data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red;color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">
                                            Remove
                                        </button>
                                    </form>
                                </td> --}}

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

                
    <!-- Include jQuery and DataTables scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Enable sorting for the fileTable -->
    <script>
        $(document).ready(function() {
            $('#fileTable').DataTable();
        });
    </script>
                
                <!--<script>
                    
                     // Function to display an alert
                    function showAlert(message) {
                        alert(message);
                    }

                    // Check if there are errors in the 'file' field and display a pop-up
                    @if ($errors->has('file'))
                        showAlert("{{ $errors->first('file') }}");
                    @endif
                </script>-->
                @if($errors->has('file'))
                    <script>
                        // Function to display an alert
                        function showAlert(message) {
                            alert(message);
                        }

                        // Display the error message
                        showAlert("{{ $errors->first('file') }}");
                    </script>
                @endif

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



<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Script for Download button -->
<script>
    // Function to show Sweet Alert toast for download
    function showDownloadToast() {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        Toast.fire({
            icon: "info",
            title: "File download initiated"
        });
    }

    // Add event listener to button click
    document.addEventListener('DOMContentLoaded', function() {
        const downloadButton = document.querySelector('.btnDownload');
        if (downloadButton) {
            downloadButton.addEventListener('click', function(event) {
                // Prevent default link behavior
                event.preventDefault();
                // Call the showDownloadToast function
                showDownloadToast();
                // Get the download link URL
                const downloadUrl = this.querySelector('a').getAttribute('href');
                // Create a temporary anchor element
                const tempLink = document.createElement('a');
                tempLink.href = downloadUrl;
                tempLink.setAttribute('download', '');
                // Append the anchor element to the body and click it to start download
                document.body.appendChild(tempLink);
                tempLink.click();
                document.body.removeChild(tempLink); // Clean up
            });
        }
    });
</script>




<!-- Script for Remove button -->
<script>
    // Function to show Sweet Alert confirmation dialog for removal
    function showRemoveConfirmation(fileId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to remove this item.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, proceed with removal
                removeItem(fileId);
            }
        });
    }

    // Function to remove item via AJAX
    function removeItem(fileId) {
        $.ajax({
            type: 'POST',
            url: '/remove/' + fileId,
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                // Reload the page after successful removal
                location.reload();
            },
            error: function() {
                console.error('An error occurred while processing your request.');
            }
        });
    }

    // Add event listener to "Remove" button click
    $(document).ready(function() {
        $('.remove-button').click(function() {
            var fileId = $(this).data('file-id');
            // Call the showRemoveConfirmation function
            showRemoveConfirmation(fileId);
        });
    });
</script>

