<!-- <h6 class="mb-0">Social Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div class="row">
                <!-- Family Status -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="family_status-dropdown">Family Status</label>
                    <select name="family_status" class="form-control form-select" id="family_status-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Extended Family">Extended Family</option>
                        <option value="Nuclear Family">Nuclear Family</option>
                    </select>
                </div>
                <!-- Monthly Income -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="monthly_income-dropdown">Monthly Income</label>
                    <select name="monthly_income" class="form-control form-select" id="monthly_income-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Low">Low</option>
                        <option value="Middle">Middle</option>
                        <option value="High">High</option>
                    </select>
                </div>
            </div>
            <!-- Patient & Partner -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label" for="patient-label">Patient</label>
                    <div class="row">
                        <!-- Education-Patient -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="patient_education-dropdown">Education</label>
                            <select name="patient_education" class="form-control form-select" id="patient_education-dropdown" data-bs-placeholder="">
                                <option label="Choose one" disabled selected></option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Tertiary">Tertiary</option>
                            </select>
                        </div>
                        <!-- Occupation-Patient -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="patient_occupation-dropdown">Occupation</label>
                            <input type="text" name="patient_occupation" class="form-control" id="patient_occupation-input" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Social Problems-Patient -->
                        <div class="form-group col-md-12">
                            <label class="form-label" for="social_problems-dropdown">Social Problems</label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="patient_social_problem[]" value="Drugs Addict" class="selectgroup-input">
                                    <span class="selectgroup-button">Drugs Addict</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="patient_social_problem[]" value="Alacaholic" class="selectgroup-input">
                                    <span class="selectgroup-button">Alacaholic</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="patient_social_problem[]" value="Domestic Violance" class="selectgroup-input">
                                    <span class="selectgroup-button">Domestic Violance</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="partner-label">Partner</label>
                    <div class="row">
                        <!-- Education-Partner -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="partner_education-dropdown">Education</label>
                            <select name="partner_education" class="form-control form-select" id="partner_education-dropdown" data-bs-placeholder="">
                                <option label="Choose one" disabled selected></option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Tertiary">Tertiary</option>
                            </select>
                        </div>
                        <!-- Occupation-Partner -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="partner_occupation-dropdown">Occupation</label>
                            <input type="text" name="partner_occupation" class="form-control" id="partner_occupation-dropdown" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Social Problems-Partner -->
                        <div class="form-group col-md-12">
                            <label class="form-label" for="partner_social_problem-dropdown">Social Problems</label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="partner_social_problem[]" value="Drugs Addict" class="selectgroup-input">
                                    <span class="selectgroup-button">Drugs Addict</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="partner_social_problem[]" value="Alacaholic" class="selectgroup-input">
                                    <span class="selectgroup-button">Alacaholic</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>