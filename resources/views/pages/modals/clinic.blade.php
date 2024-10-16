<div class="modal fade" id="modal_">
    <div class="modal-dialog modal-md modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal">Patient Search</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body text-start">
                <div class="card-body">
                    <form id="form" action="{{ route('pregnanacy.store') }}" method="POST">
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
                                            <button type="submit" id="search-button" class="input-group-text btn btn-primary text-white">Search</button>
                                        </div>
                                    </form>
                                    <small class="form-text text-muted">Search with PHN/NIC/Passport/BHT/Phone Number (Handphone or Landline)</small>
                                    <div id="search-result" class="mt-3 text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.modals.clinic_2')

<!-- Patient Search -->
<script>
    document.getElementById('search-button').addEventListener('click', function() {
        var searchTerm = document.getElementById('search-box').value;
        var searchButton = document.getElementById('search-button');
        var originalButtonText = searchButton.textContent;

        // Show loading text or spinner
        searchButton.textContent = 'Searching...';
        searchButton.disabled = true;

        fetch('{{ route("patient.search") }}?search-term=' + encodeURIComponent(searchTerm))
            .then(response => response.json())
            .then(data => {
                var resultContainer = document.getElementById('search-result');
                if (data.message) {
                    resultContainer.textContent = data.message;
                    $('#id_patient').val('');
                    $('#input_id_patient').val('');
                    $('#patient').val('');
                    $('#full_name').val('');
                    $('#gender').val('');
                    $('#age').val('');
                    $('#ward').val('');
                    $('#BHTClinicFileNo').val('');
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
                if (response.redirect){
                    window.location.href = response.redirect;
                }else if (response) {
                    $('#id_patient').val(response.patientID);
                    $('#input_id_patient').val(response.patientID);
                    $('#patient').val(response.patientID);
                    var fullname = response.patientPersonalTitle + ' ' + response.patientName;
                    $('#full_name').val(fullname);
                    $('#gender').val(response.patientSex);
                    var age = calculateAge(response.patientDateofbirth);
                    $('#age').val(age);
                    $('#ward').val(response.ward);
                    $('#BHTClinicFileNo').val(response.BHTClinicFileNo);

                    $('#modalClinic_2_').modal('show');

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

<!-- Page Number -->
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

<!-- Prevent Submit with Enter Key -->
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            const isTextInput = ['TEXTAREA', 'INPUT'].includes(document.activeElement.tagName);
            if (isTextInput) {
                event.preventDefault();
            }
        }
    });
</script>