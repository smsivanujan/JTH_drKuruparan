<!-- <h6 class="mb-0">Gyn Examination</h6>/ -->
<div>
    <div class="my-3">
        <div>
            <!-- General & GYN Thyroid Examination -->
            <div class="row">
                <!-- General -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="gyn_general-dropdown">General</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="gyn_general[]" value="Pallor" class="selectgroup-input">
                            <span class="selectgroup-button">Pallor</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="gyn_general[]" value="Oedema" class="selectgroup-input">
                            <span class="selectgroup-button">Oedema</span>
                        </label>
                    </div>
                </div>
                <!-- GYN Thyroid Examination -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="gyn_thyroidexamination">Thyroid Examination</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked4">
                            <input name="rdio-primary4" type="radio" id="rdio-primary-unchecked4" value="Enlarged" style="margin-right: 5px;">
                            <span>Enlarged</span>
                        </label>
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary4">
                            <input name="rdio-primary4" type="radio" id="rdio-primary4" value="Not Enlarged" style="margin-right: 5px;">
                            <span>Not Enlarged</span>
                        </label>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Basic -->
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="basic-label">Basic</label>
                </div>
                <div class="row">
                    <!-- Height (cm) -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="height">Height</label>
                        <div class="input-group">
                            <input type="number" step="any" name="height" id="height" class="form-control" placeholder="" oninput="calculateBMI()">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                    <!-- Weight (kg) -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="weight">Weight</label>
                        <div class="input-group">
                            <input type="number" step="any" name="weight" id="weight" class="form-control" placeholder="" oninput="calculateBMI()">
                            <div class="input-group-append">
                                <span class="input-group-text">kg</span>
                            </div>
                        </div>
                    </div>
                    <!-- BMI -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="bmi">BMI</label>
                        <input type="number" step="any" name="bmi" id="bmi" class="form-control" step="0.01" placeholder="">
                    </div>
                    <!-- Temperature -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="gyn_temperature">Temperature</label>
                        <div class="input-group">
                            <input type="number" step="any" name="gyn_temperature" class="form-control" placeholder="">
                            <div class="input-group-append">
                                <span class="input-group-text">°C</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <!-- CVS -->
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="cvs-label">CVS</label>
                </div>
                <div class="row">
                    <!-- Pulse Rate -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="gyn_pulse-rate">Pulse Rate</label>
                        <div class="input-group">
                            <input type="text" name="gyn_pulse_rate" id="gyn_pulse-rate" class="form-control" placeholder="">
                            <div class="input-group-append">
                                <span class="input-group-text">bpm</span>
                            </div>
                        </div>
                    </div>
                    <!-- Rhythm -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="rhythm-dropdown">Rhythm</label>
                        <select name="rhythm" class="form-control form-select" id="rhythm-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                    <!-- Heart Sound -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="heartsound-dropdown">Heart Sound</label>
                        <select name="heart_sound" class="form-control form-select" id="heartsound-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                        </select>
                    </div>
                    <!-- Murmur -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="murmur-dropdown">Murmur</label>
                        <select name="murmur" class="form-control form-select" id="murmur-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <!-- Blood Pressure -->
                    <div class="form-group col-md-8">
                        <label class="form-label" for="blood-pressure">Blood Pressure</label>
                        <div class="row">
                            <!-- GYN Systolic -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="gyn_systolic-input">Systolic</label>
                                <div class="input-group">
                                    <input type="number" step="any" name="gyn_systolic" id="gyn_systolic-input" class="form-control" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-text">mmHg</span>
                                    </div>
                                </div>
                            </div>
                            <!-- GYN Diastolic -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="gyn_diastolic-input">Diastolic</label>
                                <div class="input-group">
                                    <input type="number" step="any" name="gyn_diastolic" id="gyn_diastolic-input" class="form-control" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-text">mmHg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RS (Respiratory System) -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="breathsound-dropdown">Respiratory System</label>
                        <div class="row">
                            <!-- Breath Sound -->
                            <div class="form-group col-md-12">
                                <label class="form-label" for="breathsound-dropdown">Breath Sound</label>
                                <select name="breath_sound" class="form-control form-select" id="breathsound-dropdown" data-bs-placeholder="">
                                    <option label="Choose" disabled selected></option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Abdominal Examination -->
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="abdominalexamination-label">Abdominal Examination</label>
                </div>
                <div class="row">
                    <!-- GYN Inspection -->
                    <div class="form-group col-md-12">
                        <label class="form-label" for="gyn_inspection-dropdown">Inspection</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" id="mass-checkbox" name="gyn_inspection[]" value="Mass" class="selectgroup-input">
                                <span class="selectgroup-button">Mass</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="gyn_inspection[]" value="Surgical Scar" class="selectgroup-input">
                                <span class="selectgroup-button">Surgical Scar</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="gyn_inspection[]" value="Distended" class="selectgroup-input">
                                <span class="selectgroup-button">Distended</span>
                            </label>
                        </div>
                    </div>
                    <!-- Mass (Choosable) -->
                    <div id="mass-section" style="display: none;">
                        <label class="form-label" for="palpation-dropdown">Mass</label>
                        <div class="row">
                            <!-- Site Mass -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="site-dropdown">Site</label>
                                <select name="site_mass" class="form-control form-select" id="site-dropdown" data-bs-placeholder="">
                                    <option label="Choose" disabled selected></option>
                                    <option value="RHC">RHC </option>
                                    <option value="Epigastric">Epigastric</option>
                                    <option value="LHC">LHC</option>
                                    <option value="RL">RL</option>
                                    <option value="Umblical">Umblical</option>
                                    <option value="LL">LL</option>
                                    <option value="RIF">RIF</option>
                                    <option value="Superpubic">Supra pubic</option>
                                    <option value="LIF">LIF</option>
                                </select>
                            </div>
                            <!-- Size Mass -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="size-number">Size(POA)</label>
                                <div class="input-group">
                                    <input type="number" step="any" name="size_mass" class="form-control" id="size-number" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Weeks</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Percussion Mass -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="percussion-dropdown">Percussion</label>
                                <select name="percussion_mass" class="form-control form-select" id="percussion-dropdown" data-bs-placeholder="">
                                    <option label="Choose" disabled selected></option>
                                    <option value="Dull">Dull</option>
                                    <option value="Resonance">Resonance</option>
                                </select>
                            </div>
                            <!-- Auscultation Mass -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="auscultation-dropdown">Auscultation</label>
                                <select name="auscultation_mass" class="form-control form-select" id="auscultator-dropdown-dropdown" data-bs-placeholder="">
                                    <option label="Choose" disabled selected></option>
                                    <option value="Bruit (+)">Bruit (+)</option>
                                    <option value="Bruit (-)">Bruit (-)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Palpation -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="palpation-dropdown">Palpation</label>
                        <select name="palpation" class="form-control form-select" id="palpation-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="Tenderness (+)">Tenderness (+)</option>
                            <option value="Tenderness (-)">Tenderness (-)</option>
                        </select>
                    </div>
                    <!-- Percussion -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="percussion-dropdown">Percussion</label>
                        <select name="percussion" class="form-control form-select" id="percussion-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="Dull">Dull</option>
                            <option value="Resonance">Resonance</option>
                        </select>
                    </div>
                    <!-- Auscultation -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="auscultation-dropdown">Auscultation</label>
                        <select name="auscultation" class="form-control form-select" id="auscultation-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="Bowel Sounds (+)">Bowel Sounds (+)</option>
                            <option value="Bowel Sounds (-)">Bowel Sounds (-)</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Pelvic Examination -->
            <div class="form-group">
                <label class="form-label" for="pelvicexamination-label">Pelvic Examination</label>
                <div class="row">
                    <!-- Inspection + Speculum -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="inspectionSpeculum-dropdown">Inspection + Speculum</label>
                        <select name="inspectionSpeculum[]" id="inspectionSpeculum-dropdown" class="form-control select2-style1" data-placeholder="" multiple>
                            <option label="Choose one" disabled></option>
                            <option value="Vulval Area Mass">Vulval Area Mass</option>
                            <option value="Vulval Area Ulcers">Vulval Area Ulcers</option>
                            <option value="Vulval Area Discharge/Blood">Vulval Area Discharge/Blood</option>
                            <option value="Lump At Vulva/Prolapse">Lump At Vulva/Prolapse</option>
                            <option value="OS Open">OS Open</option>
                            <option value="OS Close">OS Close</option>
                            <option value="OS Product +">OS Product +</option>
                            <option value="Active Bleeding +">Active Bleeding +</option>
                            <option value="Discharge +">Discharge +</option>
                        </select>
                    </div>
                    <!-- Stress Incontinence -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="stressincontinence-dropdown">Stress Incontinence</label>
                        <select name="stress_incontinence" class="form-control form-select" id="stressincontinence-dropdown" data-bs-placeholder="">
                            <option label="Choose" disabled selected></option>
                            <option value="+ (ve)">+ (ve)</option>
                            <option value="- (ve)">- (ve)</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Bimanual VE -->
            <div class="form-group">
                <label class="form-label" for="bimanualue-label">Bimanual VE</label>
                <div class="row">
                    <!-- Cervical Consistency -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="cervical_consistency-dropdown">Cervical Consistency</label>
                        <select name="cervical_consistency" class="form-control form-select" id="cervical_consistency-dropdown">
                            <option value="" disabled selected>Choose</option>
                            <option value="Firm">Firm</option>
                            <option value="Medium">Medium</option>
                            <option value="Soft">Soft</option>
                        </select>
                    </div>
                    <!-- OS -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="os-dropdown">OS</label>
                        <select name="os" class="form-control form-select" id="os-dropdown">
                            <option value="" disabled selected>Choose OS</option>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- Polyp/Ulcer -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="polyp-ulcer-dropdown">Polyp/Ulcer</label>
                        <select name="polyp_ulcer" class="form-control form-select" id="polyp-ulcer-dropdown">
                            <option value="" disabled selected>Choose</option>
                            <option value="Normal">Normal</option>
                            <option value="Suspicious">Suspicious</option>
                            <option value="Pathological">Pathological</option>
                        </select>
                    </div>
                    <!-- Cervical Motion Tenderness -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="cervical-motion-tenderness-dropdown">Cervical Motion Tenderness</label>
                        <select name="cervical_motion_tenderness" class="form-control form-select" id="cervical-motion-tenderness-dropdown">
                            <option value="" disabled selected>Choose</option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Scan -->
            <div class="form-group">
                <label class="form-label" for="scan-label">Scan</label>
                <div>
                    <!-- TAS/TVS -->
                    <label class="form-label" for="tas-label">TAS/TVS</label>
                    <div>
                        <!-- Uterus -->
                        <div class="row">
                            <label class="form-label" for="uterus-tas-label">Uterus</label>
                            <div class="row">
                                <!-- Endometrium-TAS -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="endometrium">Endometrial (Thickness)</label>
                                    <div class="input-group">
                                        <input type="number" step="any" name="endometrium" id="endometrium" class="form-control" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">mm</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fibroid -->
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="fibroid-dropdown">Fibroid</label>
                                    <select name="fibroid" class="form-control form-select" id="fibroid-dropdown">
                                        <option value="" disabled selected>Choose</option>
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <!-- Size -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="size">Size</label>
                                    <div class="input-group">
                                        <input type="text" name="size" id="size" class="form-control" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Direction -->
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="direction-dropdown">Direction</label>
                                    <select name="direction" class="form-control form-select" id="direction-dropdown">
                                        <option value="" disabled selected>Choose</option>
                                        <option value="Anteverted">Anteverted</option>
                                        <option value="Retroverted">Retroverted</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Ovary -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="ovary-dropdown">Ovary</label>
                                <select name="ovary" class="form-control form-select" id="fiber-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Cyst">Cyst</option>
                                    <option value="Polycystic">Polycystic</option>
                                </select>
                            </div>
                            <!-- Adnexial Mass -->
                            <div class="form-group col-md-4">
                                <label class="form-label" for="adnexialmass-dropdown">Adnexial Mass</label>
                                <select name="adnexialmass" class="form-control form-select" id="adnexialmass-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="Present in Both">Present in Both</option>
                                    <option value="Present in Right">Present in Right</option>
                                    <option value="Present in Left">Present in Left</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>
                            <!-- Bladder -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="bladder-dropdown">Bladder</label>
                                <select name="bladder" class="form-control form-select" id="bladder-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                            <!-- Free fluid -->
                            <div class="form-group col-md-2">
                                <label class="form-label" for="free_fluid-dropdown">Free fluid</label>
                                <select name="free_fluid" class="form-control form-select" id="free_fluid-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="-">-</option>
                                    <option value="+">+</option>
                                    <option value="2+">2+</option>
                                    <option value=">2+">>2+</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Cavity -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="cavity-tas">Cavity</label>
                                <div class="input-group">
                                    <input type="text" name="cavity" id="cavity" class="form-control" placeholder="">
                                </div>
                            </div>
                            <!-- Polyps -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="polyps-dropdown">Polyps</label>
                                <select name="polyps" class="form-control form-select" id="polyps-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                </select>
                            </div>
                            <!-- Ectopic -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="ectopic-dropdown">Ectopic</label>
                                <select name="ectopic" class="form-control form-select" id="ectopic-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <hr>

            <!-- Others -->
            <div class="form-group">
                <label class="form-label" for="others-label">Others</label>
                <div class="row">
                    <!-- Problem list -->
                    <div class="form-group col-md-12">
                        <label class="form-label" for="problist">Problem list</label>
                        <textarea id="problist" name="problist" class="form-control" rows="4" placeholder=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- HXs -->
                    <div class="form-group col-md-12">
                        <div class="row">
                            <!-- Medical MX -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="medicalhx-dropdown">Medical MX</label>
                                <select name="medical_hx" class="form-control form-select" id="medicalhx-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="Antibiotics">Antibiotics</option>
                                    <option value="Analgesics">Analgesics</option>
                                    <option value="Tranexamic acid">Tranexamic acid</option>
                                    <option value="Mefenamic acid">Mefenamic acid</option>
                                    <option value="Contraception">Contraception</option>
                                </select>
                            </div>
                            <!-- Surgery MX -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="surgeryhx-dropdown">Surgery MX</label>
                                <select name="surgery_hx" class="form-control form-select" id="surgeryhx-dropdown">
                                    <option value="" disabled selected>Choose</option>
                                    <option value="Open Surgery">Open Surgery</option>
                                    <option value="Laparoscopic Surgery">Laparoscopic Surgery</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- BMI -->
<script>
    function calculateBMI() {
        const heightInput = document.getElementById('height').value;
        const weightInput = document.getElementById('weight').value;

        if (heightInput && weightInput) {
            const heightInMeters = heightInput / 100;
            const bmi = (weightInput / (heightInMeters * heightInMeters)).toFixed(2);
            document.getElementById('bmi').value = bmi;
        } else {
            document.getElementById('bmi').value = '';
        }
    }
</script>

<script>
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
</script>