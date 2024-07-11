<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png"> 
    <title>OJTIMS-PUPT</title>
   
    <style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    height: 100%;
    font-family: Arial, sans-serif;
    overflow: hidden; /* Prevent scrolling */
}

.container {
    display: flex;
    height: 100%;
    width: 100%;
    position: relative;
    justify-content: center;
    align-items: center;
}

.image-section {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.image-section img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.login-section {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent background */
    backdrop-filter: blur(30px); /* Apply blur effect */
    -webkit-backdrop-filter: blur(30px); /* Apply blur effect for Safari */
    border-radius: 10px;
    margin-left: auto; /* Align to the right */
    width: 30%; /* Adjust as needed */
    height: 100%; /* Adjust as needed */
}

.logo img {
    width: 100px;
    margin-bottom: 20px;
}

h1 {
    color: black;
    margin-bottom: 10px;
}

p {
    color: #555;
    margin-bottom: 20px;
    text-align: center;
}

.buttons {
    margin-bottom: 20px;
    display: flex;
    flex-direction: row;
    align-items: center;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.student {
    background-color: #007bff;
}

.student:hover {
    background-color: #0056b3;
}

.faculty {
    background-color: #dc3545;
}

.faculty:hover {
    background-color: #c82333;
}

.terms {
    font-size: 12px;
    color: #888;
    text-align: center;
}

.terms a {
    color: #007bff;
    text-decoration: none;
}

.terms a:hover {
    text-decoration: underline;
}
/* Responsive Styles */
@media (max-width: 1200px) {
    .login-section {
        width: 40%;
    }
}

@media (max-width: 992px) {
    .login-section {
        width: 50%;
    }
}

@media (max-width: 768px) {
    .login-section {
        width: 60%;
    }
}

@media (max-width: 576px) {
    .login-section {
        width: 80%;
        height: auto; /* Adjust height for small screens */
        margin-left: 0; /* Center align for small screens */
    }

    .buttons {
        flex-direction: column; /* Stack buttons vertically on small screens */
    }
}
</style>
</head>
<body>
    
    <div class="container">
        <div class="image-section">
            <img id="campusImage" src="/images/puptbg_1.jpg" alt="Campus Building">
        </div>
        <div class="login-section">
            <div class="logo">
                <img src="/images/final-puptg_logo-ojtims_nbg.png" alt="PUP Logo">
            </div>
            <h1>Hi, PUPTian!</h1>
            <p>Please click or tap your destination.</p>
            <div class="buttons">
                <a href="{{ route('studentlogin') }}" class="button student">Student</a>
                <a href="{{ route('facultylogin') }}" class="button faculty">Faculty</a>
            </div>
           
        </div>
    </div>
   
</body>
</html>
<script>
        const images = [
            '/images/puptbg_1.jpg',
            '/images/puptbg_2.jpeg',
            '/images/puptbg_3.jpg',
            // Add more image paths as needed
        ];

        let currentIndex = 0;

        function changeImage() {
            const imageElement = document.getElementById('campusImage');
            currentIndex = (currentIndex + 1) % images.length;
            imageElement.src = images[currentIndex];
        }

        setInterval(changeImage, 8000); // Change image every 8 seconds
    </script>