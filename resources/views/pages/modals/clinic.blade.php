<div class="modal fade" id="modal_">
    <div class="modal-dialog modal-lg modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal">Patient's Clinical Record</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body text-start">
                <div class="card-body">
                    <form id="form" action="{{ route('complaints.store') }}" method="POST">
                        @csrf
                        <div class="list-group">
                            <!-- Patient -->
                            <div class="d-flex flex-column align-items-center mb-4">
                                <div class="form-group text-center">
                                    <label class="form-label" for="search-box">Patient</label>
                                    <form id="search-form" action="{{ route('patient.search') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="id_patient" id="id_patient" hidden>
                                            <input type="text" class="form-control" id="search-box" name="search-term" placeholder="Search for...">
                                            <button type="submit" id="search-button" class="input-group-text btn btn-primary text-white">Go!</button>
                                        </div>
                                    </form>
                                    <small class="form-text text-muted">Search with PHN/NIC/Passport/BHT/Phone Number (Handphone or Landline)</small>
                                    <div id="search-result" class="mt-3 text-danger"></div>
                                </div>
                                <!-- Personal Info Table -->
                                <div class="row mb-3 bg-info p-3 w-100">
                                    <h3 class="card-title text-center w-100">Personal Info</h3>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td><strong>PHN:</strong><br><input type="text" class="form-control" id="patient" name="patient" readonly></td>
                                                <td><strong>BHT:</strong><br><input type="text" class="form-control" id="BHTClinicFileNo" readonly></td>
                                                <td><strong>Gender:</strong><br><input type="text" class="form-control" id="gender" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Full Name:</strong><br><input type="text" class="form-control" id="full_name" readonly></td>
                                                <td><strong>Ward:</strong><br><input type="text" class="form-control" id="ward" readonly></td>
                                                <td><strong>Age:</strong><br><input type="text" class="form-control" id="age" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div style="display: flex;">
                                <!-- Navigation Column -->
                                <div style="width: 150px; background-color: #f8f9fa; padding: 10px; border-radius: 7px;">
                                    <ul class="nav1 nav-column flex-column br-7" style="list-style-type: none; padding: 0;">
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page1" onclick="showPage(1)" style="text-decoration: none; color: #4CAF50; font-weight: bold;">Presenting Complaint</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page2" onclick="showPage(2)" style="text-decoration: none; color: black;">Current Pregnancy Hx</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page3" onclick="showPage(3)" style="text-decoration: none; color: black;">Past Obstetric Hx</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page4" onclick="showPage(4)" style="text-decoration: none; color: black;">Past Gyn Hx</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page5" onclick="showPage(5)" style="text-decoration: none; color: black;">Past Med Hx</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page6" onclick="showPage(6)" style="text-decoration: none; color: black;">Allergic Hx</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page7" onclick="showPage(7)" style="text-decoration: none; color: black;">Other HX</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page8" onclick="showPage(8)" style="text-decoration: none; color: black;">Gyn Examination</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page9" onclick="showPage(9)" style="text-decoration: none; color: black;">Obs Examination</a>
                                        </li>
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page10" onclick="showPage(10)" style="text-decoration: none; color: black;">IX</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Form Content -->
                                <div style="flex-grow: 1; padding: 20px;">
                                    <form id="form" action="{{ route('complaints.store') }}" method="POST">
                                        @csrf
                                        <input type="text" class="form-control" name="input_id_patient" id="input_id_patient" hidden>
                                        <!-- Category -->
                                        <div class="container d-flex justify-content-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="category-dropdown">Category</label>
                                                    <select name="category" class="form-control form-select" id="category-dropdown" data-bs-placeholder="Select Category" onchange="changeCategory()">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="GYN">GYN</option>
                                                        <option value="OBS">OBS</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Presenting Complaint -->
                                        <div id="page1" class="form-page" style="display: block;">
                                            <h2>Presenting Complaint</h2>
                                            <div style="padding: 15px; background-color: #d9edf7;">
                                                @include('pages.fields.presenting_complaint')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(2)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Current Pregnancy Hx -->
                                        <div id="page2" class="form-page" style="display: none;">
                                            <h2>Current Pregnancy Hx</h2>
                                            <div style="padding: 15px; background-color: #f5f5f5;">
                                                @include('pages.fields.current_pregnancy_hx')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(1)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(3)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Past Obstetric Hx -->
                                        <div id="page3" class="form-page" style="display: none;">
                                            <h2>Past Obstetric Hx</h2>
                                            <div style="padding: 15px; background-color: #d9edf7;">
                                                @include('pages.fields.past_obstetric_hx')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(2)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(4)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Past Gyn Hx -->
                                        <div id="page4" class="form-page" style="display: none;">
                                            <h2>Past Gyn Hx</h2>
                                            <div style="padding: 15px; background-color: #f5f5f5;">
                                                @include('pages.fields.past_gyn_hx')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(3)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(5)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Past Med Hx -->
                                        <div id="page5" class="form-page" style="display: none;">
                                            <h2>Past Med Hx</h2>
                                            <div style="padding: 15px; background-color: #d9edf7;">
                                                @include('pages.fields.past_med_hx')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(4)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(6)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Allergic Hx -->
                                        <div id="page6" class="form-page" style="display: none;">
                                            <h2>Allergic Hx</h2>
                                            <div style="padding: 15px; background-color: #f5f5f5;">
                                                @include('pages.fields.allergic_hx')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(5)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(7)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Other HX -->
                                        <div id="page7" class="form-page" style="display: none;">
                                            <h2>Other HX</h2>
                                            <div style="padding: 15px; background-color: #d9edf7;">
                                                @include('pages.fields.other_hx')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(6)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(8)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Gyn Examination -->
                                        <div id="page8" class="form-page" style="display: none;">
                                            <h2>Gyn Examination</h2>
                                            <div style="padding: 15px; background-color: #f5f5f5;">
                                                @include('pages.fields.gyn_examination')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(7)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(9)">Next</button>
                                            </div>
                                        </div>

                                        <!-- Obs Examination -->
                                        <div id="page9" class="form-page" style="display: none;">
                                            <h2>Obs Examination</h2>
                                            <div style="padding: 15px; background-color: #d9edf7;">
                                                @include('pages.fields.obs_examination')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(8)">Back</button>
                                                <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(10)">Next</button>
                                            </div>
                                        </div>

                                        <!-- IX -->
                                        <div id="page10" class="form-page" style="display: none;">
                                            <h2>IX</h2>
                                            <div style="padding: 15px; background-color: #f5f5f5;">
                                                @include('pages.fields.ix')
                                            </div>

                                            <div style="padding-top: 10px;">
                                                <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(9)">Back</button>
                                                <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Patient Search -->
<script>
    document.getElementById('search-button').addEventListener('click', function() {
        var searchTerm = document.getElementById('search-box').value;
        var searchButton = document.getElementById('search-button');
        var originalButtonText = searchButton.textContent;

        // Show loading text or spinner
        searchButton.textContent = 'Loading...';
        searchButton.disabled = true;

        fetch('{{ route("patient.search") }}?search-term=' + encodeURIComponent(searchTerm))
            .then(response => response.json())
            .then(data => {
                var resultContainer = document.getElementById('search-result');
                if (data.message) {
                    resultContainer.textContent = data.message;

                    // Assigning values
                    $("#id").val(0);
                    $("#category").val('').trigger('change');
                    $("#patient").val('');
                    $("#surgery").val('').trigger('change');
                    $("#surgery_date").val('');
                    // $("#prefix").val('');
                    $("#full_name").val('');
                    $("#gender").val('');
                    $("#age").val('');
                    $("#ward").val('');
                    $("#BHTClinicFileNo").val('');
                    $("#diagnosis").val('');
                } else {
                    resultContainer.textContent = '';
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
            })
            .finally(() => {
                // Hide loading text or spinner
                searchButton.textContent = originalButtonText;
                searchButton.disabled = false;
            });
    });
</script>

<script>
    function calculateAge(dateOfBirth) {
        var dob = new Date(dateOfBirth);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var monthDiff = today.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        return age;
    }

    $('#search-button').click(function() {
        var searchTerm = $('#search-box').val();
        $.ajax({
            url: "{{ route('patient.search') }}",
            method: 'GET',
            data: {
                'search-term': searchTerm
            },
            success: function(response) {
                if (response) {
                    $('#id_patient').val(response.patientID);
                    $('#input_id_patient').val(response.patientID);
                    $('#patient').val(response.patientID);
                    // $('#prefix').text(response.patientPersonalTitle);
                    // $('#full_name').val(response.patientName);
                    var fullname = response.patientPersonalTitle + ' ' + response.patientName;
                    $('#full_name').val(fullname);
                    $('#gender').val(response.patientSex);
                    var age = calculateAge(response.patientDateofbirth);
                    $('#age').val(age);
                    $('#ward').val(response.ward);
                    $('#BHTClinicFileNo').val(response.BHTClinicFileNo);
                } else {
                    alert('No patient found.');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>

<script>
    function showPage(pageNumber) {
        var pages = document.querySelectorAll('.form-page');
        pages.forEach(function(page) {
            page.style.display = 'none';
        });
        document.getElementById('page' + pageNumber).style.display = 'block';

        // Update navigation link styles
        var links = document.querySelectorAll('a');
        links.forEach(function(link) {
            link.style.color = 'black';
            link.style.fontWeight = 'normal';
        });
        var activeLink = document.querySelector('a[href="#page' + pageNumber + '"]');
        activeLink.style.color = '#4CAF50';
        activeLink.style.fontWeight = 'bold';
    }
</script>