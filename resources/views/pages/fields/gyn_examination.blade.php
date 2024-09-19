<h6 class="mb-0" data-acc-title>Gyn Examination</h6>
<div data-acc-content>
    <div class="my-3">
        <div>

            <!-- General & GYN Thyroid Examination -->
            <div class="row">
                <!-- General -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="general-dropdown">General</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="generalGyn[]" value="Pallor" class="selectgroup-input">
                            <span class="selectgroup-button">Pallor</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="generalGyn[]" value="Oedema" class="selectgroup-input">
                            <span class="selectgroup-button">Oedema</span>
                        </label>
                    </div>
                </div>
                <!-- GYN Thyroid Examination -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="gyn_thyroid-examination">Thyroid Examination</label>
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
                        <label class="form-label" for="height">Height (cm)</label>
                        <input type="number" name="height" id="height" class="form-control" placeholder="cm" oninput="calculateBMI()">
                    </div>
                    <!-- Weight (kg) -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="weight">Weight (kg)</label>
                        <input type="number" name="weight" id="weight" class="form-control" placeholder="kg" oninput="calculateBMI()">
                    </div>
                    <!-- BMI -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="bmi">BMI</label>
                        <input type="number" name="bmi" id="bmi" class="form-control" step="0.01" placeholder="BMI">
                    </div>
                    <!-- Temperature -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="temperature">Temperature</label>
                        <input type="number" name="temperature" class="form-control" placeholder="Celsius">
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
                        <label class="form-label" for="pulse-rate">Pulse Rate</label>
                        <input type="text" name="pulse_rate" id="pulse-rate" class="form-control" placeholder="Pulse Rate">
                    </div>
                    <!-- Rhythm -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="rhythm-dropdown">Rhythm</label>
                        <select name="rhythm" class="form-control form-select" id="rhythm-dropdown" data-bs-placeholder="Select Rhythm">
                            <option label="Choose one" disabled selected></option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                    <!-- Heart Sound -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="heartsound-dropdown">Heart Sound</label>
                        <select name="heart_sound" class="form-control form-select" id="heartsound-dropdown" data-bs-placeholder="Select Heart Sound">
                            <option label="Choose one" disabled selected></option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                        </select>
                    </div>
                    <!-- Murmur -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="murmur-dropdown">Murmur</label>
                        <select name="murmur" class="form-control form-select" id="murmur-dropdown" data-bs-placeholder="Select Murmur">
                            <option label="Choose one" disabled selected></option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <!-- Blood Pressure -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="blood-pressure">Blood Pressure</label>
                        <div class="row">
                            <!-- Systolic -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="systolic-input">Systolic (mmHg)</label>
                                <input type="number" name="systolic" id="systolic-input" class="form-control" placeholder="mmHg">
                            </div>
                            <!-- Diastolic -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="diastolic-input">Diastolic (mmHg)</label>
                                <input type="number" name="diastolic" id="diastolic-input" class="form-control" placeholder="mmHg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <!-- RS (Respiratory System) -->
            <div class="form-group">
                <label class="form-label" for="breathsound-dropdown">RS (Respiratory System)</label>
                <div class="row">
                    <!-- Breath Sound -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="breathsound-dropdown">Breath Sound</label>
                        <select name="breath_sound" class="form-control form-select" id="breathsound-dropdown" data-bs-placeholder="Select Breath Sound">
                            <option label="Choose one" disabled selected></option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                        </select>
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
                    <!-- InspectionGyn -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="inspectionGyn-dropdown">Inspection</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" id="mass-checkbox" name="inspectionGyn[]" value="Mass" class="selectgroup-input">
                                <span class="selectgroup-button">Mass</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspectionGyn[]" value="Surgical Scar" class="selectgroup-input">
                                <span class="selectgroup-button">Surgical Scar</span>
                            </label>
                        </div>
                    </div>
                    <!-- Palpation -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="palpation-dropdown">Palpation</label>
                        <select name="palpation" class="form-control form-select" id="palpation-dropdown" data-bs-placeholder="Select Palpation">
                            <option label="Choose one" disabled selected></option>
                            <option value="Tenderness (+)">Tenderness (+)</option>
                            <option value="Tenderness (-)">Tenderness (-)</option>
                        </select>
                    </div>
                    <!-- Percussion -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="percussion-dropdown">Percussion</label>
                        <select name="percussion" class="form-control form-select" id="percussion-dropdown" data-bs-placeholder="Select Percussion">
                            <option label="Choose one" disabled selected></option>
                            <option value="Dull">Dull</option>
                            <option value="Resonance">Resonance</option>
                        </select>
                    </div>
                    <!-- Auscultation -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="auscultation-dropdown">Auscultation</label>
                        <select name="auscultation" class="form-control form-select" id="auscultation-dropdown" data-bs-placeholder="Select Auscultation">
                            <option label="Choose one" disabled selected></option>
                            <option value="Bowel Sounds (+)">Bowel Sounds (+)</option>
                            <option value="Bowel Sounds (-)">Bowel Sounds (-)</option>
                        </select>
                    </div>
                </div>

                <!-- Mass -->
                <div id="mass-section" style="display: none;">
                    <label class="form-label" for="palpation-dropdown">Mass</label>
                    <div class="row">
                        <!-- Tenderness -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="tenderness-dropdown">General</label>
                            <select name="tenderness" class="form-control form-select" id="tenderness-dropdown" data-bs-placeholder="Select Tenderness">
                                <option label="Choose one" disabled selected></option>
                                <option value="Tenderness (+)">Palpation (+)</option>
                                <option value="Tenderness (-)">Palpation (-)</option>
                            </select>
                        </div>
                        <!-- Size -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="size-number">Size</label>
                            <input type="number" name="size" class="form-control" id="size-number" placeholder="Size (cm)">
                        </div>
                        <!-- Percussion -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="percussion-dropdown">Percussion</label>
                            <select name="percussion" class="form-control form-select" id="percussion-dropdown" data-bs-placeholder="Select Percussion">
                                <option label="Choose one" disabled selected></option>
                                <option value="Dull">Dull</option>
                                <option value="Resonance">Resonance</option>
                            </select>
                        </div>
                        <!-- Auscultator -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="auscultator-dropdown">Auscultator</label>
                            <select name="auscultator" class="form-control form-select" id="auscultator-dropdown" data-bs-placeholder="Select Auscultator">
                                <option label="Choose one" disabled selected></option>
                                <option value="Palpable (+)">Palpable (+)</option>
                                <option value="Palpable (-)">Palpable (-)</option>
                            </select>
                        </div>
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
                        <select name="inspectionSpeculum" class="form-control form-select" id="inspectionSpeculum-dropdown" data-bs-placeholder="Select Inspection + Speculum">
                            <option label="Choose one" disabled selected></option>
                            <option value="Vulval Area Mass">Vulval Area Mass</option>
                            <option value="Vulval Area Ulcers">Vulval Area Ulcers</option>
                            <option value="Vulval Area Discharge/Blood">Vulval Area Discharge/Blood</option>
                            <option value="Lump At Vulva/Prolapse">Lump At Vulva/Prolapse</option>
                        </select>
                    </div>
                    <!-- Stress Incontinence -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="stressincontinence-dropdown">Stress Incontinence</label>
                        <select name="stress_incontinence" class="form-control form-select" id="stressincontinence-dropdown" data-bs-placeholder="Select Stress Incontinence">
                            <option label="Choose one" disabled selected></option>
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
                    <div class="form-group col-md-3">
                        <label class="form-label" for="cervical-dropdown">Cervical Consistency</label>
                        <select name="cervical" class="form-control form-select" id="cervical-dropdown">
                            <option value="" disabled selected>Select Cervical Consistency</option>
                            <option value="Firm">Firm</option>
                            <option value="Medium">Medium</option>
                            <option value="Soft">Soft</option>
                        </select>
                    </div>
                    <!-- OS -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="os-dropdown">OS</label>
                        <select name="os" class="form-control form-select" id="os-dropdown">
                            <option value="" disabled selected>Select OS</option>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <!-- Polyp/Ulcer -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="polyp-ulcer-dropdown">Polyp/Ulcer</label>
                        <select name="polyp_ulcer" class="form-control form-select" id="polyp-ulcer-dropdown">
                            <option value="" disabled selected>Select Polyp/Ulcer</option>
                            <option value="Normal">Normal</option>
                            <option value="Suspicious">Suspicious</option>
                            <option value="Pathological">Pathological</option>
                        </select>
                    </div>
                    <!-- Cervical Motion Tenderness -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="cervical-motion-tenderness-dropdown">Cervical Motion Tenderness</label>
                        <select name="cervical_motion_tenderness" class="form-control form-select" id="cervical-motion-tenderness-dropdown">
                            <option value="" disabled selected>Select Cervical Motion Tenderness</option>
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
                    <!-- TAS -->
                    <label class="form-label" for="tas-label">TAS</label>
                    <div>
                        <!-- Uterus -->
                        <div class="row">
                            <label class="form-label" for="uterus-tas-label">Uterus</label>
                            <div class="row">
                                <!-- Endometrium -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="endometrium-tas">Endometrium</label>
                                    <input type="text" name="endometrium_tas" id="endometrium-tas" class="form-control" placeholder="Endometrium">
                                </div>
                                <!-- Fiber -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="fiber-tas-dropdown">Fiber</label>
                                    <select name="fiber_tas" class="form-control form-select" id="fiber-tas-dropdown">
                                        <option value="" disabled selected>Choose one</option>
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <!-- Size -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="size-tas">Size</label>
                                    <input type="text" name="size_tas" id="size-tas" class="form-control" placeholder="Size">
                                </div>
                                <!-- Direction -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="direction-tas-dropdown">Direction</label>
                                    <select name="direction_tas" class="form-control form-select" id="direction-tas-dropdown">
                                        <option value="" disabled selected>Choose one</option>
                                        <option value="Anteverted">Anteverted</option>
                                        <option value="Retroverted">Retroverted</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Average -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="average-tas-dropdown">Average</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="polycyshic_tas[]" value="polycyshic" class="selectgroup-input">
                                        <span class="selectgroup-button">Polycyshic</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Adnexial Mass -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="adnexialmass-tas-dropdown">Adnexial Mass</label>
                                <select name="adnexialmass_tas" class="form-control form-select" id="adnexialmass-tas-dropdown">
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="Present in Both">Present in Both</option>
                                    <option value="Present in Right">Present in Right</option>
                                    <option value="Present in Left">Present in Left</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>
                            <!-- Bladder -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="bladder-tas-dropdown">Bladder</label>
                                <select name="bladder_tas" class="form-control form-select" id="bladder-tas-dropdown">
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                            <!-- Free fluid -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="free_fluid-tas-dropdown">Free fluid</label>
                                <select name="free_fluid_tas" class="form-control form-select" id="free_fluid-tas-dropdown">
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="-">-</option>
                                    <option value="+">+</option>
                                    <option value="2+">2+</option>
                                    <option value=">2+">>2+</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- TVS -->
                    <label class="form-label" for="tvs-label">TVS</label>
                    <div>
                        <!-- Uterus -->
                        <div class="row">
                            <label class="form-label" for="uterus-tvs-label">Uterus</label>
                            <div class="row">
                                <!-- Endometrium -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="endometrium-tvs">Endometrium</label>
                                    <input type="text" name="endometrium_tvs" id="endometrium-tvs" class="form-control" placeholder="Endometrium">
                                </div>
                                <!-- Fiber -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="fiber-tvs-dropdown">Fiber</label>
                                    <select name="fiber_tvs" class="form-control form-select" id="fiber-tvs-dropdown">
                                        <option value="" disabled selected>Choose one</option>
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <!-- Size -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="size-tvs">Size</label>
                                    <input type="text" name="size_tvs" id="size-tvs" class="form-control" placeholder="Size">
                                </div>
                                <!-- Direction -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="direction-tvs-dropdown">Direction</label>
                                    <select name="direction_tvs" class="form-control form-select" id="direction-tvs-dropdown">
                                        <option value="" disabled selected>Choose one</option>
                                        <option value="Anteverted">Anteverted</option>
                                        <option value="Retroverted">Retroverted</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- CX -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="cx-dropdown">CX</label>
                                <label class="form-label" for="polyps-tvs-dropdown">Polyps</label>
                                <select name="polyps_tvs" class="form-control form-select" id="polyps-tvs-dropdown">
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                </select>
                            </div>
                            <!-- Echopic -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="echopic-tvs-dropdown">Echopic</label>
                                <select name="echopic_tvs" class="form-control form-select" id="echopic-tvs-dropdown">
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                </select>
                            </div>
                            <!-- Adnexial Mass -->
                            <div class="form-group col-md-3">
                                <label class="form-label" for="adnexialmass-tvs-dropdown">Adnexial Mass</label>
                                <select name="adnexialmass_tvs" class="form-control form-select" id="adnexialmass-tvs-dropdown">
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="Present in Both">Present in Both</option>
                                    <option value="Present in Right">Present in Right</option>
                                    <option value="Present in Left">Present in Left</option>
                                    <option value="Absent">Absent</option>
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
                    <div class="form-group col-md-6">
                        <label class="form-label" for="problist">Problem list</label>
                        <textarea id="problist" name="problist" class="form-control" rows="4" placeholder="Enter Problem List"></textarea>
                    </div>
                    <!-- HXs -->
                    <div class="form-group col-md-6">
                        <div class="row">
                            <!-- Medical MX -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="medicalhx-dropdown">Medical MX</label>
                                <select name="medical_hx" class="form-control form-select" id="medicalhx-dropdown">
                                    <option value="" disabled selected>Select Medical HX</option>
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
                                    <option value="" disabled selected>Select Surgery HX</option>
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
            massSection.style.display = 'block'; // Show the Mass section
        } else {
            massSection.style.display = 'none'; // Hide the Mass section
        }
    });
});

</script>