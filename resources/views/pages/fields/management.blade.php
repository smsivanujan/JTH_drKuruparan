<!-- <h6 class="mb-0">Management</h6> -->
<div class="row">
    <!-- Plan -->
    <!-- <div class="form-group col-md-6">
        <label class="form-label" for="plan-dropdown">Plan</label>
        <select name="antibiotics" class="form-control form-select" id="antibiotics-dropdown" data-bs-placeholder="">
            <option label="Choose one" disabled selected></option>
            <option value="Antibiotics">Antibiotics</option>
            <option value="Analogeis">Analogeis</option>
            <option value="DM Mx">DM Mx</option>
            <option value="DM Mx">BP Mx</option>
            <option value="Steroids">Steroids</option>
        </select>
    </div> -->
    <!-- Plan Delivery -->
    <div class="form-group col-md-3">
        <label class="form-label" for="plandelivery-dropdown">Plan Delivery</label>
        <select name="plan_delivery" class="form-control form-select" id="plandelivery-dropdown" data-bs-placeholder="">
            <option label="Choose one" disabled selected></option>
            <option value="IOL">IOL</option>
            <option value="SOL">SOL</option>
        </select>
    </div>
    <!-- POA -->
    <div class="form-group col-md-3">
        <label class="form-label" for="mng_poa">POA</label>
        <div class="input-group">
            <input type="text" name="mng_poa" class="form-control" placeholder="" id="mng_poa-text">
            <div class="input-group-append">
                <span class="input-group-text">weeks</span>
            </div>
        </div>
    </div>
    <!-- MOD -->
    <div class="form-group col-md-6">
        <label class="form-label" for="mng_mod-text">MOD</label>
        <div class="selectgroup selectgroup-pills">
            <label class="selectgroup-item">
                <input type="checkbox" name="mng_mod[]" value="NVD" class="selectgroup-input">
                <span class="selectgroup-button">NVD</span>
            </label>
            <label class="selectgroup-item">
                <input type="checkbox" name="mng_mod[]" id="avd-checkbox" value="AVD" class="selectgroup-input">
                <span class="selectgroup-button">AVD</span>
            </label>
            <label class="selectgroup-item">
                <input type="checkbox" name="mng_mod[]" id="lscs-checkbox" value="LSCS" class="selectgroup-input">
                <span class="selectgroup-button">LSCS</span>
            </label>
        </div>

        <!-- AVD (Choosable) -->
        <div id="avd-section" style="display: none;">
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="avd">AVD</label>
                    <div class="input-group">
                        <input type="text" name="avd" id="avd" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">I<sup>0</sup></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LSCS (Choosable) -->
        <div id="lscs-section" style="display: none;">
            <label class="form-label" for="lscs-dropdown">LSCS</label>
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="em">EM</label>
                    <div class="input-group">
                        <input type="text" name="em" id="em" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">I<sup>0</sup></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="el">EL</label>
                    <div class="input-group">
                        <input type="text" name="el" id="el" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">I<sup>0</sup></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avdCheckbox = document.getElementById('avd-checkbox');
        const lscsCheckbox = document.getElementById('lscs-checkbox');
        const avdSection = document.getElementById('avd-section');
        const lscsSection = document.getElementById('lscs-section');

        avdCheckbox.addEventListener('change', function() {
            if (avdCheckbox.checked) {
                avdSection.style.display = 'block';
            } else {
                avdSection.style.display = 'none';
            }
        });

        lscsCheckbox.addEventListener('change', function() {
            if (lscsCheckbox.checked) {
                lscsSection.style.display = 'block';
            } else {
                lscsSection.style.display = 'none';
            }
        });
    });
</script>

<hr>

<div class="row">
    <div class="my-3">
        <div>
            <div id="complaint-form">


                <div id="drugmng-fields" class="row">
                    <!-- Initial form fields -->
                </div>
            </div>
            <button class="btn btn-success mb-3" type="button" id="add-field-btn5">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Drugs
            </button>
        </div>
    </div>
</div>

<!-- Drugs Script -->
<script>
    let fieldCount5 = 5;

    document.getElementById('add-field-btn5').addEventListener('click', function() {
        const complaintFields = document.getElementById('drugmng-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';
        newRow.id = `field-row-${fieldCount5}`;
        newRow.innerHTML = `
        <div class="row"> 
            <!-- Drug  Name -->
            <div class="form-group col-md-10">
                <label class="form-label" for="drugmng_drug_name-text-${fieldCount5}">Drug Name</label>
                <select name="drugmng_drug_name[]" class="form-control form-select" id="drugmng_drug_name-text-${fieldCount5}" onchange="updateDrugMngDosageUnit(${fieldCount5})">
                    <option selected disabled value="">Choose...</option>
                    @foreach($drugs as $drug)
                        <option value="{{ $drug->actualItemId }}" data-unit="{{ $drug->displayUnit }}">{{ $drug->actualItemName }}</option>
                    @endforeach
                </select>
            </div>
           <!-- Dosage -->
            <div class="form-group col-md-2">
                <label class="form-label" for="drugmng_dosage-${fieldCount5}">Dosage</label>
                <div class="input-group">
                    <input type="text" name="drugmng_dosage[]" class="form-control" id="drugmng_dosage-${fieldCount5}" placeholder="">
                    <div class="input-group-append">
                        <span class="input-group-text" id="drugmng_unit-${fieldCount5}" name="drugmng_dosage_unit[]">mg</span>
                    </div>
                    <input type="hidden" name="drugmng_dosage_unit[]" id="drugmng_dosage_unit_hidden-${fieldCount5}" value="mg">
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Route -->
            <div class="form-group col-md-4">
                <label class="form-label" for="drugmng_route-dropdown-${fieldCount5}">Route</label>
                <select id="drugmng_route-${fieldCount5}" name="drugmng_route[]" class="form-control form-select">
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
                <label class="form-label" for="drugmng_frequency-dropdown-${fieldCount5}">Frequency</label>
                <select id="drugmng_frequency-${fieldCount5}" name="drugmng_frequency[]" class="form-control form-select">
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
                <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount5}')"><i class="fe fe-trash-2"></i></button>
            </div>
        </div>`;

        complaintFields.appendChild(newRow);
        fieldCount5++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        if (fieldRow) {
            fieldRow.remove();
        }
    }

    function updateDrugMngDosageUnit(fieldCount) {
        const drugSelect = document.getElementById(`drugmng_drug_name-text-${fieldCount}`);
        const selectedOption = drugSelect.options[drugSelect.selectedIndex];
        const unit = selectedOption.getAttribute('data-unit') || 'mg';

        const unitSpan = document.getElementById(`drugmng_unit-${fieldCount}`);
        unitSpan.textContent = unit;

        const hiddenInput = document.getElementById(`drugmng_dosage_unit_hidden-${fieldCount}`);
        hiddenInput.value = unit;
    }
</script>