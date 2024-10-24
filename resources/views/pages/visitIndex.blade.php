@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pregnancies Visit</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="col-lg-6">
                    <h3 class="card-title">Pregnancies Visit</h3>
                </div>
                <div class="col-lg-6 text-end">
                    <button type="button" title="Add" id="btn-add" class="modal-effect btn btn-primary-gradient btn-pill" data-bs-effect="effect-sign" data-bs-toggle="modal" data-bs-target="#modal3_"><i class="fe fe-plus me-2"></i>Add</button>
                </div>
            </div>
            <div class="card-body">
                <!-- Personal Info Table -->
                <div class="row mb-3 bg-info p-3 w-100">
                    <h3 class="card-title text-center w-100">Personal Info</h3>
                    <table class="table table-borderless">
                        <tbody>
                            @foreach ($pregnancies as $row)
                            <tr>
                                <td><strong>PHN:</strong><br><input type="text" class="form-control" id="patient" name="patient" value="{{ $row->patient_id }}" readonly></td>
                                <td><strong>BHT:</strong><br><input type="text" class="form-control" id="BHTClinicFileNo" value="{{ $row->BHTClinicFileNo }}" readonly></td>
                                <td><strong>Gender:</strong><br><input type="text" class="form-control" id="gender" value="{{ $row->patientSex }}" readonly></td>
                            </tr>
                            <tr>
                                <td><strong>Full Name:</strong><br><input type="text" class="form-control" id="full_name" value="{{ $row->patientPersonalTitle }} {{ $row->patientName }}" readonly></td>
                                <td><strong>Ward:</strong><br><input type="text" class="form-control" id="ward" value="{{ $row->ward }}" readonly></td>
                                <td><strong>Age:</strong><br><input type="text" class="form-control" id="age" value="{{ $row->age }}" readonly></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Visit Record</h3>
                            </div>
                            <div class="card-body">
                                <div class="panel-group1" id="accordion11" role="tablist">
                                    @foreach($visitData as $date => $visit)
                                    <div class="card overflow-hidden mb-2 border-0">
                                        <a class="accordion-toggle panel-heading1 collapsed"
                                            data-bs-toggle="collapse"
                                            data-bs-parent="#accordion11"
                                            href="#collapse{{ $loop->index }}"
                                            aria-expanded="false">
                                            Visit Date: {{ $date }}
                                        </a>

                                        <div id="collapse{{ $loop->index }}" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                            <div class="panel-body">
                                                @foreach($visit['records'] as $record)
                                                <a href="javascript:void(0)" class="btn btn-info" onclick="openModal('{{ $record->table_name }}', '{{ $pregnancies[0]->patientID }}')">{{ $record->table_name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

{{-- modal section --}}
@section('modal')
@include('pages.modals.clinicView')
@endsection

@section('scripts')

<!-- <script>
    $(document).ready(function() {
        // show modal on backend validation error
        if (!@json($errors -> isEmpty())) {
            $('#modal_').modal('show');
            var id = $('#id').val();
            if (id == 0) {
                $('#createFormModal').html('Create Pregnanacy');
            } else {
                $('#createFormModal').html('Update Pregnanacy');
            }
        }

        // create new record
        $('#btn-add').click(function() {
            document.querySelector('#search-form').querySelectorAll('input, button').forEach(function(element) {
                element.disabled = false;
            });
            $("#id").val(0);
            $("#category").val('').trigger('change');
            $("#patient").val('');
            $("#surgery").val('').trigger('change');
            $("#surgery_date").val('');
            // $("#prefix").text('');
            $("#full_name").val('');
            $("#gender").val('');
            $("#age").val('');
            $("#ward").val('');
            $("#BHTClinicFileNo").val('');
            $("#diagnosis").val('');
            $('#createFormModal').html('Create Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });

        // edit record
        $('.operationList-table').on('click', '.edit', function() {

            $("#id").val($(this).attr('data-id'));
            $("#category").val($(this).attr('data-category'));
            $("#patient").val($(this).attr('data-patientID'));
            $("#surgery").val($(this).attr('data-surgery')).trigger('change');
            $("#surgery_date").val($(this).attr('data-surgery_date'));
            $("#gender").val($(this).attr('data-gender'));
            $("#age").val($(this).attr('data-age'));
            $("#ward").val($(this).attr('data-ward'));
            $("#BHTClinicFileNo").val($(this).attr('data-BHTClinicFileNo'));
            $("#diagnosis").val($(this).attr('data-diagnosis')).trigger('change');
            $('#createFormModal').html('Update Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });

        $('.operationList-table').on('click', '.view', function() {
            let patientID = $(this).data('patientidsearch');

            $.ajax({
                url: "{{ route('pregnanacy.show') }}",
                method: 'GET',
                data: {
                    patientID: patientID
                },
                success: function(response) {
                    let complaintsHTML = '';

                    if(tableName=){

                    }

                    // Present Complaint
                    complaintsHTML += `<label class="form-label">Present Complaint</label>`
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Complaint</th>
                                        <th>Duration</th>
                                        <th>Severity</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.present_complaints)) {
                        response.present_complaints.forEach(item => {
                            complaintsHTML += `
                                <tr>
                                    <td>${item.complaint}</td>
                                    <td>${item.duration}</td>
                                    <td>${item.severity}</td>
                                    <td>${item.remarks}</td>
                                </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="4">No present complaints found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // Current Pregnancy History
                    complaintsHTML += `<label class="form-label">Current Pregnancy History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>G</th>
                                        <th>P</th>
                                        <th>C</th>
                                        <th>POA</th>
                                        <th>LMP</th>
                                        <th>EDD</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.current_pregnancy_hxs)) {
                        response.current_pregnancy_hxs.forEach(item => {
                            complaintsHTML += `
                                        <tr>
                                            <td>${item.g}</td>
                                            <td>${item.p}</td>
                                            <td>${item.c}</td>
                                            <td>${item.poa}</td>
                                            <td>${item.lmp}</td>
                                            <td>${item.edd}</td>
                                            <td>${item.remarks}</td>
                                        </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="7">No current pregnancy history found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // past_obs_hxs
                    complaintsHTML += `<label class="form-label">Past Obstetric History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>POA</th>
                                        <th>MOD</th>
                                        <th>Birth Weight</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.past_obs_hxs)) {
                        response.past_obs_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.year}</td>
                                <td>${item.poa}</td>
                                <td>${item.mod}</td>
                                <td>${item.birth_weight}</td>
                                <td>${item.remarks}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No past obstetric history found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // past_gyn_hxs
                    complaintsHTML += `<label class="form-label">Past Gynecological History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Menarche At</th>
                                        <th>Amount</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>AUB</th>
                                        <th>Contraception</th>
                                        <th>Subfertility</th>
                                        <th>Gender</th>
                                        <th>Male Factors</th>
                                        <th>Ovulatory Disorder</th>
                                        <th>Tubal Factors</th>
                                        <th>Uterine Factors</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.past_gyn_hxs)) {
                        response.past_gyn_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.menarche_at}</td>
                                <td>${item.amount}</td>
                                <td>${item.duration}</td>
                                <td>${item.status}</td>
                                <td>${item.aub}</td>
                                <td>${item.contraception}</td>
                                <td>${item.subfertility}</td>
                                <td>${item.gender}</td>
                                <td>${item.male_factors}</td>
                                <td>${item.ovulatory_disorder}</td>
                                <td>${item.tubal_factors}</td>
                                <td>${item.uterine_factors}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="12">No past gynecological history found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // past_med_hxs
                    complaintsHTML += `<label class="form-label">Past Medical History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Past Med Hx</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.past_med_hxs)) {
                        response.past_med_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.past_med_hx}</td>
                                <td>${item.remarks}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No past medical history found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // allergic_hxs
                    complaintsHTML += `<label class="form-label">Past Allergic History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Drug allergic hx</th>
                                        <th>food allergic hx</th>
                                        <th>Other allergic hx</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.allergic_hxs)) {
                        response.allergic_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.drugalergyhx}</td>
                                <td>${item.foodallergyhx}</td>
                                <td>${item.otherallergyhx}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No past allergic history found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // other_hxs
                    complaintsHTML += `<label class="form-label">Other History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Past Surgery hx</th>
                                        <th>Family hx</th>
                                        <th>Social hx</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.other_hxs)) {
                        response.other_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.past_surgery_hx}</td>
                                <td>${item.family_hx}</td>
                                <td>${item.social_hx}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No other history found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    // Past Obstetric History
                    complaintsHTML += `<label class="form-label">Gynecological Examinations</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>General Gyn</th>
                                        <th>Thyroid Examination</th>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>Temperature</th>
                                        <th>Pulse Rate</th>
                                        <th>Rhythm</th>
                                        <th>Heart Sound</th>
                                        <th>Murmur</th>
                                        <th>Systolic</th>
                                        <th>Diastolic</th>
                                        <th>Breath Sound</th>
                                        <th>Inspection</th>
                                        <th>Percussion</th>
                                        <th>Auscultator</th>
                                        <th>Auscultation</th>
                                        <th>Tenderness</th>
                                        <th>Size</th>
                                        <th>Stress Incontinence</th>
                                        <th>Cervical</th>
                                        <th>OS</th>
                                        <th>Polyp/Ulcer</th>
                                        <th>Cervical Motion Tenderness</th>
                                        <th>Adnexial Mass TAS</th>
                                        <th>Bladder TAS</th>
                                        <th>Free Fluid TAS</th>
                                        <th>Endometrium TVS</th>
                                        <th>Fiber TVS</th>
                                        <th>Size TVS</th>
                                        <th>Direction TVS</th>
                                        <th>Polyps TVS</th>
                                        <th>Echo Pic TVS</th>
                                        <th>Adnexial Mass TVS</th>
                                        <th>Problem List</th>
                                        <th>Medical HX</th>
                                        <th>Surgery HX</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.gyn_examinations)) {
                        response.gyn_examinations.forEach(item => {
                            complaintsHTML += `
                        <tr>
                            <td>${item.generalGyn}</td>
                            <td>${item.thyroid_examinationGyn}</td>
                            <td>${item.height}</td>
                            <td>${item.weight}</td>
                            <td>${item.bmi}</td>
                            <td>${item.temperature}</td>
                            <td>${item.pulse_rate}</td>
                            <td>${item.rhythm}</td>
                            <td>${item.heart_sound}</td>
                            <td>${item.murmur}</td>
                            <td>${item.systolic}</td>
                            <td>${item.diastolic}</td>
                            <td>${item.breath_sound}</td>
                            <td>${item.inspectionGyn}</td>
                            <td>${item.percussion}</td>
                            <td>${item.auscultator}</td>
                            <td>${item.auscultation}</td>
                            <td>${item.tenderness}</td>
                            <td>${item.size}</td>
                            <td>${item.stress_incontinence}</td>
                            <td>${item.cervical}</td>
                            <td>${item.os}</td>
                            <td>${item.polyp_ulcer}</td>
                            <td>${item.cervical_motion_tenderness}</td>
                            <td>${item.adnexialmass_tas}</td>
                            <td>${item.bladder_tas}</td>
                            <td>${item.free_fluid_tas}</td>
                            <td>${item.endometrium_tvs}</td>
                            <td>${item.fiber_tvs}</td>
                            <td>${item.size_tvs}</td>
                            <td>${item.direction_tvs}</td>
                            <td>${item.polyps_tvs}</td>
                            <td>${item.echopic_tvs}</td>
                            <td>${item.adnexialmass_tvs}</td>
                            <td>${item.problist}</td>
                            <td>${item.medical_hx}</td>
                            <td>${item.surgery_hx}</td>
                        </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="25">No gynecological examinations found</td></tr>`;
                    }

                    // Observations
                    complaintsHTML += `<label class="form-label">Observation Examinations</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>General Obs</th>
                                        <th>BP</th>
                                        <th>PR</th>
                                        <th>Thyroid Examination</th>
                                        <th>Inspection</th>
                                        <th>SFH</th>
                                        <th>Lie</th>
                                        <th>Position</th>
                                        <th>Engagement</th>
                                        <th>FHS</th>
                                        <th>Cervical Dilatation</th>
                                        <th>Cervical Consistency</th>
                                        <th>Cervical Canal</th>
                                        <th>Cervical Position</th>
                                        <th>Station</th>
                                        <th>Fetus</th>
                                        <th>Presentation</th>
                                        <th>BPD</th>
                                        <th>AC</th>
                                        <th>HC</th>
                                        <th>FL</th>
                                        <th>CRL</th>
                                        <th>Placental Position</th>
                                        <th>EFW</th>
                                        <th>Liquor</th>
                                        <th>Doppler</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    if (Array.isArray(response.obs_examinations)) {
                        response.obs_examinations.forEach(item => {
                            complaintsHTML += `
                        <tr>
                            <td>${item.generalObs}</td>
                            <td>${item.bp}</td>
                            <td>${item.pr}</td>
                            <td>${item.thyroid_examinationObs}</td>
                            <td>${item.inspectionObs}</td>
                            <td>${item.sfh}</td>
                            <td>${item.lie}</td>
                            <td>${item.position}</td>
                            <td>${item.engagement}</td>
                            <td>${item.fhs}</td>
                            <td>${item.cervical_dilatation}</td>
                            <td>${item.cervical_consistency}</td>
                            <td>${item.cervical_canel}</td>
                            <td>${item.cervical_position}</td>
                            <td>${item.station}</td>
                            <td>${item.fetus}</td>
                            <td>${item.precentation}</td>
                            <td>${item.bpd}</td>
                            <td>${item.ac}</td>
                            <td>${item.hc}</td>
                            <td>${item.fl}</td>
                            <td>${item.crl}</td>
                            <td>${item.placental_position}</td>
                            <td>${item.efw}</td>
                            <td>${item.liquor}</td>
                            <td>${item.dopplier}</td>
                        </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="25">No observation examinations found</td></tr>`;
                    }
                    complaintsHTML += ` </tbody> </table>`;

                    $('#modal2_ .modal-body .card-body').html(complaintsHTML);
                    $('#modal2_').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    });
</script> -->

<script>
    function openModal(tableName, patientID) {
        $.ajax({
            url: "{{ route('pregnanacy.show') }}",
            method: 'GET',
            data: {
                patientID: patientID
            },
            success: function(response) {
                let complaintsHTML = '';

                if (tableName == 'Presenting Complaint') {
                    // Present Complaint
                    complaintsHTML += `<label class="form-label">Present Complaint</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Complaint</th>
                                <th>Duration</th>
                                <th>Severity</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    // Check if present_complaints exists and is an array
                    if (response.present_complaints && Array.isArray(response.present_complaints)) {
                        response.present_complaints.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.complaint}</td>
                                <td>${item.duration}</td>
                                <td>${item.severity}</td>
                                <td>${item.remarks}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="4">No present complaints found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Current Pregnancy Hx') {
                    // Current Pregnancy History
                    complaintsHTML += `<label class="form-label">Current Pregnancy History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>G</th>
                                <th>P</th>
                                <th>C</th>
                                <th>POA</th>
                                <th>LMP</th>
                                <th>EDD</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.current_pregnancy_hxs)) {
                        response.current_pregnancy_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.g || 'N/A'}</td>
                                <td>${item.p || 'N/A'}</td>
                                <td>${item.c || 'N/A'}</td>
                                <td>${item.poa || 'N/A'}</td> <!-- POA is not defined in your model -->
                                <td>${item.lmp || 'N/A'}</td>
                                <td>${item.edd || 'N/A'}</td>
                                <td>${item.remarks || 'N/A'}</td> <!-- Remarks is not defined in your model -->
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="7">No current pregnancy history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Past Obstetric Hx') {
                    // Past Obstetric History
                    complaintsHTML += `<label class="form-label">Past Obstetric History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>POA</th>
                                <th>MOD</th>
                                <th>Birth Weight</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.past_obs_hxs)) {
                        response.past_obs_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.year || 'N/A'}</td>
                                <td>${item.past_obs_poa || 'N/A'}</td>
                                <td>${item.past_obs_mod || 'N/A'}</td>
                                <td>${item.past_obs_birth_weight || 'N/A'}</td>
                                <td>${item.pastObshx_remark || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No past obstetric history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Past Gyn Hx') {
                    // Past Gynecological History
                    complaintsHTML += `<label class="form-label">Past Gynecological History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Menarche At</th> <!-- Corresponds to 'age' in the model -->
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>AUB</th>
                                <th>Contraception</th>
                                <th>Subfertility</th>
                                <th>Gender</th>
                                <th>Male Factors</th>
                                <th>Ovulatory Disorder</th>
                                <th>Tubal Factors</th>
                                <th>Uterine Factors</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.past_gyn_hxs)) {
                        response.past_gyn_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.age || 'N/A'}</td> <!-- Changed 'menarche_at' to 'age' -->
                                <td>${item.amount || 'N/A'}</td>
                                <td>${item.duration || 'N/A'}</td>
                                <td>${item.status || 'N/A'}</td>
                                <td>${item.aub || 'N/A'}</td>
                                <td>${Array.isArray(item.contraception) ? item.contraception.join(', ') : (item.contraception || 'N/A')}</td>
                                <td>${item.subfertility || 'N/A'}</td>
                                <td>${item.gender || 'N/A'}</td>
                                <td>${Array.isArray(item.male_factors) ? item.male_factors.join(', ') : (item.male_factors || 'N/A')}</td>
                                <td>${Array.isArray(item.ovulatory_disorder) ? item.ovulatory_disorder.join(', ') : (item.ovulatory_disorder || 'N/A')}</td>
                                <td>${Array.isArray(item.tubal_factors) ? item.tubal_factors.join(', ') : (item.tubal_factors || 'N/A')}</td>
                                <td>${Array.isArray(item.uterine_factors) ? item.uterine_factors.join(', ') : (item.uterine_factors || 'N/A')}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="12">No past gynecological history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Past Med Hx') {
                    // Past Medical History
                    complaintsHTML += `<label class="form-label">Past Medical History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Past Med Hx</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.past_med_hxs)) {
                        response.past_med_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.past_med_hx || 'N/A'}</td>
                                <td>${item.remarks || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="2">No past medical history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Past Med Drugs Hx') {
                    // Past Medication History
                    complaintsHTML += `<label class="form-label">Past Medication History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Drug Name</th>
                                <th>Dosage</th>
                                <th>Dosage Unit</th>
                                <th>Route</th>
                                <th>Frequency</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.past_med_hx_drugs)) {
                        response.past_med_hx_drugs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.drugpastmedhx_drug_name || 'N/A'}</td>
                                <td>${item.drugpastmedhx_dosage || 'N/A'}</td>
                                <td>${item.drugpastmedhx_dosage_unit || 'N/A'}</td>
                                <td>${item.drugpastmedhx_route || 'N/A'}</td>
                                <td>${item.drugpastmedhx_frequency || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No past medication history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Allergic Hx') {
                    // Allergic History
                    complaintsHTML += `<label class="form-label">Allergic History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Drug Allergy History</th>
                                <th>Food Allergy History</th>
                                <th>Other Allergy History</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.allergic_hxs) && response.allergic_hxs.length > 0) {
                        response.allergic_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.drugalergyhx ? item.drugalergyhx.join(', ') : 'N/A'}</td>
                                <td>${item.foodallergyhx || 'N/A'}</td>
                                <td>${item.otherallergyhx || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="3">No allergic history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Family Hx') {
                    // Family History
                    complaintsHTML += `<label class="form-label">Family History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Family Medical History</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.family_hxs) && response.family_hxs.length > 0) {
                        response.family_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.family_med_hx || 'N/A'}</td>
                                <td>${item.remarks || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="2">No family history found</td></tr>`;
                    }
                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Social Hx') {
                    // Social History
                    complaintsHTML += `<label class="form-label">Social History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Family Status</th>
                                <th>Monthly Income</th>
                                <th>Patient Education</th>
                                <th>Patient Occupation</th>
                                <th>Patient Social Problems</th>
                                <th>Partner Education</th>
                                <th>Partner Occupation</th>
                                <th>Partner Social Problems</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (response.social_hxs) {
                        const item = response.social_hxs; // Assuming response.social_hxs is a single object

                        complaintsHTML += `
                        <tr>
                            <td>${item.family_status || 'N/A'}</td>
                            <td>${item.monthly_income || 'N/A'}</td>
                            <td>${item.patient_education || 'N/A'}</td>
                            <td>${item.patient_occupation || 'N/A'}</td>
                            <td>${item.patient_social_problems ? item.patient_social_problems.join(', ') : 'N/A'}</td>
                            <td>${item.partner_education || 'N/A'}</td>
                            <td>${item.partner_occupation || 'N/A'}</td>
                            <td>${item.partner_social_problems ? item.partner_social_problems.join(', ') : 'N/A'}</td>
                        </tr>`;
                    } else {
                        complaintsHTML += `<tr><td colspan="8">No social history found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Other Hx') {
                    // Other History
                    complaintsHTML += `<label class="form-label">Other History</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Past Surgery History</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (response.other_hxs && response.other_hxs.length > 0) {
                        response.other_hxs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.pastsurgeryhx || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td>No other history found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Gyn Examination') {
                    // Gynecological Examinations
                    complaintsHTML += `<label class="form-label">Gynecological Examinations</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>General Gyn</th>
                                <th>Thyroid Examination</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>BMI</th>
                                <th>Temperature</th>
                                <th>Pulse Rate</th>
                                <th>Rhythm</th>
                                <th>Heart Sound</th>
                                <th>Murmur</th>
                                <th>Systolic</th>
                                <th>Diastolic</th>
                                <th>Breath Sound</th>
                                <th>Inspection</th>
                                <th>Percussion</th>
                                <th>Auscultator</th>
                                <th>Auscultation</th>
                                <th>Tenderness</th>
                                <th>Size</th>
                                <th>Stress Incontinence</th>
                                <th>Cervical</th>
                                <th>OS</th>
                                <th>Polyp/Ulcer</th>
                                <th>Cervical Motion Tenderness</th>
                                <th>Adnexial Mass TAS</th>
                                <th>Bladder TAS</th>
                                <th>Free Fluid TAS</th>
                                <th>Endometrium TVS</th>
                                <th>Fiber TVS</th>
                                <th>Size TVS</th>
                                <th>Direction TVS</th>
                                <th>Polyps TVS</th>
                                <th>Echo Pic TVS</th>
                                <th>Adnexial Mass TVS</th>
                                <th>Problem List</th>
                                <th>Medical HX</th>
                                <th>Surgery HX</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.gyn_examinations) && response.gyn_examinations.length > 0) {
                        response.gyn_examinations.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.general || 'N/A'}</td>
                                <td>${item.thyroid_examination || 'N/A'}</td>
                                <td>${item.height || 'N/A'}</td>
                                <td>${item.weight || 'N/A'}</td>
                                <td>${item.bmi || 'N/A'}</td>
                                <td>${item.temperature || 'N/A'}</td>
                                <td>${item.pulse_rate || 'N/A'}</td>
                                <td>${item.rhythm || 'N/A'}</td>
                                <td>${item.heart_sound || 'N/A'}</td>
                                <td>${item.murmur || 'N/A'}</td>
                                <td>${item.systolic || 'N/A'}</td>
                                <td>${item.diastolic || 'N/A'}</td>
                                <td>${item.breath_sound || 'N/A'}</td>
                                <td>${item.inspection || 'N/A'}</td>
                                <td>${item.percussion || 'N/A'}</td>
                                <td>${item.auscultator || 'N/A'}</td>
                                <td>${item.auscultation || 'N/A'}</td>
                                <td>${item.tenderness || 'N/A'}</td>
                                <td>${item.size || 'N/A'}</td>
                                <td>${item.stress_incontinence || 'N/A'}</td>
                                <td>${item.cervical || 'N/A'}</td>
                                <td>${item.os || 'N/A'}</td>
                                <td>${item.polyp_ulcer || 'N/A'}</td>
                                <td>${item.cervical_motion_tenderness || 'N/A'}</td>
                                <td>${item.adnexial_mass || 'N/A'}</td>
                                <td>${item.tas_uterus || 'N/A'}</td>
                                <td>${item.free_fluid_tas || 'N/A'}</td>
                                <td>${item.endometrium || 'N/A'}</td>
                                <td>${item.fiber_tvs || 'N/A'}</td>
                                <td>${item.size_tvs || 'N/A'}</td>
                                <td>${item.direction || 'N/A'}</td>
                                <td>${item.polyps_tvs || 'N/A'}</td>
                                <td>${item.echopic_tvs || 'N/A'}</td>
                                <td>${item.adnexial_mass_scan || 'N/A'}</td>
                                <td>${item.problist || 'N/A'}</td>
                                <td>${item.medical_hx || 'N/A'}</td>
                                <td>${item.surgery_hx || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="34">No gynecological examinations found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Obs Examination') {
                    // Observations
                    complaintsHTML += `<label class="form-label">Observation Examinations</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>General Obs</th>
                                <th>BP</th>
                                <th>PR</th>
                                <th>Thyroid Examination</th>
                                <th>Inspection</th>
                                <th>SFH</th>
                                <th>Lie</th>
                                <th>Position</th>
                                <th>Engagement</th>
                                <th>FHS</th>
                                <th>Cervical Dilatation</th>
                                <th>Cervical Consistency</th>
                                <th>Cervical Canal</th>
                                <th>Cervical Position</th>
                                <th>Station</th>
                                <th>Fetus</th>
                                <th>Presentation</th>
                                <th>BPD</th>
                                <th>AC</th>
                                <th>HC</th>
                                <th>FL</th>
                                <th>CRL</th>
                                <th>Placental Position</th>
                                <th>EFW</th>
                                <th>Liquor</th>
                                <th>Doppler</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.obs_examinations) && response.obs_examinations.length > 0) {
                        response.obs_examinations.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.generalObs || 'N/A'}</td>
                                <td>${item.bp || 'N/A'}</td>
                                <td>${item.pr || 'N/A'}</td>
                                <td>${item.thyroid_examinationObs || 'N/A'}</td>
                                <td>${item.inspectionObs || 'N/A'}</td>
                                <td>${item.sfh || 'N/A'}</td>
                                <td>${item.lie || 'N/A'}</td>
                                <td>${item.position || 'N/A'}</td>
                                <td>${item.engagement || 'N/A'}</td>
                                <td>${item.fhs || 'N/A'}</td>
                                <td>${item.cervical_dilatation || 'N/A'}</td>
                                <td>${item.cervical_consistency || 'N/A'}</td>
                                <td>${item.cervical_canel || 'N/A'}</td>
                                <td>${item.cervical_position || 'N/A'}</td>
                                <td>${item.station || 'N/A'}</td>
                                <td>${item.fetus || 'N/A'}</td>
                                <td>${item.presentation || 'N/A'}</td>
                                <td>${item.bpd || 'N/A'}</td>
                                <td>${item.ac || 'N/A'}</td>
                                <td>${item.hc || 'N/A'}</td>
                                <td>${item.fl || 'N/A'}</td>
                                <td>${item.crl || 'N/A'}</td>
                                <td>${item.placental_position || 'N/A'}</td>
                                <td>${item.efw || 'N/A'}</td>
                                <td>${item.liquor || 'N/A'}</td>
                                <td>${item.dopplier || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="25">No observation examinations found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Investigation') {
                    // Investigations
                    complaintsHTML += `<label class="form-label">Investigations</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CTG</th>
                                <th>HB</th>
                                <th>PLT</th>
                                <th>WBC</th>
                                <th>CRP</th>
                                <th>Urine Full Report</th>
                                <th>OHTT BSS</th>
                                <th>Antibiotics</th>
                                <th>Plan Delivery</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.investigations) && response.investigations.length > 0) {
                        response.investigations.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.ctg || 'N/A'}</td>
                                <td>${item.hb || 'N/A'}</td>
                                <td>${item.plt || 'N/A'}</td>
                                <td>${item.wbc || 'N/A'}</td>
                                <td>${item.crp || 'N/A'}</td>
                                <td>${item.urine_full_report || 'N/A'}</td>
                                <td>${item.ohtt_bss || 'N/A'}</td>
                                <td>${item.antibiotics || 'N/A'}</td>
                                <td>${item.plan_delivery || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="9">No investigations found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Management') {
                    // Management Plan
                    complaintsHTML += `<label class="form-label">Management Plan</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plan Delivery</th>
                                <th>Management Plan of Action</th>
                                <th>Management Modality</th>
                                <th>Advice</th>
                                <th>Emergency Management</th>
                                <th>Elective Management</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.managements) && response.managements.length > 0) {
                        response.managements.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.plan_delivery || 'N/A'}</td>
                                <td>${item.mng_poa || 'N/A'}</td>
                                <td>${item.mng_mod || 'N/A'}</td>
                                <td>${item.avd || 'N/A'}</td>
                                <td>${item.em || 'N/A'}</td>
                                <td>${item.el || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="6">No management plans found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Management Drugs') {
                    // Management Drugs
                    complaintsHTML += `<label class="form-label">Management Drugs</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Drug Name</th>
                                <th>Dosage</th>
                                <th>Dosage Unit</th>
                                <th>Route</th>
                                <th>Frequency</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.management_drugs) && response.management_drugs.length > 0) {
                        response.management_drugs.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.drugmng_drug_name || 'N/A'}</td>
                                <td>${item.drugmng_dosage || 'N/A'}</td>
                                <td>${item.drugmng_dosage_unit || 'N/A'}</td>
                                <td>${item.drugmng_route || 'N/A'}</td>
                                <td>${item.drugmng_frequency || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="5">No management drugs found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Vital Monitoring') {
                    // Vital Monitoring
                    complaintsHTML += `<label class="form-label">Vital Monitoring</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Systolic</th>
                                <th>Diastolic</th>
                                <th>Pulse Rate</th>
                                <th>Temperature</th>
                                <th>PPH</th>
                                <th>PPH Index</th>
                                <th>HTN</th>
                                <th>HTN Index</th>
                                <th>Psychosis/Depression</th>
                                <th>Psychosis/Depression Index</th>
                                <th>Sepsis</th>
                                <th>Sepsis Index</th>
                                <th>DVT</th>
                                <th>DVT Index</th>
                                <th>ICU Admission</th>
                                <th>ICU Admission Index</th>
                                <th>ICU Admission Management</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.vital_monitorings) && response.vital_monitorings.length > 0) {
                        response.vital_monitorings.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.vm_systolic || 'N/A'}</td>
                                <td>${item.vm_diastolic || 'N/A'}</td>
                                <td>${item.vm_pulse_rate || 'N/A'}</td>
                                <td>${item.vm_temperature || 'N/A'}</td>
                                <td>${item.pph || 'N/A'}</td>
                                <td>${item.pph_i || 'N/A'}</td>
                                <td>${item.htn || 'N/A'}</td>
                                <td>${item.htn_i || 'N/A'}</td>
                                <td>${item.pp_psychosis_depressional || 'N/A'}</td>
                                <td>${item.pp_psychosis_depressional_i || 'N/A'}</td>
                                <td>${item.pp_sepsis || 'N/A'}</td>
                                <td>${item.pp_sepsis_i || 'N/A'}</td>
                                <td>${item.dvt || 'N/A'}</td>
                                <td>${item.dvt_i || 'N/A'}</td>
                                <td>${item.icu_admission || 'N/A'}</td>
                                <td>${item.icu_admission_i || 'N/A'}</td>
                                <td>${item.icu_admission_mx || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="16">No vital monitoring data found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'New Born Status') {
                    // New Born Status
                    complaintsHTML += `<label class="form-label">New Born Status</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Apgar Score</th>
                                <th>Birth Weight</th>
                                <th>PBU Admission</th>
                                <th>PBU Admission Index</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.new_born_statuses) && response.new_born_statuses.length > 0) {
                        response.new_born_statuses.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.baby_dob || 'N/A'}</td>
                                <td>${item.baby_gender || 'N/A'}</td>
                                <td>${item.apgar || 'N/A'}</td>
                                <td>${item.nbs_birth_weight || 'N/A'}</td>
                                <td>${item.pbu_admission || 'N/A'}</td>
                                <td>${item.pbu_admission_i || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td colspan="6">No new born status data found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                if (tableName == 'Summary') {
                    // Summary Section
                    complaintsHTML += `<label class="form-label">Summary</label>`;
                    complaintsHTML += `<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Summary</th>
                            </tr>
                        </thead>
                        <tbody>`;

                    if (Array.isArray(response.summeries) && response.summeries.length > 0) {
                        response.summeries.forEach(item => {
                            complaintsHTML += `
                            <tr>
                                <td>${item.summery || 'N/A'}</td>
                            </tr>`;
                        });
                    } else {
                        complaintsHTML += `<tr><td>No summary data found</td></tr>`;
                    }

                    complaintsHTML += `</tbody></table>`;
                }

                $('#modal2_ .modal-body .card-body').html(complaintsHTML);
                $('#modal2_').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });

        // $('#modal2_').modal('show');
    }
</script>

<!-- Pass patient_id to model -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('btn-add');
        addButton.addEventListener('click', function() {
            const patientId = document.getElementById('patient').value;
            document.getElementById('input_id_patient').value = patientId;
        });
    });
</script>

@endsection