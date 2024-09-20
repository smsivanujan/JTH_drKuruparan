<!-- <h6 class="mb-0">Current Pregnancy Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div class="row">
                <!-- G -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="g-text">G</label>
                    <input type="number" name="g" class="form-control" placeholder="G">
                </div>
                <!-- P -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="p-text">P</label>
                    <input type="number" name="p" class="form-control" placeholder="P">
                </div>
                <!-- C -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="c-text">C</label>
                    <input type="number" name="c" class="form-control" placeholder="C">
                </div>
                <!-- Married Year -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="yrs-married-number">Married Year</label>
                    <input type="number" name="married_year" class="form-control" placeholder="Years (YYYY)" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                </div>
            </div>
            <div class="row">
                <!-- LMP -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="lmp-text">LMP</label>
                    <input type="date" name="lmp" class="form-control" placeholder="LMP">
                </div>
                <!-- EDD -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="edd-text">EDD</label>
                    <input type="date" name="edd" class="form-control" placeholder="EDD">
                </div>
                <!-- Working EDD -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="workingedd-text">Working EDD</label>
                    <input type="date" name="working_edd" class="form-control" placeholder="Working EDD">
                </div>
            </div>
        </div>
    </div>
</div>