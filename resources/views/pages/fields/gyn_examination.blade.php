<h6 class="mb-0" data-acc-title>Gyn Examination</h6>
<div data-acc-content>
    <div class="my-3">
        <div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="general-dropdown">General</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="generalGyn[]" value="Pallor" class="selectgroup-input">
                            <span class="selectgroup-button">Pallor</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="generalGyn[]" value="Odema" class="selectgroup-input">
                            <span class="selectgroup-button">Odema</span>
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="thyroidexamination-radio">Thyroid Examination</label>
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

            <div class="row">
                <label class="form-label" for="basic-label">Basic</label>
                <div class="form-group col-md-3">
                    <label class="form-label" for="height">Height (cm)</label>
                    <input type="number" name="height" id="height" class="form-control" placeholder="cm" oninput="calculateBMI()">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="weight">Weight (kg)</label>
                    <input type="number" name="weight" id="weight" class="form-control" placeholder="kg" oninput="calculateBMI()">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="bmi">BMI</label>
                    <input type="number" name="bmi" id="bmi" class="form-control" placeholder="BMI" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="temperature">Temperature</label>
                    <input type="number" name="temperature" class="form-control" placeholder="Celcious">
                </div>
            </div>

            <label class="form-label" for="cvs-label">CVS</label>
            <div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label class="form-label" for="pulserate-text">Pulse Rate</label>
                        <input type="text" name="pulse_rate" id="pulse-rate" class="form-control" placeholder="Pulse Rate">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="rhythm-dropdown">Rhythm</label>
                        <select name="rhythm" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                            <option label="Choose one" disabled selected></option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label" for="bloodpressure-text">Blood Pressure</label>
                        <div class="d-flex align-items-center">
                            <div class="form-group col-md-6 d-flex align-items-center">
                                <label class="form-label" for="systolic-number">Systolic</label>
                                <input type="number" name="systolic" class="form-control" id="systolic-input" placeholder="mmHg">
                            </div>
                            <div class="form-group col-md-6 d-flex align-items-center">
                                <label class="form-label" for="diastolic-number">Diastolic</label>
                                <input type="number" name="diastolic" class="form-control" id="diastolic-input" placeholder="mmHg">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="heartsound-dropdown">Heart Sound</label>
                        <select name="heart_sound" class="form-control form-select" id="heartsound-dropdown" data-bs-placeholder="Select Heart Sound">
                            <option label="Choose one" disabled selected></option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="memor-dropdown">Murmur</label>
                        <select name="memor" class="form-control form-select" id="memor-dropdown" data-bs-placeholder="Select Memor">
                            <option label="Choose one" disabled selected></option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                </div>
            </div>

            <label class="form-label" for="rs-label">RS</label>
            <div class="row">
                <div class="form-group col-md-2">
                    <label class="form-label" for="breathsound-dropdown">Breath Sound</label>
                    <select name="breath_sound" class="form-control form-select" id="breathsound-dropdown" data-bs-placeholder="Select Breath Sound">
                        <option label="Choose one" disabled selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="abdexamination-dropdown">ABD Examination</label>
                    <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                        <option label="Choose one" disabled selected></option>
                        <option value="Ins">Ins</option>
                        <option value="Palp">Palp</option>
                        <option value="Per">Per</option>
                        <option value="Ausca">Ausca</option>
                    </select>
                </div>
            </div>


            <label class="form-label" for="pelvicexamination-label">Pelvic Examination</label>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="inspectionSpeculum-dropdown">Inspection + Speculum</label>
                    <select name="inspectionSpeculum" class="form-control form-select" id="inspectionSpeculum-dropdown" data-bs-placeholder="Select inspection + Speculum">
                        <option label="Choose one" disabled selected></option>
                        <option value="Vulval Area Mass">Vulval Area Mass</option>
                        <option value="Vulval Area Ulcers">Vulval Area Ulcers</option>
                        <option value="Vulval Area Discharge/Blood">Vulval Area Discharge/Blood</option>
                        <option value="Lumb At Vulva/Prolapse">Lumb At Vulva/Prolapse</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="stressincontinence-dropdown">Stress Incontinence</label>
                    <select name="stress_incontinence" class="form-control form-select" id="stressincontinence-dropdown" data-bs-placeholder="Select Stress Incontinence">
                        <option label="Choose one" disabled selected></option>
                        <option value="+ (ve)">+ (ve)</option>
                        <option value="- (ve)">- (ve)</option>
                    </select>
                </div>
            </div>

            <label class="form-label" for="bimanualue-label">Bimanual VE</label>
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="cervical-dropdown">Cervical Consistency</label>
                    <select name="cervical" class="form-control form-select" id="cervical-dropdown" data-bs-placeholder="Select Cervical Consistency">
                        <option label="Choose one" disabled selected></option>
                        <option value="Firm">Firm</option>
                        <option value="Medium">Medium</option>
                        <option value="Soft">Soft</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="os-dropdown">OS</label>
                    <select name="os" class="form-control form-select" id="os-dropdown" data-bs-placeholder="Select OS">
                        <option label="Choose one" disabled selected></option>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="polyp/ulcer-dropdown">Polyp/Ulcer</label>
                    <select name="polyp/ulcer" class="form-control form-select" id="polyp/ulcer-dropdown" data-bs-placeholder="Select Polyp/Ulcer">
                        <option label="Choose one" disabled selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Suspizions">Suspizions</option>
                        <option value="Pathological">Pathological</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="cervicalmotiontenderness-dropdown">Cervical Motion Tenderness</label>
                    <select name="cervicalmotiontenderness" class="form-control form-select" id="cervicalmotiontenderness-dropdown" data-bs-placeholder="Select Cervical Motion Tenderness">
                        <option label="Choose one" disabled selected></option>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                    </select>
                </div>
            </div>

            <label class="form-label" for="uterus-label">Uterus</label>
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="direction-dropdown">Direction</label>
                    <select name="direction" class="form-control form-select" id="direction-dropdown" data-bs-placeholder="Select Direction">
                        <option label="Choose one" disabled selected></option>
                        <option value="Anteverted">Anteverted</option>
                        <option value="Retroverted">Retroverted</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="adnexialmass-dropdown">Adnexial Mass</label>
                    <select name="adnexialmass" class="form-control form-select" id="adnexialmass-dropdown" data-bs-placeholder="Select Adnexial Mass">
                        <option label="Choose one" disabled selected></option>
                        <option value="Present in Both">Present in Both</option>
                        <option value="Present in Right">Present in Right</option>
                        <option value="Present in Left">Present in Left</option>
                        <option value="Absent">Absent</option>
                    </select>
                </div>
            </div>

            <label class="form-label" for="scan-label">Scan</label>
            <div class="row">
                <!-- TAS Finder Section -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="tasfinder-label">TAS Finding</label>
                    <label class="form-label" for="tasuterus-text">Uterus</label>
                    <input type="text" name="tas_uterus" id="tas-uterus" class="form-control" placeholder="Uterus">
                </div>

                <!-- TVS Finder Section -->
                <div class="form-group col-md-8">
                    <label class="form-label" for="tvsfinder-label">TVS Finding</label>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label" for="endometrium-text">Endometrium</label>
                            <input type="text" name="endometrium" id="endometrium" class="form-control" placeholder="Endometrium">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="adnexialmass-text">Adnexial Mass</label>
                            <input type="text" name="adnexial_mass_scan" id="adnexial-mass" class="form-control" placeholder="Adnexial Mass">
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="problist-text">Problem list</label>
                    <textarea id="problist" name="problist" class="form-control" rows="4" placeholder="Enter Problist"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="medicalhx-dropdown">Medical MX</label>
                        <select name="medical_hx" class="form-control form-select" id="medicalhx-dropdown" data-bs-placeholder="Select Medical HX">
                            <option label="Choose one" disabled selected></option>
                            <option value="Antibiotics">Antibiotics</option>
                            <option value="Analgesics">Analgesics</option>
                            <option value="Tranexamic acid">Tranexamic acid</option>
                            <option value="Mefenamic acid">Mefenamic acid</option>
                            <option value="Contraception">Contraception</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="surgeryhx-dropdown">Surgery MX</label>
                        <select name="surgery_hx" class="form-control form-select" id="surgeryhx-dropdown" data-bs-placeholder="Select Surgery HX">
                            <option label="Choose one" disabled selected></option>
                            <option value="Open Sx">Open Sx</option>
                            <option value="Lapcroscope Sx">Lapcroscope Sx</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>