<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery and SweetAlert libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


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



                <li class="active">
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
                <h1>OJT Information</h1>
            </div>

            <!-- Editable Account Information Form -->
            <div class="detailsacc" style="margin-left: 2%; width: 140%; overflow: auto;">
    <div class="recentOrdersacc" style="width: 900px;">
        <div class="accdetails">
            <div class="accounts">
                <form class="account-form1" id="ojtEditForm" action="{{ url('/student/ojtEdit', $data->studentNum) }}" method="post" style="color: white;">
                    @csrf
                    @method('PUT')

                    <div class="form-column">
                        <div class="form-group">
                            <label class="form-label" for="company_name">Company Name:</label>
                            <select class="form-input" id="company_name" name="company_name" style="width: 300px;">
                                <option value="" {{ old('company_name', $user->company_name) == '' ? 'selected' : '' }}>Select a company</option>
                                @foreach($companies as $company)
                                    @php
                                        // Extract start year from school_year
                                        list($startYear, $endYear) = explode('-', $company->school_year);
                                        $startYear = (int) $startYear;
                                    @endphp
                                    @if ($startYear && (now()->year - $startYear < 3)) {{-- Ensure company is not older than 3 years --}}
                                        <option value="{{ $company->company_name }}" data-address="{{ $company->company_address }}" data-link="{{ $company->companyLink }}" data-contact="{{ $company->company_rep }}" data-number="{{ $company->companyNo }}" data-school-year="{{ $company->school_year }}" {{ old('company_name', $user->company_name) == $company->company_name ? 'selected' : '' }}>
                                            {{ $company->company_name }}
                                        </option>
                                    @endif
                                @endforeach
                                <option value="other" {{ old('company_name', $user->company_name) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <input class="form-input" type="text" id="company_name_input" name="company_name_input" placeholder="Or enter a new company" style="width: 300px; display: none;" value="{{ old('company_name_input', $user->company_name == 'other' ? $user->company_name_input : '') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="company_address">Company Address:</label>
                            <input class="form-input" type="text" id="company_address" name="company_address" value="{{ old('company_address', $user->company_address) }}">
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="form-group">
                            <label class="form-label" for="companyLink">Company Link:</label>
                            <input class="form-input" type="text" id="companyLink" name="companyLink" value="{{ old('companyLink', $user->companyLink) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nature_of_bus">Nature of Business:</label>
                            <label class="form-labelsub" for="nature_of_bus">(i.e. Educational Institution, Government Agency, Telecommunication, Travel Agency, Hotel and Hospitality Service, Food Service, BPOs, NGOs, POS, etc.)</label>
                            <input class="form-input" type="text" id="nature_of_bus" name="nature_of_bus" value="{{ old('nature_of_bus', $user->nature_of_bus) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nature_of_link">Nature of Networking or Linkages:</label>
                            <label class="form-labelsub" for="nature_of_link">(Please indicate if: Academic Linkages, Benefactors, Research and Extension Linkage, Educational and Cultural Exchange, Government Agencies Partners, National/Institutional Membership, Non-Government Organizations Partners, OJT/Training Stations etc.)</label>
                            <input class="form-input" type="text" id="nature_of_link" name="nature_of_link" value="{{ old('nature_of_link', $user->nature_of_link) }}">
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="form-group">
                            <label class="form-label" for="level">Level:</label>
                            <input class="form-input" type="text" id="level" name="level" value="{{ old('level', $user->level) }}" placeholder="(International, National, Regional, Local)">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="start_date">Start Date:</label>
                            <input class="form-input" type="date" id="start_date" name="start_date" value="{{ old('start_date', $user->start_date) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="finish_date">End Date:</label>
                            <input class="form-input" type="date" id="finish_date" name="finish_date" value="{{ old('finish_date', $user->finish_date) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="report_time">Reporting Time:</label>
                            <input class="form-input" type="text" id="report_time" name="report_time" value="{{ old('report_time', $user->report_time) }}" placeholder="e.g. 9:00 am - 6:00 pm (Monday - Friday)" style="width: 300px;">
                            <small class="error-message" id="report_time_error">Invalid input format. Please use 9:00 am - 6:00 pm (Monday - Friday)</small>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="contact_name">Contact Name:</label>
                            <input class="form-input" type="text" id="contact_name" name="contact_name" value="{{ old('company_rep', $user->contact_name) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="contact_position">Position of Contact:</label>
                            <input class="form-input" type="text" id="contact_position" name="contact_position" value="{{ old('contact_position', $user->contact_position) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="contact_number">Contact Number of Representative:</label>
                            <input class="form-input" type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}">
                        </div>

                        <div class="form-group">
                            <button class="edit-button" type="submit" style="margin-right: 5px;">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Get the current year
        var currentYear = new Date().getFullYear();

        // Hide options with school year 3 years or more older than current year
        $('#company_name option').each(function() {
            var schoolYear = $(this).data('school-year');
            if (schoolYear && currentYear - schoolYear >= 3) {
                $(this).hide();
            }
        });

        function toggleCompanyNameInput() {
            var selectedOption = $('#company_name').find('option:selected');
            if (selectedOption.val() === "other") {
                $('#company_name_input').show().prop('disabled', false);
                var storedValue = localStorage.getItem('company_name_input');
                if (storedValue) {
                    $('#company_name_input').val(storedValue);
                }
            } else {
                $('#company_name_input').hide().prop('disabled', true).val('');

                var address = selectedOption.data('address');
                var link = selectedOption.data('link');
                var contact = selectedOption.data('contact');
                var contactNo = selectedOption.data('number');
                if (selectedOption.val() !== "") {
                    $('#company_address').val(address);
                    $('#companyLink').val(link);
                    $('#contact_name').val(contact);
                    $('#contact_number').val(contactNo);
                }
            }
            localStorage.setItem('selected_company_name', selectedOption.val());
        }

        // Restore the selected option and input value on page load
        function restoreSelection() {
            var selectedCompanyName = localStorage.getItem('selected_company_name');
            if (selectedCompanyName) {
                $('#company_name').val(selectedCompanyName);
                toggleCompanyNameInput(); // Ensure the input field state is updated
            }
        }

        // Call the restore function on page load
        restoreSelection();

        // Call the toggle function on select change
        $('#company_name').on('change', toggleCompanyNameInput);

        // Handle form submission
        $('#ojtEditForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var companyNameInput = $('#company_name_input').val().trim();
            var selectedCompanyName = $('#company_name').find('option:selected').val();

            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Update Successful',
                        text: 'Your OJT details have been successfully updated!',
                        timer: 3000, // Auto close after 3 seconds
                        showConfirmButton: false
                    });

                    if (selectedCompanyName === "other" && companyNameInput !== "") {
                        localStorage.setItem('company_name_input', companyNameInput);
                    } else {
                        localStorage.removeItem('company_name_input');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    console.log('Response:', xhr.responseText); // Log the full response
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: 'There was an error updating the form. Please try again.',
                    });
                }
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


<script>
    document.getElementById("report_time").addEventListener("input", function() {
        const input = this.value.trim();
        const pattern = /^(\d{1,2}:\d{2} [APap][Mm] - \d{1,2}:\d{2} [APap][Mm])\s+\((Monday|Tuesday|Wednesday|Thursday|Friday)\s*-\s*(Monday|Tuesday|Wednesday|Thursday|Friday)\)$/;
        const errorMessage = document.getElementById("report_time_error");

        if (input.match(pattern)) {
            // Valid input format
            errorMessage.style.display = "none";
            this.classList.remove("is-invalid");
            this.classList.add("is-valid");
            const [timeRange, days] = input.split(" (");
            const [timeIn, timeOut] = timeRange.split(" - ");
            const dayRange = days.slice(0, -1); // Remove the closing parenthesis

            // You can access timeIn, timeOut, and dayRange here for further processing
            console.log("Time-In:", timeIn);
            console.log("Time-Out:", timeOut);
            console.log("Days:", dayRange);
        } else {
            // Invalid input format
            errorMessage.style.display = "block";
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
    });
</script>