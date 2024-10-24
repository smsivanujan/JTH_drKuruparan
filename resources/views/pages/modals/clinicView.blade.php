<div class="modal fade" id="modal2_">
    <div class="modal-dialog modal-lg modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Patient's Clinical View xxxxxx</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="card-body">
                    <!-- The fetched data will be inserted here by the JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

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
                                <td>${item.PGHx_duration}</td>
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
</script>