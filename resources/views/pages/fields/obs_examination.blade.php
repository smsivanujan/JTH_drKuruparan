<h6 class="mb-0" data-acc-title>Obs Examination</h6>
<div data-acc-content>
    <div class="my-3">
        <div>
            <div class="row">
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
                <div class="form-group col-md-2">
                    <label class="form-label" for="bp-number">BP</label>
                    <input type="number" name="bp" class="form-control" placeholder="BP">
                </div>
                <div class="form-group col-md-2">
                    <label class="form-label" for="pr-number">PR</label>
                    <input type="number" name="pr" class="form-control" placeholder="PR">
                </div>
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

            <label class="form-label" for="abdominalexamination-label">Abdominal Examination</label>
            <div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="inspection-dropdown">Inspection</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspection[]" value="Linea nigra" class="selectgroup-input">
                                <span class="selectgroup-button">Linea nigra</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspection[]" value="Striae" class="selectgroup-input">
                                <span class="selectgroup-button">Striae</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspection[]" value="Flat Umblicus" class="selectgroup-input">
                                <span class="selectgroup-button">Flat Umblicus</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="inspection[]" value="Surgical Scar" class="selectgroup-input">
                                <span class="selectgroup-button">Surgical Scar</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="sfh-number">SFH (cm)</label>
                        <input type="number" name="sfh" class="form-control" placeholder="cm">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="precentation-dropdown">Precentation</label>
                        <select name="precentation" class="form-control form-select" id="precentation-dropdown" data-bs-placeholder="Select Precentation">
                            <option label="Choose one" disabled selected></option>
                            <option value="Cephalic P/C">Cephalic P/C</option>
                            <option value="Breech P/C">Breech P/C</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="lie-dropdown">Lie</label>
                        <select name="lie" class="form-control form-select" id="lie-dropdown" data-bs-placeholder="Select Lie">
                            <option label="Choose one" disabled selected></option>
                            <option value="Longitudinal">Longitudinal</option>
                            <option value="Transverse">Transverse</option>
                            <option value="Oblique">Oblique</option>
                        </select>
                    </div>
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
                    <div class="form-group col-md-1">
                        <label class="form-label" for="efw-text">EFW</label>
                        <input type="text" name="efw" class="form-control" placeholder="Kg">
                    </div>
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

            <label class="form-label" for="ve-modifiedbishops-score-label">VE/Modified Bishops Score</label>
            <label class="form-label" id="score-label">SCORE: 0</label>
            <div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label class="form-label" for="cervicaldilatation-text">Cervical Dilatation</label>
                        <input type="text" id="cervical-dilatation" name="cervical_dilatation" class="form-control" placeholder="cm">
                    </div>
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
                    <div class="form-group col-md-2">
                        <label class="form-label" for="effacement-text">Cervical Canel</label>
                        <input type="text" id="effacement" name="effacement" class="form-control" placeholder="cm">
                    </div>
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

        </div>
    </div>
</div>