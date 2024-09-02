<h6 class="mb-0" data-acc-title>Past Med Hx</h6>
<div data-acc-content>
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
                        <select name="pastmedhx[]" class="form-control form-select" id="pastmedhx-text-${fieldCount3}" data-bs-placeholder="Select Past Med Hx">
                            <option selected disabled value="">Choose...</option>
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
        fieldCount2++;
    });

    function removeField(id) {
        const fieldRow = document.getElementById(id);
        if (fieldRow) {
            fieldRow.remove();
        }
    }
</script>