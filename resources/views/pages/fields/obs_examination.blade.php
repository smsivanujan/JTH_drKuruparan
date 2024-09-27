<!-- <h6 class="mb-0">Obs Examination</h6> -->
<div>
    <div class="my-3">
        <div>
            <div class="row">
                <!-- General -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="general-checkbox">General</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="generalObs[]" value="Pallor" class="selectgroup-input">
                            <span class="selectgroup-button">Pallor</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="generalObs[]" value="Odema" class="selectgroup-input">
                            <span class="selectgroup-button">Odema</span>
                        </label>
                    </div>
                </div>
                <!-- BP -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="bp-number">BP</label>
                    <input type="number" name="bp" class="form-control" placeholder="BP">
                </div>
                <!-- PR -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="pr-number">PR</label>
                    <input type="number" name="pr" class="form-control" placeholder="PR">
                </div>
                <!-- Thyroid Examination -->
                <div class="form-group col-md-5">
                    <label class="form-label" for="thyroidexamination-radio">Thyroid Examination</label>
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
                    <!-- inspectionObs -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="inspectionObs-dropdown">Inspection OBS</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" id="mass-checkbox" name="inspectionObs[]" value="Linea nigra" class="selectgroup-input">
                                <span class="selectgroup-button">Linea nigra</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspectionObs[]" value="Striae" class="selectgroup-input">
                                <span class="selectgroup-button">Striae</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspectionObs[]" value="Flat Umblicus" class="selectgroup-input">
                                <span class="selectgroup-button">Flat Umblicus</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspectionObs[]" value="Surgical Scar" class="selectgroup-input">
                                <span class="selectgroup-button">Surgical Scar</span>
                            </label>
                        </div>
                    </div>
                    <!-- SFH (cm) -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="sfh-number">SFH (cm)</label>
                        <input type="number" name="sfh" class="form-control" placeholder="cm">
                    </div>
                    <!-- Lie -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="lie-dropdown">Lie</label>
                        <select name="lie" class="form-control form-select" id="lie-dropdown" data-bs-placeholder="Select Lie">
                            <option label="Choose one" disabled selected></option>
                            <option value="Longitudinal">Longitudinal</option>
                            <option value="Transverse">Transverse</option>
                            <option value="Oblique">Oblique</option>
                        </select>
                    </div>
                    <!-- Position -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="position-dropdown">Position</label>
                        <select name="position" class="form-control form-select" id="position-dropdown" data-bs-placeholder="Select Position">
                            <option label="Choose one" disabled selected></option>
                            <option value="LOA">LOA</option>
                            <option value="LOP">LOP</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <!-- Engagement -->
                    <div class="form-group col-md-4">
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
                    <div class="form-group col-md-3">
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
            <label class="form-label" id="score-label">SCORE: 0</label>
            <div>
                <div class="row">
                    <!-- Cervical Dilatation -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="cervicaldilatation-text">Cervical Dilatation</label>
                        <input type="text" id="cervical-dilatation" name="cervical_dilatation" class="form-control" placeholder="cm">
                    </div>
                    <!-- Cervical Consistency -->
                    <div class="form-group col-md-4">
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
                        <label class="form-label" for="cervical_canel-text">Cervical Canel</label>
                        <input type="text" id="cervical_canel" name="cervical_canel" class="form-control" placeholder="cm">
                    </div>
                    <!-- Cervical Position -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="cervicalposition-dropdown">Cervical Position</label>
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
                <label class="form-label" for="tas-label">TAS</label>
                <div class="row">
                    <!-- Fetus -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="fetus-dropdown">Fetus</label>
                        <select name="fetus" class="form-control form-select" id="fetus-dropdown" data-bs-placeholder="Select Fetus">
                            <option label="Choose one" disabled selected></option>
                            <option value="Single">Single</option>
                            <option value="Twin">Twin</option>
                        </select>
                    </div>
                    <!-- Precentation -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="precentation-dropdown">Precentation</label>
                        <select name="precentation" class="form-control form-select" id="precentation-dropdown" data-bs-placeholder="Select Precentation">
                            <option label="Choose one" disabled selected></option>
                            <option value="Cephalic P/C">Cephalic P/C</option>
                            <option value="Breech P/C">Breech P/C</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="form-label" for="bpd-text">BPD</label>
                                <input type="text" id="bpd" name="bpd" class="form-control" placeholder="BPD">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label" for="ac-text">AC</label>
                                <input type="text" id="ac" name="ac" class="form-control" placeholder="AC">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label" for="hc-text">HC</label>
                                <input type="text" id="hc" name="hc" class="form-control" placeholder="HC">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label" for="fl-text">FL</label>
                                <input type="text" id="fl" name="fl" class="form-control" placeholder="FL">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label" for="crl-text">CRL</label>
                                <input type="text" id="crl" name="crl" class="form-control" placeholder="CRL">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TVS OBS -->
                <label class="form-label" for="tas-label">TVS</label>
                <div class="row">
                    <!-- Placental Position -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="placental_position-text">Placental Position</label>
                        <input type="text" name="placental_position" class="form-control" placeholder="cm">
                    </div>
                    <!-- EFW -->
                    <div class="form-group col-md-2">
                        <label class="form-label" for="efw-text">EFW</label>
                        <input type="text" name="efw" class="form-control" placeholder="Kg">
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
                        <select name="dopplier" class="form-control form-select" id="dopplier-dropdown" data-bs-placeholder="Select Dopplier">
                            <option label="Choose one" disabled selected></option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function calculateScore() {
        const dilatation = parseFloat(document.getElementById('cervical-dilatation').value) || 0;
        const consistency = document.getElementById('cervical-consistency').value;
        const canel = parseFloat(document.getElementById('effacement').value) || 0;
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
        } else if (station === 'Below spines') { // Adjusted this to match the chart description
            score += 3;
        }

        // Display the calculated score
        document.getElementById('score-label').innerText = 'SCORE: ' + score;
    }

    // Attach event listeners to input elements
    document.getElementById('cervical-dilatation').addEventListener('input', calculateScore);
    document.getElementById('cervical-consistency').addEventListener('change', calculateScore);
    document.getElementById('effacement').addEventListener('input', calculateScore);
    document.getElementById('cervical-position').addEventListener('change', calculateScore);
    document.getElementById('station').addEventListener('change', calculateScore);
</script>