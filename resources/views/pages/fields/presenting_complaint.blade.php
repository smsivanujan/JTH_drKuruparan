<!-- <h6 class="mb-0 me-2">Presenting Complaint</h6> -->
<div>
    <div class="my-3">
        <div>
            <div id="complaint-form">
                <div id="complaint-fields">
                    <!-- dynamic fields will be added here -->
                </div>
            </div>
            <button class="btn btn-success mb-3" type="button" id="add-field-btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Presenting Complaint
            </button>
        </div>
    </div>
</div>

<!-- Presenting Complaint Script -->
<script>
    let fieldCount = 1;

    function changeCategory() {
        const specialty = document.getElementById('category-dropdown').value;

        for (let i = 1; i < fieldCount; i++) {
            const complaintDropdown = document.getElementById(`complaint-dropdown-${i}`);
            if (complaintDropdown) {
                updateDropdownOptions(complaintDropdown, specialty);
            }
        }
    }

    function updateDropdownOptions(complaintDropdown, specialty) {
        complaintDropdown.innerHTML = '';
        complaintDropdown.innerHTML += '<option label="Choose one" disabled selected></option>';

        if (specialty === 'GYN') {
            complaintDropdown.innerHTML += `
                <option value="First trimester (T1) bleeding">First trimester (T1) bleeding</option>
                <option value="Abnormal uterine bleeding (AUB)">Abnormal uterine bleeding (AUB)</option>
                <option value="Irregular bleeding">Irregular bleeding</option>
                <option value="Irregular cycle">Irregular cycle</option>
                <option value="Primary amenorrhea">Primary amenorrhea</option>
                <option value="Secondary amenorrhea">Secondary amenorrhea</option>
                <option value="BSS monitoring">BSS monitoring</option>
                <option value="Vaginal discharge">Vaginal discharge</option>
                <option value="Postmenoposal bleeding (PMB)">Postmenoposal bleeding (PMB)</option>
                <option value="Urinary incontinence">Urinary incontinence</option>
                <option value="Septic abortion">Septic abortion</option>
                <option value="Ovarian CA">Ovarian CA</option>
                <option value="Lower abdominal pain">Lower abdominal pain</option>
                <option value="Abdominal bloating">Abdominal bloating</option>
                <option value="Abdominal mass">Abdominal mass</option>
                <option value="Dyspepsia">Dyspepsia</option>
                <option value="Other">Other</option>`;
        } else if (specialty === 'OBS') {
            complaintDropdown.innerHTML += `
                <option value="Show">Show</option>
                <option value="Nausea & Vomiting">Nausea & Vomiting</option>
                <option value="Dribbling">Dribbling</option>
                <option value="Lower abdominal pain">Lower abdominal pain</option>
                <option value="Confinement">Confinement</option>
                <option value="Blood sugar series (BSS) monitoring">Blood sugar series (BSS) monitoring</option>
                <option value="Reduced Fetal Movement">Reduced Fetal Movement</option>
                <option value="Elevated BP">Elevated BP</option>
                <option value="Leg Swelling/Ankle Oedema">Leg Swelling/Ankle Oedema</option>
                <option value="Blurred Vision">Blurred Vision</option>
                <option value="Head ache">Head ache</option>
                <option value="Epigastric Pain">Epigastric Pain</option>
                <option value="Nausea">Nausea</option>
                <option value="Vomiting">Vomiting</option>
                <option value="Other">Other</option>`;
        }
    }

    document.getElementById('add-field-btn').addEventListener('click', function() {
        const complaintFields = document.getElementById('complaint-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';
        newRow.id = `field-row-${fieldCount}`;
        newRow.innerHTML = `<div class="row">
                    <!-- Complaint -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="complaint-dropdown-${fieldCount}">Complaint</label>
                        <select name="complaint[]" class="form-control form-select" id="complaint-dropdown-${fieldCount}" data-bs-placeholder="">
                            <option label="Choose one" disabled selected></option>
                        </select>
                    </div>
                    <!-- Duration -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="durations-dropdown-${fieldCount}">Duration</label>
                        <select name="duration[]" class="form-control form-select" id="durations-dropdown-${fieldCount}" data-bs-placeholder="">
                            <option label="Choose one" disabled selected></option>
                            <option value="1-4 Hour">1-4 Hour</option>
                            <option value="4-8 Hour">4-8 Hour</option>
                            <option value="8-12 Hour">8-12 Hour</option>
                            <option value="12-14 Hour">12-14 Hour</option>
                            <option value="14-18 Hour">14-18 Hour</option>
                            <option value="18-22 Hour">18-22 Hour</option>
                            <option value="22-24 Hour">22-24 Hour</option>
                            <option value="2 Day">2 Day</option>
                            <option value="3 Day">3 Day</option>
                            <option value="4 Day">4 Day</option>
                            <option value="5 Day">5 Day</option>
                            <option value="6 Day">6 Day</option>
                            <option value="1 Week">1 Week</option>
                            <option value="2 Week">2 Week</option>
                            <option value="3 Week">3 Week</option>
                            <option value="1 Month and more">1 Month and more</option>
                        </select>
                    </div>
                    <!-- Severity -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="severity-dropdown-${fieldCount}">Severity</label>
                        <select name="severity[]" class="form-control form-select" id="severity-dropdown-${fieldCount}" data-bs-placeholder="">
                            <option label="Choose one" disabled selected></option>
                            <option value="Mild">Mild</option>
                            <option value="Moderate">Moderate</option>
                            <option value="Severe">Severe</option>
                        </select>
                    </div>      
                </div>
                <div class="row">    
                    <!-- Remarks -->
                    <div class="form-group col-md-10">
                        <label for="remarksPC-${fieldCount}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarksPC-${fieldCount}" name="remarksPC[]" rows="1"></textarea>
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-end">
                        <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount}')"><i class="fe fe-trash-2"></i></button>
                    </div>
                </div>`;

        complaintFields.appendChild(newRow);

        updateDropdownOptions(document.getElementById(`complaint-dropdown-${fieldCount}`), document.getElementById('category-dropdown').value);

        fieldCount++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        fieldRow.remove();
    }
</script>