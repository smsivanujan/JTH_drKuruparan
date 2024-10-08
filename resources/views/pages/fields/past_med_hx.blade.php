<!-- <h6 class="mb-0">Past Med Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div id="complaint-form">

                <div id="pastmedhx-fields" class="row">
                    <!-- Initial form fields -->
                </div>
            </div>
            <button class="btn btn-success mb-3" type="button" id="add-field-btn3">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Past Med Hx
            </button>
        </div>
    </div>
</div>

<!-- Past Med HX Script -->
<script>
    let fieldCount3 = 3;

    document.getElementById('add-field-btn3').addEventListener('click', function() {
        const complaintFields = document.getElementById('pastmedhx-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';
        newRow.id = `field-row-${fieldCount3}`;
        newRow.innerHTML = `<div class="row"> 
                    <!-- Past Med Hx -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="pastmedhx-text-${fieldCount3}">Past Med Hx</label>
                        <select name="pastmedhx[]" class="form-control form-select" id="pastmedhx-text-${fieldCount3}" data-bs-placeholder="">
                            <option selected disabled value="">Choose...</option>
                             <option value="Anaemia">Anaemia</option>
                              <option value="SLE">SLE</option>
                              <option value="APLS">APLS</option>
                            <option value="DM-type2/type1">DM-type2/type1</option>
                            <option value="HTN">HTN</option>
                            <option value="BA">BA</option>
                            <option value="DL">DL</option>
                            <option value="Epilepsy">Epilepsy</option>
                            <option value="PUD">PUD</option>
                             <option value="Others">Others</option>
                        </select>
                    </div>
                    <!-- Remarks -->
                    <div class="form-group col-md-7">
                        <label for="pastMedHx_remarks-${fieldCount3}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="pastMedHx_remarks-${fieldCount3}" name="pastMedHx_remarks[]" rows="1"></textarea>
                    </div>
                    <div class="form-group col-md-1 d-flex align-items-end">
                        <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount3}')"><i class="fe fe-trash-2"></i></button>
                    </div>
                </div>`;
        complaintFields.appendChild(newRow);
        fieldCount3++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        if (fieldRow) {
            fieldRow.remove();
        }
    }
</script>
<hr>
<!-- <h6 class="mb-0">Past Med Hx Drugs</h6> -->
<div>
    <div class="my-3">
        <div>
            <div id="complaint-form">
                <div id="drugpastmedhx-fields" class="row">
                    <!-- Initial form fields -->
                </div>
            </div>
            <button class="btn btn-success mb-3" type="button" id="add-field-btn4">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Drug Hx
            </button>
        </div>
    </div>
</div>

<!-- Past Med HX Drugs Script -->
<script>
    let fieldCount4 = 4;

    document.getElementById('add-field-btn4').addEventListener('click', function() {
        const complaintFields = document.getElementById('drugpastmedhx-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';
        newRow.id = `field-row-${fieldCount4}`;
        newRow.innerHTML = `
        <div class="row"> 
            <!-- Drug  Name -->
            <div class="form-group col-md-10">
                <label class="form-label" for="drugpastmedhx_drug_name-text-${fieldCount4}">Drug Name</label>
                <select name="drugpastmedhx_drug_name[]" class="form-control form-select" id="drugpastmedhx_drug_name-text-${fieldCount4}" onchange="updatePastMedHxDosageUnit(${fieldCount4})">
                    <option selected disabled value="">Choose...</option>
                    @foreach($drugs as $drug)
                        <option value="{{ $drug->actualItemId }}" data-unit="{{ $drug->displayUnit }}">{{ $drug->actualItemName }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Dosage pAst Med Hx -->
            <div class="form-group col-md-2">
                <label class="form-label" for="past_med_hx_drug_dosage-${fieldCount4}">Dosage</label>
                <div class="input-group">
                    <input type="text" name="drugpastmedhx_dosage[]" class="form-control" id="drugpastmedhx_dosage-${fieldCount4}" placeholder="">
                    <div class="input-group-append">
                        <span class="input-group-text" id="drugpastmedhx_dosage_unit-${fieldCount4}" name="drugpastmedhx_dosage_unit[]">mg</span>
                    </div>
                    <input type="hidden" name="drugpastmedhx_dosage_unit[]" id="drugpastmedhx_dosage_unit_hidden-${fieldCount4}" value="mg">
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Route -->
            <div class="form-group col-md-4">
                <label class="form-label" for="drugpastmedhx_route-dropdown-${fieldCount4}">Route</label>
                <select id="drugpastmedhx_route-${fieldCount4}" name="drugpastmedhx_route[]" class="form-control form-select">
                    <option label="Choose...." disabled selected></option>
                    <option value="Oral">Oral</option>
                    <option value="IM">IM</option>
                    <option value="SC">SC</option>
                    <option value="Other">Rectally</option>
                    <option value="LA">LA</option>
                    <option value="Nebuilize">Nebuilize</option>
                    <option value="Vaginally">Vaginally</option>
                    <option value="Eye">Eye</option>
                    <option value="Ear">Ear</option>
                    <option value="Nose">Nose</option>
                </select>
            </div>
            <!-- Frequency -->
            <div class="form-group col-md-4">
                <label class="form-label" for="drugpastmedhx_frequency-dropdown-${fieldCount4}">Frequency</label>
                <select id="drugpastmedhx_frequency-${fieldCount4}" name="drugpastmedhx_frequency[]" class="form-control form-select">
                    <option label="Choose...." disabled selected></option>
                    <option value="2hly">2hly</option>
                    <option value="4hly">4hly</option>
                    <option value="6hly">6hly</option>
                    <option value="5Xday">5Xday</option>
                    <option value="bd">bd</option>
                    <option value="tds">tds</option>
                    <option value="daily">daily</option>
                    <option value="Mane">Mane</option>
                    <option value="Vesper">Vesper</option>
                    <option value="Nocte">Nocte</option>
                    <option value="EOD">EOD</option>
                </select>
            </div>
            <div class="form-group col-md-1 d-flex align-items-end">
                <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount4}')"><i class="fe fe-trash-2"></i></button>
            </div>
        </div>`;

        complaintFields.appendChild(newRow);
        fieldCount4++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        if (fieldRow) {
            fieldRow.remove();
        }
    }

    function updatePastMedHxDosageUnit(fieldCount) {
        const drugSelect = document.getElementById(`drugpastmedhx_drug_name-text-${fieldCount}`);
        const selectedOption = drugSelect.options[drugSelect.selectedIndex];
        const unit = selectedOption.getAttribute('data-unit') || 'mg';

        const unitSpan = document.getElementById(`drugpastmedhx_dosage_unit-${fieldCount}`);
        unitSpan.textContent = unit;

        const hiddenInput = document.getElementById(`drugpastmedhx_dosage_unit_hidden-${fieldCount}`);
        hiddenInput.value = unit;
    }
</script>