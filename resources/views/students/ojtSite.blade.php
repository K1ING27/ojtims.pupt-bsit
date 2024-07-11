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
    <style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
    }
    .card {
        width: 18rem; /* Fixed width */
        height: 22rem; /* Fixed height */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
    .imgBg {
        width: 100%;
        height: 180px; /* Fixed height for the image */
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 0;
        margin: 0;
    }
    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content:space-around;
        padding: 10px;
        overflow-y: auto; /* Ensures content within the card is scrollable if it exceeds the height */
    }
    .card:hover {
        transform: scale(1.05);

    }
    .modal-footer .btn {
        width: 100px;
        margin: 0 5px;
        display: flex;
        justify-content: space-around;
    }
    .card-text, .card-title {
        margin: 5px 0;
    }
    .imageBg {
        height: 100%;
        width: 100%;
    }
    .btn {

    bottom: 0;
    left: 0;
    right: 0;
    text-decoration: none;
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
                    <span class="name"> {{ $user->full_name }} </span>
                    <span class="name2">STUDENT </span>
                </a>

                <a href="{{ url('/student/accountinfo') }}" style="text-decoration: none;">
                    <span class="hidden-on-big"> {{ $user->full_name }} </span>
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

                <li class="active">
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
            <h1 class="text-center">Online Jobsites</h1>
                        
            <div class="container mt-5">
                <div class="card-container">
                    
                            <div class="card">
                            <img src="/assets/imgs/linkedInBg.jpg" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">LinkedIn</h5>
                                <p class="card-text">Network and find professional opportunities.</p>
                                <a href="https://www.linkedin.com/" target="_blank" class="btn btn-primary">Go to LinkedIn</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/imgs/indeedBg.png" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">Indeed</h5>
                                <p class="card-text">Search for diverse job positions.</p>
                                <a href="https://ph.indeed.com/?r=us" target="_blank" class="btn btn-primary">Go to Indeed</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/imgs/kalibrrBg.jpg" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">kalibrr</h5>
                                <p class="card-text">Match with suitable job placements.</p>
                                <a href="https://ph.indeed.com/?r=us" target="_blank" class="btn btn-primary">Go to kalibrr</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/imgs/glassdoorBg.png" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">Glassdoor</h5>
                                <p class="card-text"> Job listings and company reviews.</p>
                                <a href="https://ph.indeed.com/?r=us" target="_blank" class="btn btn-primary">Go to Glassdoor</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/imgs/jobstreetBg.png" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">Jobstreetph</h5>
                                <p class="card-text"> Asia-Pacific job search site.</p>
                                <a href="https://ph.indeed.com/?r=us" target="_blank" class="btn btn-primary">Go to Jobstreetph</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/imgs/monsterBg.jpg" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">Monster</h5>
                                <p class="card-text">Global employment opportunities website.</p>
                                <a href="https://ph.indeed.com/?r=us" target="_blank" class="btn btn-primary">Go to Monster</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/imgs/onlinejobsBg.jpg" class="imgBg" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">onlinejob|ph</h5>
                                <p class="card-text">Remote work opportunities in the Philippines.</p>
                                <a href="https://ph.indeed.com/?r=us" target="_blank" class="btn btn-primary">Go to onlinejob|ph</a>
                            </div>
                        </div>
                
                </div>
                </div>
            </div>

    <!-- Modal 
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-description">Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" id="modal-link" class="btn btn-primary">Go to site</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const infoModal = document.getElementById('infoModal');
    const infoModalLabel = document.getElementById('infoModalLabel');
    const modalDescription = document.getElementById('modal-description');
    const modalLink = document.getElementById('modal-link');

    document.querySelectorAll('.card').forEach(card => {
      card.addEventListener('click', function() {
        const title = card.getAttribute('data-title');
        const description = card.getAttribute('data-description');
        const link = card.getAttribute('data-link');

        infoModalLabel.textContent = title;
        modalDescription.textContent = description;
        modalLink.href = link;
      });
    });
  });
</script>-->
            


            <!-- ================ Order Details List =================-->

           

  

        </div>



</body>
</html>


    <!-- =========== Scripts =========  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- ====== ionicons ======= -->
   
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
