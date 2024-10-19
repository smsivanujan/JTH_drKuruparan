<!-- <h6 class="mb-0">Vital Monitoring</h6>/ -->
<div>
    <div class="my-3">
        <div>
            <!-- Vital Monitoring -->
            <div class="row">
                <!-- Blood Pressure -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="blood-pressure">Blood Pressure</label>
                    <div class="row">
                        <!-- Systolic -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vm_systolic-input">Systolic</label>
                            <div class="input-group">
                                <input type="number" step="any" name="vm_systolic" id="vm_systolic-input" class="form-control" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                        <!-- Diastolic -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vm_diastolic-input">Diastolic</label>
                            <div class="input-group">
                                <input type="number" step="any" name="vm_diastolic" id="vm_diastolic-input" class="form-control" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pulse Rate -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="cvs-pressure">CVS</label>
                    <label class="form-label" for="vm_pulse-rate">Pulse Rate</label>
                    <div class="input-group">
                        <input type="number" step="any" name="vm_pulse_rate" id="vm_pulse-rate" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">bpm</span>
                        </div>
                    </div>
                </div>
                <!-- Temperature -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="basic">Basic</label>
                    <label class="form-label" for="vm_temperature">Temperature</label>
                    <div class="input-group">
                        <input type="number" step="any" name="vm_temperature" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">°C</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Postpartum Remarks -->
            <div class="row">
                <label class="form-label" for="postpartum_remarks-label">Postpartum Remarks</label>
                <!-- PPH -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="pph-dropdown">PPH</label>
                    <select name="pph" class="form-control form-select" id="pph-dropdown" data-bs-placeholder="">
                        <option label="Choose" disabled selected></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
                <!-- HTN -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="htn-dropdown">HTN</label>
                    <select name="htn" class="form-control form-select" id="htn-dropdown" data-bs-placeholder="">
                        <option label="Choose" disabled selected></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
                <!-- PP.Psychosis/Depressional -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="pp_psychosis_depressional-dropdown">PP.Psychosis/Depressional</label>
                    <select name="pp_psychosis_depressional" class="form-control form-select" id="pp_psychosis_depressional-dropdown" data-bs-placeholder="">
                        <option label="Choose" disabled selected></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
                <!-- PP.Sepsis -->
                <div class="form-group col-md-1">
                    <label class="form-label" for="pp_sepsis-dropdown">PP.Sepsis</label>
                    <select name="pp_sepsis" class="form-control form-select" id="pp_sepsis-dropdown" data-bs-placeholder="">
                        <option label="Choose" disabled selected></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
                <!-- DVT -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="dvt-dropdown">DVT</label>
                    <select name="dvt" class="form-control form-select" id="dvt-dropdown" data-bs-placeholder="">
                        <option label="Choose" disabled selected></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
                <!-- ICU Admission -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="icu_admission-dropdown">ICU Admission</label>
                    <select name="icu_admission" class="form-control form-select" id="icu_admission-dropdown" data-bs-placeholder="">
                        <option label="Choose" disabled selected></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                </div>
            </div>
            <!-- Dynamic Fields -->
            <div class="row" style="flex: 1 1 auto;">
                <!-- PPH I -->
                <div class="form-group col-md-6" id="pph-section" style="display: none;">
                    <label class="form-label" for="pph_i">PPH Text</label>
                    <div class="input-group">
                        <span class="input-group-text">I<sup>0</sup></span>
                        <input type="text" name="pph_i" id="pph_i" class="form-control" placeholder="">
                    </div>
                </div>

                <!-- HTN I -->
                <div class="form-group col-md-6" id="htn-section" style="display: none;">
                    <label class="form-label" for="htn_i">HTN Text</label>
                    <div class="input-group">
                        <span class="input-group-text">I<sup>0</sup></span>
                        <input type="text" name="htn_i" id="htn_i" class="form-control" placeholder="">
                    </div>
                </div>

                <!-- PP.Psychosis/Depressional I -->
                <div class="form-group col-md-6" id="pp_psychosis_depressional-section" style="display: none;">
                    <label class="form-label" for="pp_psychosis_depressional_i">PP.Psychosis/Depressional Text</label>
                    <div class="input-group">
                        <span class="input-group-text">I<sup>0</sup></span>
                        <input type="text" name="pp_psychosis_depressional_i" id="pp_psychosis_depressional_i" class="form-control" placeholder="">
                    </div>
                </div>

                <!-- PP.Sepsis I -->
                <div class="form-group col-md-6" id="pp_sepsis-section" style="display: none;">
                    <label class="form-label" for="pp_sepsis_i">PP.Sepsis Text</label>
                    <div class="input-group">
                        <span class="input-group-text">I<sup>0</sup></span>
                        <input type="text" name="pp_sepsis_i" id="pp_sepsis_i" class="form-control" placeholder="">
                    </div>
                </div>

                <!-- DVT I -->
                <div class="form-group col-md-6" id="dvt-section" style="display: none;">
                    <label class="form-label" for="dvt_i">DVT Text</label>
                    <div class="input-group">
                        <span class="input-group-text">I<sup>0</sup></span>
                        <input type="text" name="dvt_i" id="dvt_i" class="form-control" placeholder="">
                    </div>
                </div>

                <!-- ICU Admission I -->
                <div class="form-group col-md-6" id="icu_admission-section" style="display: none;">
                    <label class="form-label" for="icu_admission_i">ICU Admission Text</label>
                    <div class="input-group">
                        <span class="input-group-text">I<sup>0</sup></span>
                        <input type="text" name="icu_admission_i" id="icu_admission_i" class="form-control" placeholder="">
                    </div>
                    <label class="form-label" for="icu_admission_mx">ICU Admission MX</label>
                    <div class="input-group">
                        <span class="input-group-text">MX</span>
                        <input type="text" name="icu_admission_mx" id="icu_admission_mx" class="form-control" placeholder="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pphDropdown = document.getElementById('pph-dropdown');
        const htnDropdown = document.getElementById('htn-dropdown');
        const ppPsychosisDepressionalDropdown = document.getElementById('pp_psychosis_depressional-dropdown');
        const ppSepsisDropdown = document.getElementById('pp_sepsis-dropdown');
        const dvtDropdown = document.getElementById('dvt-dropdown');
        const icuAdmissionDropdown = document.getElementById('icu_admission-dropdown');

        const pphSection = document.getElementById('pph-section');
        const htnSection = document.getElementById('htn-section');
        const ppPsychosisDepressionalSection = document.getElementById('pp_psychosis_depressional-section');
        const ppSepsisSection = document.getElementById('pp_sepsis-section');
        const dvtSection = document.getElementById('dvt-section');
        const icuAdmissionSection = document.getElementById('icu_admission-section');

        pphDropdown.addEventListener('change', function() {
            pphSection.style.display = pphDropdown.value === '+' ? 'block' : 'none';
        });

        htnDropdown.addEventListener('change', function() {
            htnSection.style.display = htnDropdown.value === '+' ? 'block' : 'none';
        });

        ppPsychosisDepressionalDropdown.addEventListener('change', function() {
            ppPsychosisDepressionalSection.style.display = ppPsychosisDepressionalDropdown.value === '+' ? 'block' : 'none';
        });

        ppSepsisDropdown.addEventListener('change', function() {
            ppSepsisSection.style.display = ppSepsisDropdown.value === '+' ? 'block' : 'none';
        });

        dvtDropdown.addEventListener('change', function() {
            dvtSection.style.display = dvtDropdown.value === '+' ? 'block' : 'none';
        });

        icuAdmissionDropdown.addEventListener('change', function() {
            icuAdmissionSection.style.display = icuAdmissionDropdown.value === '+' ? 'block' : 'none';
        });
    });
</script>