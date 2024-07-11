<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="{{ asset('/frontend/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/frontend/css/custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"  crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <!-- Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="card">
        <img src="/images/final-puptg_logo-ojtims_nbg.png">
        <br>

        <div class="container">
            <div class="row">
            
                <!-- <h2>On-<span>t</span>he-<span>j</span>ob<span> T</span>raining<span> I</span>nformation<span> M</span>anagement<span> S</span>ystem</h2> -->
                <h2>ON-THE-JOB TRAINING <br> INFORMATION MANAGEMENT SYSTEM</h2>
                <h4>Registration</h4>
                
                <form action="{{ route('register-user') }}" method="post">
    @csrf

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif
    
    <div class="form-group">
        <label for="subject_code">Subject Code</label>
        <select name="subject_code" id="subject_code" class="form-control" value="{{old('subject_code')}}">
            <option value="">Select Subject Code</option> <!-- Default option -->
            @foreach ($schedules as $schedule)
                <option value="{{ $schedule->subject_code }}">{{ $schedule->subject_code }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="adviser_name">Professor</label>
        <input type="text" class="form-control" id="adviser_name" name="adviser_name" value="{{old('adviser_name')}}" readonly>
    </div>

    <div class="form-group">
        <label for="semester">Semester</label>
        <input type="text" class="form-control" id="semester" name="semester"  value="{{old('semester')}}" readonly>
    </div>

    <div class="form-group">
        <label for="academic_year_start">Academic Year Start</label>
        <input type="text" class="form-control" id="academic_year_start" name="academic_year_start" value = "{{old('academic_year_start') }}" readonly>
    </div>

    <div class="form-group">
        <label for="academic_year_end">Academic Year End</label>
        <input type="text" class="form-control" id="academic_year_end" name="academic_year_end" value = "{{old('academic_year_end') }}"readonly >
    </div>

    <!-- Additional form fields -->

    <div class="form-group">
        <label for="studentNum">Student No.</label>
        <input type="text" class="form-control" placeholder="Enter Student No." name="studentNum" value="{{old('studentNum') }}">
        <div class="error-message">
            <span class="text-danger">@error('studentNum') {{ $message }} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="{{ old('first_name') }}">
        <div class="error-message">
            <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="{{ old('last_name') }}">
        <div class="error-message">
            <span class="text-danger">@error('last_name') {{ $message }} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
        <div class="error-message">
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <span class="input-group-text" id="togglePassword">
                <i class="fa fa-eye"></i>
            </span>
            <input type="password" class="form-control" placeholder="Enter 8 character" name="password" id="password">
        </div>
        <span id="password-strength" class="password-strength"></span>
        <div class="error-message">
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <label for="course">Course</label>
        <select name="course" class="form-control">
            @foreach ($course as $course)
                <option value="{{ $course->course }}">{{ $course->course }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="year_and_section">Year and Section</label>
        <input type="text" class="form-control" placeholder="Enter Year and Section" name="year_and_section" value="">
        <div class="error-message">
            <span class="text-danger">@error('year_and_section') {{ $message }} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-block btn-primary" type="submit">Register</button>
    </div>

    <a href="{{ route('studentlogin') }}">Already Registered? Login Here...</a>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const subjectCodeSelect = document.getElementById('subject_code');
        const adviserNameInput = document.getElementById('adviser_name');
        const semesterInput = document.getElementById('semester');
        const academicYearStartInput = document.getElementById('academic_year_start');
        const academicYearEndInput = document.getElementById('academic_year_end');
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const passwordStrength = document.getElementById('password-strength');

        subjectCodeSelect.addEventListener('change', function() {
            const subjectCode = this.value;

            if (subjectCode) {
                fetch(`/fetch-subject-data/${subjectCode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            Swal.fire('Error', data.error, 'error');
                        } else {
                            adviserNameInput.value = data.professor_names;
                            semesterInput.value = data.semester;
                            const academicYear = data.academic_year.split('-');
                            academicYearStartInput.value = academicYear[0];
                            academicYearEndInput.value = academicYear[1];
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching subject data:', error);
                        Swal.fire('Error', 'An error occurred while fetching subject data.', 'error');
                    });
            } else {
                adviserNameInput.value = '';
                semesterInput.value = '';
                academicYearStartInput.value = '';
                academicYearEndInput.value = '';
            }
        });

        // Password visibility toggle
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        // Password strength indicator
        passwordInput.addEventListener('input', function() {
    const password = passwordInput.value;
    const hasSpecialCharacter = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]+/.test(password);

    if (password.length >= 8 && hasSpecialCharacter) {
        passwordInput.setAttribute('maxlength', '8'); // Set max length to 8 characters
    } else {
        passwordInput.removeAttribute('maxlength'); // Remove max length restriction
    }

    // Ensure the user cannot type more than 8 characters
    if (password.length >= 8) {
        passwordInput.value = password.substring(0, 8); // Truncate the input to 8 characters
    }
});

        setTimeout(function() {
            const errorMessages = document.querySelectorAll('.error-message .text-danger');
            errorMessages.forEach(function(message) {
                message.style.display = 'none';
            });
        }, 5000);
    });
</script>

            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"  crossorigin="anonymous"></script>
</html>