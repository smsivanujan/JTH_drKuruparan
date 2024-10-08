<!-- <h6 class="mb-0">Vital Monitoring</h6>/ -->
<div>
    <div class="my-3">
        <div>
            <!-- Vital Monitoring -->
            <div class="row">
                <!-- Blood Pressure -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="blood-pressure">Blood Pressure</label>
                    <div class="row">
                        <!-- Systolic -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vm_systolic-input">Systolic</label>
                            <div class="input-group">
                                <input type="number" name="vm_systolic" id="vm_systolic-input" class="form-control" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                        <!-- Diastolic -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vm_diastolic-input">Diastolic</label>
                            <div class="input-group">
                                <input type="number" name="vm_diastolic" id="vm_diastolic-input" class="form-control" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pulse Rate -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="cvs-pressure">CVS</label>
                    <label class="form-label" for="vm_pulse-rate">Pulse Rate</label>
                    <div class="input-group">
                        <input type="number" name="vm_pulse_rate" id="vm_pulse-rate" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">bpm</span>
                        </div>
                    </div>
                </div>
                <!-- Temperature -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="basic">Basic</label>
                    <label class="form-label" for="vm_temperature">Temperature</label>
                    <div class="input-group">
                        <input type="number" name="vm_temperature" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">°C</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Postpartum Remarks -->
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="postpartum_remarks-label">Postpartum Remarks</label>
                </div>
                <div class="row">
                    <!-- PPH -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="pph-dropdown">PPH</label>
                        <select name="pph" class="form-control form-select" id="pph-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+">- </option>
                            <option value="-">+</option>>
                        </select>
                    </div>
                    <!-- HTN -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="htn-dropdown">HTN</label>
                        <select name="htn" class="form-control form-select" id="htn-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+">- </option>
                            <option value="-">+</option>>
                        </select>
                    </div>
                    <!-- PP.Psychosis/Depressional -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="pp_psychosis_depressional-dropdown">PP.Psychosis/Depressional</label>
                        <select name="pp_psychosis_depressional" class="form-control form-select" id="pp_psychosis_depressional-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+">- </option>
                            <option value="-">+</option>>
                        </select>
                    </div>
                    <!-- PP.Sepsis -->
                    <div class="form-group col-md-1">
                        <label class="form-label" for="pp_sepsis-dropdown">PP.Sepsis</label>
                        <select name="pp_sepsis" class="form-control form-select" id="pp_sepsis-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+">- </option>
                            <option value="-">+</option>>
                        </select>
                    </div>
                    <!-- DVT -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="dvt-dropdown">DVT</label>
                        <select name="dvt" class="form-control form-select" id="dvt-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+">- </option>
                            <option value="-">+</option>>
                        </select>
                    </div>
                    <!-- ICU Admission -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="icu_admission-dropdown">ICU Admission</label>
                        <select name="icu_admission" class="form-control form-select" id="icu_admission-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+">- </option>
                            <option value="-">+</option>>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const massCheckbox = document.getElementById('mass-checkbox');
        const massSection = document.getElementById('mass-section');

        massCheckbox.addEventListener('change', function() {
            if (massCheckbox.checked) {
                massSection.style.display = 'block';
            } else {
                massSection.style.display = 'none';
            }
        });
    });
</script> -->