<!-- <h6 class="mb-0">Current Pregnancy Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div class="row">
                <!-- G -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="g-text">G</label>
                    <input type="number" name="g" class="form-control" placeholder="">
                </div>
                <!-- P -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="p-text">P</label>
                    <input type="number" name="p" class="form-control" placeholder="">
                </div>
                <!-- C -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="c-text">C</label>
                    <input type="number" name="c" class="form-control" placeholder="">
                </div>
                <!-- Married Year -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="yrs-married-number">Married Year</label>
                    <input type="number" name="married_year" class="form-control" placeholder="yyyy" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                </div>
            </div>
            <div class="row">
                <!-- LMP -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="lmp-text">LMP</label>
                    <input type="date" name="lmp" class="form-control" placeholder="">
                </div>
                <!-- EDD -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="edd-text">EDD</label>
                    <input type="date" name="edd" class="form-control" placeholder="">
                </div>
                <!-- Working EDD -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="workingedd-text">Working EDD</label>
                    <input type="date" name="working_edd" class="form-control" placeholder="">
                </div>
            </div>
            <div class="row">
             <!-- Past History Complicated Status -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="past_history_status-dropdown"> Past History Complicated Status</label>
                    <select name="past_history_status" class="form-control form-select" id="past_history_complicated_status-dropdown" data-bs-placeholder="" onchange="changeStatus()">
                        <option label="Choose one" disabled selected></option>
                        <option value="Complicated">Complicated</option>
                        <option value="Not Complicated">Not Complicated</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <div id="newRowCPH">
                        <!-- Gyn -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Past Gyn Hx -Subfertility Script -->
<script>
    function changeStatus() {
        const specialtyStatus = document.getElementById('past_history_complicated_status-dropdown').value; 
        const newRow = document.getElementById('newRowCPH');

        if (specialtyStatus === 'Complicated') {
            newRow.innerHTML = `
                <div class="row">
                    <!-- Not Complicated -->
                    <label class="form-label" for="default-dropdown">Past History Complicated</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="PIH" class="selectgroup-input">
                            <span class="selectgroup-button">PIH</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Pre-ectompsia" class="selectgroup-input">
                            <span class="selectgroup-button">Pre-ectompsia</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Eclompsia" class="selectgroup-input">
                            <span class="selectgroup-button">Eclompsia</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="GDM" class="selectgroup-input">
                            <span class="selectgroup-button">GDM</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="DM" class="selectgroup-input">
                            <span class="selectgroup-button">DM</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Heart Disease" class="selectgroup-input">
                            <span class="selectgroup-button">Heart Disease</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Epilepsy" class="selectgroup-input">
                            <span class="selectgroup-button">Epilepsy</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Anaemia" class="selectgroup-input">
                            <span class="selectgroup-button">Anaemia</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Renal Disease" class="selectgroup-input">
                            <span class="selectgroup-button">Renal Disease</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Rheumatological Condition" class="selectgroup-input">
                            <span class="selectgroup-button">Rheumatological Condition</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="past_history_complicated_status[]" value="Bronchial Asthma" class="selectgroup-input">
                            <span class="selectgroup-button">Bronchial Asthma</span>
                        </label>
                    </div>
                </div>`;
           
        } else if (specialtyStatus === 'Not Complicated') {
            newRow.innerHTML = '';
        }
    }
</script>