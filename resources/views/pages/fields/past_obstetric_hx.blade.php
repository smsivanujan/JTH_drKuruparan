<!-- <h6 class="mb-0">Past Obstetric Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div id="complaint-form">
                <div id="pastobs-fields" class="row">
                    <!-- Initial form fields -->
                </div>
            </div>
            <button class="btn btn-success mb-3" type="button" id="add-field-btn2">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Past Obs
            </button>
        </div>
    </div>
</div>

<!-- Past Obs Hx Script -->
<script>
    let fieldCount2 = 2;

    document.getElementById('add-field-btn2').addEventListener('click', function() {
        const complaintFields = document.getElementById('pastobs-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';
        newRow.id = `field-row-${fieldCount2}`;
        newRow.innerHTML = `<div class="row"> 
                    <!-- Year -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="year-input-${fieldCount2}">Year</label>
                        <input type="number" name="year[]" class="form-control" placeholder="yyyy" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                    </div>
                    <!-- POA -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="poa-text-${fieldCount2}">POA</label>
                        <input type="text" name="past_obs_poa[]" class="form-control" placeholder="" id="poa-text-${fieldCount2}">
                    </div>
                    <!-- MOD -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="mod-text-${fieldCount2}">MOD</label>
                        <select name="past_obs_mod[]" class="form-control form-select" id="mod-text-${fieldCount2}" data-bs-placeholder="">
                             <option selected disabled value="">Choose...</option>
                            <option Value="LSCS">LSCS</option>
                            <option Value="AVD">AVD</option>
                            <option Value="NVD">NVD</option>
                            <option Value="IUD">IUD</option>
                            <option Value="Miscarriage">Miscarriage</option>
                        </select>
                    </div>
                    <!-- Birth Weight -->
                    <div class="form-group col-md-2">
                    <label class="form-label" for="past_obs_birth-weight-text-${fieldCount2}">Birth Weight</label>
                    <div class="input-group">
                        <input type="text" name="past_obs_birth_weight[]" class="form-control" placeholder="" id="past_obs_birth-weight-text-${fieldCount2}" min="0" max="200" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
                        <div class="input-group-append">
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Remarks -->
                    <div class="form-group col-md-11">
                        <label for="pastObshx_remarks-${fieldCount}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="pastObshx_remarks-${fieldCount}" name="pastObshx_remark[]" rows="1"></textarea>
                    </div>
                    <div class="form-group col-md-1 d-flex align-items-end">
                        <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount2}')"><i class="fe fe-trash-2"></i></button>
                    </div>
                </div>`;
        complaintFields.appendChild(newRow);
        fieldCount2++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        if (fieldRow) {
            fieldRow.remove();
        }
    }
</script>