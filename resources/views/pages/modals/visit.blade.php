<div class="modal fade" id="modal_">
    <div class="modal-dialog modal-lg modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal"> Clinical Visit Record</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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
                            <div class="list-group-item py-4 bg-info" data-acc-step>
                                @include('pages.fields.presenting_complaint')
                            </div>

                            <!-- Gyn Examination -->
                            <div class="list-group-item py-4" data-acc-step>
                                @include('pages.fields.gyn_examination')
                            </div>

                            <!-- Obs Examination -->
                            <div class="list-group-item py-4  bg-info" data-acc-step>
                                @include('pages.fields.obs_examination')
                            </div>

                            <!-- IX -->
                            <div class="list-group-item py-4" data-acc-step>
                                @include('pages.fields.ix')
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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