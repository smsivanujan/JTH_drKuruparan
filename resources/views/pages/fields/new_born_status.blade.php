<!-- <h6 class="mb-0">New Born Status</h6> -->
<div>
    <div class="my-3">
        <label class="form-label" for="new_born_status-label">New Born Status</label>
        <div>
            <div class="row">
                <!-- Date and Time of Birth -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="baby_dob">Date and Time of Birth</label>
                    <input type="datetime-local" id="baby_dob" name="baby_dob" class="form-control" placeholder="">
                </div>
                <!-- Baby Gender -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="baby_gender-dropdown">Gender</label>
                    <select name="baby_gender" class="form-control form-select" id="baby_gender" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Boy">Boy</option>
                        <option value="Girl">Girl</option>
                    </select>
                </div>
                <!-- AphAr -->
                <div class="form-group col-md-1">
                    <label class="form-label" for="aphar-number">AphAr</label>
                    <input type="text" name="aphar" class="form-control" id="aphar-input" placeholder="">
                </div>
                <!-- Birth Weight -->
                <div class="form-group col-md-2">
                    <label class="form-label" for="nbs_birth_weight-number">Weight</label>
                    <div class="input-group">
                        <input type="number" name="nbs_birth_weight" class="form-control" id="nbs_birth_weight-input" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                </div>
                <!-- PBU Admission -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="pbu_admission-dropdown">PBU Admission</label>
                    <select name="pbu_admission" class="form-control form-select" id="pbu_admission" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>