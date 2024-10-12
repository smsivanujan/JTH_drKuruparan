<!-- <h6 class="mb-0">Family Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div id="complaint-form">

                <div id="familymedicinehx-fields" class="row">
                    <!-- Initial form fields -->
                </div>
            </div>
            <button class="btn btn-success mb-3" type="button" id="add-field-btn6">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Family Med Hx
            </button>
        </div>
    </div>
</div>

<!-- Family Med HX Script -->
<script>
    let fieldCount6 = 6;

    document.getElementById('add-field-btn6').addEventListener('click', function() {
        const complaintFields = document.getElementById('familymedicinehx-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';
        newRow.id = `field-row-${fieldCount6}`;
        newRow.innerHTML = `<div class="row"> 
                    <!-- Family Hx -->
                    <div class="form-group col-md-4">
                        <label class="form-label" for="familymedicinehx-text-${fieldCount6}">Family Med Hx</label>
                        <select name="familymedicinehx[]" class="form-control form-select" id="familymedicinehx-text-${fieldCount6}" data-bs-placeholder="">
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
                            <option value="Ovarian Malignancy">Ovarian Malignancy</option>
                            <option value="Breast Malignancy">Breast Malignancy</option>
                            <option value="Endometrial Malignancy">Endometrial Malignancy</option>
                            <option value="Cervical Malignancy">Cervical Malignancy</option>
                            <option value="Colonic Malignancy">Colonic Malignancy</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <!-- Remarks -->
                    <div class="form-group col-md-7">
                        <label for="familymedicinehx_remarks-${fieldCount6}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="familymedicinehx_remarks-${fieldCount6}" name="familymedicinehx_remarks[]" rows="1"></textarea>
                    </div>
                    <div class="form-group col-md-1 d-flex align-items-end">
                        <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount6}')"><i class="fe fe-trash-2"></i></button>
                    </div>
                </div>`;
        complaintFields.appendChild(newRow);
        fieldCount6++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        if (fieldRow) {
            fieldRow.remove();
        }
    }
</script>