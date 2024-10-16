<div class="modal fade" id="modalClinic_2_">
    <div class="modal-dialog modal-xl modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal">Patient's Clinical Record</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Personal Info Table -->
            <div class="row mb-3 bg-info p-3">
                <h3 class="card-title text-center">Personal Information</h3>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><strong>PHN:</strong><br><input type="text" class="form-control" id="patient" name="patient" readonly></td>
                            <td><strong>BHT:</strong><br><input type="text" class="form-control" id="BHTClinicFileNo" readonly></td>
                            <td><strong>Full Name:</strong><br><input type="text" class="form-control" id="full_name" readonly></td>
                        </tr>
                        <tr>

                            <td><strong>Ward:</strong><br><input type="text" class="form-control" id="ward" readonly></td>
                            <td><strong>Gender:</strong><br><input type="text" class="form-control" id="gender" readonly></td>
                            <td><strong>Age:</strong><br><input type="text" class="form-control" id="age" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-body text-start">
                <div class="card-body">
                    <!-- Forms -->
                    <div id="card_Form" style="display: flex;">
                        <!-- Navigation Column -->
                        <div class="form_fields" style="display: none;">
                            <div style="width: 150px; background-color: #f8f9fa; padding: 10px; border-radius: 7px; margin-top: 100px;">
                                <ul class="nav1 nav-column flex-column br-7" style="list-style-type: none; padding: 0;">
                                    <!-- Presenting Complaint -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page1" onclick="showPage(1)" style="text-decoration: none; color: #4CAF50; font-weight: bold;">Presenting Complaint</a>
                                    </li>
                                    <!-- Current Pregnancy Hx -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page2" onclick="showPage(2)" style="text-decoration: none; color: black;">Current Pregnancy Hx</a>
                                    </li>
                                    <!-- Past Obstetric Hx -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page3" onclick="showPage(3)" style="text-decoration: none; color: black;">Past Obstetric Hx</a>
                                    </li>
                                    <!-- Past Gyn Hx -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page4" onclick="showPage(4)" style="text-decoration: none; color: black;">Past Gyn Hx</a>
                                    </li>
                                    <!-- Past Med Hx -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page5" onclick="showPage(5)" style="text-decoration: none; color: black;">Past Med Hx</a>
                                    </li>
                                    <!-- Allergic Hx -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page6" onclick="showPage(6)" style="text-decoration: none; color: black;">Allergic Hx</a>
                                    </li>
                                    <!-- Family HX -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page7" onclick="showPage(7)" style="text-decoration: none; color: black;">Family HX</a>
                                    </li>
                                    <!-- Social HX -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page8" onclick="showPage(8)" style="text-decoration: none; color: black;">Social HX</a>
                                    </li>
                                    <!-- Other HX -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page9" onclick="showPage(9)" style="text-decoration: none; color: black;">Other HX</a>
                                    </li>
                                    <!-- Gyn Examination -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page10" onclick="showPage(10)" style="text-decoration: none; color: black;">Gyn Examination</a>
                                    </li>
                                    <!-- Obs Examination -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page11" onclick="showPage(11)" style="text-decoration: none; color: black;">Obs Examination</a>
                                    </li>
                                    <!-- Investigation -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page12" onclick="showPage(12)" style="text-decoration: none; color: black;">Investigation</a>
                                    </li>
                                    <!-- Management -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page13" onclick="showPage(13)" style="text-decoration: none; color: black;">Management</a>
                                    </li>
                                    <!-- Vital Monitoring -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page14" onclick="showPage(14)" style="text-decoration: none; color: black;">Vital Monitoring</a>
                                    </li>
                                    <!-- New Born Status -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page15" onclick="showPage(15)" style="text-decoration: none; color: black;">New Born Status</a>
                                    </li>
                                    <!-- Summery -->
                                    <li class="nav-item1" style="margin-bottom: 10px;">
                                        <a class="nav-link thumb text-dark-light active" href="#page16" onclick="showPage(16)" style="text-decoration: none; color: black;">Summery</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Form Content -->
                        <div style="flex-grow: 1; padding: 20px;">
                            <form id="form" action="{{ route('pregnanacy.store') }}" method="POST">
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
                                <div class="form_fields" style="display: none;">
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

                                    <!-- Family HX -->
                                    <div id="page7" class="form-page" style="display: none;">
                                        <h2>Family HX</h2>
                                        <div style="padding: 15px; background-color: #d9edf7;">
                                            @include('pages.fields.family_hx')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(6)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(8)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Social HX -->
                                    <div id="page8" class="form-page" style="display: none;">
                                        <h2>Social HX</h2>
                                        <div style="padding: 15px; background-color: #d9edf7;">
                                            @include('pages.fields.social_hx')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(7)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(9)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Other HX -->
                                    <div id="page9" class="form-page" style="display: none;">
                                        <h2>Other HX</h2>
                                        <div style="padding: 15px; background-color: #d9edf7;">
                                            @include('pages.fields.other_hx')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(8)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(10)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Gyn Examination -->
                                    <div id="page10" class="form-page" style="display: none;">
                                        <h2>Gyn Examination</h2>
                                        <div style="padding: 15px; background-color: #f5f5f5;">
                                            @include('pages.fields.gyn_examination')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(9)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(11)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Obs Examination -->
                                    <div id="page11" class="form-page" style="display: none;">
                                        <h2>Obs Examination</h2>
                                        <div style="padding: 15px; background-color: #d9edf7;">
                                            @include('pages.fields.obs_examination')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(10)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(12)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Investigation -->
                                    <div id="page12" class="form-page" style="display: none;">
                                        <h2>Investigation</h2>
                                        <div style="padding: 15px; background-color: #f5f5f5;">
                                            @include('pages.fields.investigation')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(11)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(13)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Management -->
                                    <div id="page13" class="form-page" style="display: none;">
                                        <h2>Management</h2>
                                        <div style="padding: 15px; background-color: #f5f5f5;">
                                            @include('pages.fields.management')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(12)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(14)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Vital Monitoring -->
                                    <div id="page14" class="form-page" style="display: none;">
                                        <h2>Vital Monitoring</h2>
                                        <div style="padding: 15px; background-color: #f5f5f5;">
                                            @include('pages.fields.vital_monitoring')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(13)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(15)">Next</button>
                                        </div>
                                    </div>

                                    <!-- New Born Status -->
                                    <div id="page15" class="form-page" style="display: none;">
                                        <h2>New Born Status</h2>
                                        <div style="padding: 15px; background-color: #f5f5f5;">
                                            @include('pages.fields.new_born_status')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(14)">Back</button>
                                            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;" onclick="showPage(16)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Summery -->
                                    <div id="page16" class="form-page" style="display: none;">
                                        <h2>Summery</h2>
                                        <div style="padding: 15px; background-color: #f5f5f5;">
                                            @include('pages.fields.summery')
                                        </div>

                                        <div style="padding-top: 10px;">
                                            <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none;" onclick="showPage(15)">Back</button>
                                            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none;">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('category-dropdown').addEventListener('change', function() {
        var selectedValue = this.value;
        var formFields = document.getElementsByClassName('form_fields');

        for (var i = 0; i < formFields.length; i++) {
            formFields[i].style.display = (selectedValue === 'GYN' || selectedValue === 'OBS') ? 'block' : 'none';
        }
    });
</script>