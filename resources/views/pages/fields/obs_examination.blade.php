<!-- <h6 class="mb-0">Obs Examination</h6> -->
<div class="my-3">
    <div>
        <div class="row">
            <!-- General -->
            <div class="form-group col-md-4">
                <label class="form-label" for="obs_general-checkbox">General</label>
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <input type="checkbox" name="obs_general[]" value="Pallor" class="selectgroup-input">
                        <span class="selectgroup-button">Pallor</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="checkbox" name="obs_general[]" value="Odema" class="selectgroup-input">
                        <span class="selectgroup-button">Odema</span>
                    </label>
                </div>
            </div>
            <!-- Blood Pressure -->
            <div class="form-group col-md-4">
                <label class="form-label" for="blood-pressure">Blood Pressure</label>
                <div class="row">
                    <!-- OBS Systolic -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="obs_systolic-input">Systolic</label>
                        <div class="input-group">
                            <input type="number" name="obs_systolic" id="obs_systolic-input" class="form-control" placeholder="">
                            <div class="input-group-append">
                                <span class="input-group-text">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <!-- OBS Diastolic -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="obs_diastolic-input">Diastolic</label>
                        <div class="input-group">
                            <input type="number" name="obs_diastolic" id="obs_diastolic-input" class="form-control" placeholder="">
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
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="obs_pulse-rate">Pulse Rate</label>
                        <div class="input-group">
                            <input type="text" name="obs_pulse_rate" id="obs_pulse-rate" class="form-control" placeholder="">
                            <div class="input-group-append">
                                <span class="input-group-text">bpm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- OBS Thyroid Examination -->
            <div class="form-group col-md-6">
                <label class="form-label" for="obs_thyroidexamination-radio">Thyroid Examination</label>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked5">
                        <input name="rdio-primary5" type="radio" id="rdio-primary-unchecked5" value="Enlarged" style="margin-right: 5px;">
                        <span>Enlarged</span>
                    </label>
                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary5">
                        <input name="rdio-primary5" type="radio" id="rdio-primary5" value="Not Enlarged" style="margin-right: 5px;">
                        <span>Not Enlarged</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Abdominal Examination -->
        <label class="form-label" for="abdominalexamination-label">Abdominal Examination</label>
        <div>
            <div class="row">
                <!-- OBS inspections -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="obs_inspection-dropdown">Inspection OBS</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" id="mass-checkbox" name="obs_inspection[]" value="Linea nigra" class="selectgroup-input">
                            <span class="selectgroup-button">Linea nigra</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="obs_inspection[]" value="Striae" class="selectgroup-input">
                            <span class="selectgroup-button">Striae</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="obs_inspection[]" value="Flat Umblicus" class="selectgroup-input">
                            <span class="selectgroup-button">Flat Umblicus</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="obs_inspection[]" value="Surgical Scar" class="selectgroup-input">
                            <span class="selectgroup-button">Surgical Scar</span>
                        </label>
                    </div>
                </div>
                <!-- SFH (cm) -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="sfh-number">SFH</label>
                    <div class="input-group">
                        <input type="number" name="sfh" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                </div>
                <!-- Lie -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="lie-dropdown">Lie</label>
                    <select name="lie" class="form-control form-select" id="lie-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Longitudinal">Longitudinal</option>
                        <option value="Transverse">Transverse</option>
                        <option value="Oblique">Oblique</option>
                    </select>
                </div>
                <!-- Position -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="position-dropdown">Position</label>
                    <select name="position" class="form-control form-select" id="position-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="LOA">LOA</option>
                        <option value="LOP">LOP</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- Engagement -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="engagement-radio">Engagement</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked6">
                            <input name="rdio-primary6" type="radio" id="rdio-primary-unchecked6" value="Engaged" style="margin-right: 5px;">
                            <span>Engaged</span>
                        </label>
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary6">
                            <input name="rdio-primary6" type="radio" id="rdio-primary6" value="Not Engaged" style="margin-right: 5px;">
                            <span>Not Engaged</span>
                        </label>
                    </div>
                </div>
                <!-- FHS -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="fhs-radio">FHS</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked8">
                            <input name="rdio-primary8" type="radio" id="rdio-primary-unchecked8" value="Present" style="margin-right: 5px;">
                            <span>Present</span>
                        </label>
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary8">
                            <input name="rdio-primary8" type="radio" id="rdio-primary8" value="Absent" style="margin-right: 5px;">
                            <span>Absent</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- VE/Modified Bishops Score -->
        <label class="form-label" for="ve-modifiedbishops-score-label">VE/Modified Bishops Score</label>
        <div>
            <div class="row">
                <!-- SCORE -->
                <div class="form-group col-md-2">
                    <label class="form-label" style="font-size: 24px; text-align: center; display: block;">SCORE<br></label>
                    <label class="form-label" id="score-label" style="font-size: 24px; color: red; text-align: center; display: block;">0</label>
                </div>
                <!-- Cervical Dilatation -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="cervicaldilatation-text">Cervical Dilatation</label>
                    <div class="input-group">
                        <input type="text" id="cervical-dilatation" name="cervical_dilatation" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                </div>
                <!-- Cervical Consistency -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="cervicalconsistency-dropdown">Cervical Consistency</label>
                    <select id="cervical-consistency" name="cervical_consistency" class="form-control form-select">
                        <option label="Choose one" disabled selected></option>
                        <option value="Firm">Firm</option>
                        <option value="Medium">Medium</option>
                        <option value="Soft">Soft</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <!-- Cervical Canel -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="cervical_canel-text">Cervical <br>Canel</label>
                    <div class="input-group">
                        <input type="text" id="cervical_canel" name="cervical_canel" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                </div>
                <!-- Cervical Position -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="cervicalposition-dropdown">Cervical <br> Position</label>
                    <select id="cervical-position" name="cervical_position" class="form-control form-select">
                        <option label="Choose one" disabled selected></option>
                        <option value="Anterior">Anterior</option>
                        <option value="Central">Central</option>
                        <option value="Posterior">Posterior</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <!-- Station of Presenting Part -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="station-dropdown">Station of Presenting Part</label>
                    <select id="station" name="station" class="form-control form-select">
                        <option label="Choose one" disabled selected></option>
                        <option value="-3">-3</option>
                        <option value="-2">-2</option>
                        <option value="-1">-1</option>
                        <option value="0">0</option>
                        <option value="+1">+1</option>
                        <option value="+2">+2</option>
                        <option value="+3">+3</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Scan OBS -->
        <label class="form-label" for="scan-label">Scan</label>
        <div>
            <!-- TAS OBS -->
            <label class="form-label" for="tas-label">TAS/TVS</label>
            <div class="row">
                <!-- Fetus -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="fetus-dropdown">Fetus</label>
                    <select name="fetus" class="form-control form-select" id="fetus-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Single">Single</option>
                        <option value="Twin">Twin</option>
                    </select>
                </div>
                <!-- Precentation -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="precentation-dropdown">Precentation</label>
                    <select name="precentation" class="form-control form-select" id="precentation-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Cephalic P/C">Cephalic P/C</option>
                        <option value="Breech P/C">Breech P/C</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <div class="row">
                        <!-- BPD -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="bpd-text">BPD</label>
                            <input type="text" id="bpd" name="bpd" class="form-control" placeholder="">
                        </div>
                        <!-- AC -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="ac-text">AC</label>
                            <input type="text" id="ac" name="ac" class="form-control" placeholder="">
                        </div>
                        <!-- HC -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="hc-text">HC</label>
                            <input type="text" id="hc" name="hc" class="form-control" placeholder="">
                        </div>
                        <!-- FL -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="fl-text">FL</label>
                            <input type="text" id="fl" name="fl" class="form-control" placeholder="">
                        </div>
                        <!-- CRL -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="crl-text">CRL</label>
                            <input type="text" id="crl" name="crl" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- TVS/TVS OBS -->
            <div class="row">
                <!-- Placental Position -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="placental_position-text">Placental Position</label>
                    <div class="input-group">
                        <input type="text" name="placental_position" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                </div>
                <!-- EFW -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="efw-text">EFW</label>
                    <div class="input-group">
                        <input type="text" name="efw" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                </div>
                <!-- Liquor -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="liquor-radio">Liquor</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked7">
                            <input name="rdio-primary7" type="radio" id="rdio-primary-unchecked7" value="Adequate" style="margin-right: 5px;">
                            <span>Adequate</span>
                        </label>
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary7">
                            <input name="rdio-primary7" type="radio" id="rdio-primary7" value="Not Adequate" style="margin-right: 5px;">
                            <span>Not Adequate</span>
                        </label>
                    </div>
                </div>
                <!-- UT.A.Dopplier -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="dopplier-dropdown">UT.A.Dopplier</label>
                    <select name="dopplier" class="form-control form-select" id="dopplier-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function calculateScore() {
        const dilatation = parseFloat(document.getElementById('cervical-dilatation').value) || 0;
        const consistency = document.getElementById('cervical-consistency').value;
        const canel = parseFloat(document.getElementById('cervical_canel').value) || 0;
        const position = document.getElementById('cervical-position').value;
        const station = document.getElementById('station').value;

        let score = 0;

        // Calculate dilatation score
        if (dilatation === 0) {
            score += 0;
        } else if (dilatation === 1 || dilatation === 2) {
            score += 1;
        } else if (dilatation === 3 || dilatation === 4) {
            score += 2;
        } else if (dilatation >= 5) {
            score += 3;
        }

        // Calculate consistency score
        if (consistency === 'Firm') {
            score += 0;
        } else if (consistency === 'Medium') {
            score += 1;
        } else if (consistency === 'Soft') {
            score += 2;
        }

        // Calculate canel (length of cervical canal) score
        if (canel > 2) {
            score += 0;
        } else if (canel >= 1 && canel <= 2) {
            score += 1;
        } else if (canel >= 0.5 && canel < 1) {
            score += 2;
        } else if (canel < 0.5) {
            score += 3;
        }

        // Calculate position score
        if (position === 'Posterior') {
            score += 0;
        } else if (position === 'Central') {
            score += 1;
        } else if (position === 'Anterior') {
            score += 2;
        }

        // Calculate station score
        if (station === '-3') {
            score += 0;
        } else if (station === '-2') {
            score += 1;
        } else if (station === '-1' || station === '0') {
            score += 2;
        } else if (station === 'Below spines') {
            score += 3;
        }

        // Display the calculated score
        document.getElementById('score-label').innerText = score;
    }

    // Attach event listeners to input elements
    document.getElementById('cervical-dilatation').addEventListener('input', calculateScore);
    document.getElementById('cervical-consistency').addEventListener('change', calculateScore);
    document.getElementById('cervical_canel').addEventListener('input', calculateScore);
    document.getElementById('cervical-position').addEventListener('change', calculateScore);
    document.getElementById('station').addEventListener('change', calculateScore);
</script>