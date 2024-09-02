@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center mb-4">
                <div class="form-group text-center">
                    <label class="form-label" for="search-box">Patient</label>
                    <form id="search-form" action="{{ route('patient.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="id_patient" id="id_patient" hidden>
                            <input type="text" class="form-control" id="search-box" name="search-term" placeholder="Search for...">
                            <button type="button" id="search-button" class="input-group-text btn btn-primary text-white">Go!</button>
                        </div>
                    </form>
                    <label for="">Search with PHN/NIC/Passport/BHT/Phone Number(Handphone or Landline)</label>
                    <div id="search-result" class="mt-3 text-red"></div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table  border text-nowrap text-md-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>BHI</th>
                            <th>PHNS</th>
                            <th>NIC</th>
                            <th>Contact</th>
                            <th>Consultant</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows added dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Row-->
<div class="col-lg-6 text-end">
    <button type="button" title="Add" id="btn-add" class="modal-effect btn btn-primary-gradient btn-pill" data-bs-effect="effect-sign" data-bs-toggle="modal" data-bs-target="#modal_"><i class="fe fe-plus me-2"></i>Add</button>
</div>
<!-- /Row -->

@endsection

@section('modal')
@include('pages.modals.clinic')
@endsection

@section('scripts')

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

<script>
    document.getElementById('search-button').addEventListener('click', function() {
        var searchTerm = document.getElementById('search-box').value;

        fetch('{{ route('patient.search') }}?search-term=' + encodeURIComponent(searchTerm))
            .then(response => response.json())
            .then(data => {
                var resultContainer = document.getElementById('search-result');
                if (data.message) {
                    resultContainer.textContent = data.message;

                    // Clear input fields
                    // document.getElementById("id").value = 0;
                    // document.getElementById("ctu_number").value = '';
                    // $('#surgery_id').val('').trigger('change');
                    // document.getElementById("prefix").value = '';
                    // document.getElementById("full_name").value = '';
                    // document.getElementById("gender").value = '';
                    // document.getElementById("age").value = '';
                    // document.getElementById("contact_number_1").value = '';
                    // document.getElementById("contact_number_2").value = '';
                    // $('#district').val('').trigger('change');
                    // document.getElementById("address").value = '';
                    // document.getElementById("ef").value = '';
                    // document.getElementById("diagnosis").value = '';
                    // document.getElementById("comments").value = '';
                    // document.getElementById("cts").value = '';
                    // $('#status').val('').trigger('change');
                } else {
                    // Clear previous search results
                    resultContainer.textContent = '';

                    // Process and display search results
                    if (data && data.length > 0) {
                        var tableBody = document.querySelector('table tbody');
                        tableBody.innerHTML = ''; // Clear existing table rows

                        data.forEach((patient, index) => {
                            var age = calculateAge(patient.patientDateofbirth);
                            var row = `<tr>
                                <td>${index + 1}</td>
                                <td>${patient.patientName}</td>
                                <td>${patient.bhi}</td>
                                <td>${patient.phns}</td>
                                <td>${patient.nic}</td>
                                <td>${patient.contact}</td>
                                <td>${patient.consultant}</td>
                                <td>${patient.patientDateofbirth}</td>
                                <td>${age}</td>
                                <td>${patient.patientSex}</td>
                                <td>${patient.address}</td>
                            </tr>`;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    } else {
                        resultContainer.textContent = 'No patient found.';
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
    });

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
</script>

<!-- HTML code remains the same -->



@endsection