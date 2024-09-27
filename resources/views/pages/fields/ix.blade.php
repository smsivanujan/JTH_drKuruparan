<!-- <h6 class="mb-0">IX</h6> -->
<div>
    <div class="my-3">
        <div>
            <label class="form-label" for="ix-label">Ix</label>
            <div>
                <div class="row">
                    <!-- CTG -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="ctg-dropdown">CTG</label>
                        <select name="ctg" class="form-control form-select" id="ctg-dropdown" data-bs-placeholder="">
                            <option label="Choose one" disabled selected></option>
                            <option value="Normal">Normal</option>
                            <option value="Suspizions">Suspizions</option>
                            <option value="Pathological">Pathological</option>
                        </select>
                    </div>
                    <!-- TAS -->
                    <div class="form-group col-md-9">
                        <label class="form-label" for="tas-text">TAS</label>
                        <input type="description" name="tas" class="form-control" id="tas-input" placeholder="">
                    </div>
                </div>
                <!-- FBC -->
                <div class="row">
                    <label class="form-label" for="fbc-label">FBC</label>
                    <div class="row">
                        <div class="form-group col-ml-12">
                            <div class="d-flex">
                                <!-- HB(g/dl) -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="hb-number">HB</label>
                                    <div class="input-group">
                                        <input type="number" name="hb" class="form-control" id="hb-input" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">g/dl</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- PLT(/mm) -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="plt-number">PLT</label>
                                    <div class="input-group">
                                        <input type="number" name="plt" class="form-control" id="plt-input" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">mm</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- WBC(/mm) -->
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="wbc-number">WBC</label>
                                    <div class="input-group">
                                        <input type="number" name="wbc" class="form-control" id="wbc-input" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">mm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label" for="crp-number">CRP</label>
                            <input type="number" name="crp" class="form-control" id="crp-input" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="urinefullreport-dropdown">Urine Full Report</label>
                            <select name="urine_full_report" class="form-control form-select" id="urinefullreport-dropdown" data-bs-placeholder="">
                                <option label="Choose one" disabled selected></option>
                                <option value="Normal">Normal</option>
                                <option value="Protin +/-">Protin +/-</option>
                                <option value="Drycell +/-">Drycell +/-</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="ogtt/bss-dropdown">OGTT/BSS</label>
                            <select name="ohtt_bss" class="form-control form-select" id="ohtt/bss-dropdown" data-bs-placeholder="">
                                <option label="Choose one" disabled selected></option>
                                <option value="Normal">Normal</option>
                                <option value="Abnormal">Abnormal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan -->
            <label class="form-label" for="plan-label">Management Plan</label>
            <div class="row">
                <!-- Antibiotics -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="antibiotics-dropdown">Antibiotics</label>
                    <select name="antibiotics" class="form-control form-select" id="antibiotics-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Antibiotics">Antibiotics</option>
                        <option value="Analogeis">Analogeis</option>
                        <option value="DM Mx">DM Mx</option>
                        <option value="DM Mx">BP Mx</option>
                        <option value="Steroids">Steroids</option>
                    </select>
                </div>
                <!-- Plan Delivery -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="plandelivery-dropdown">Plan Delivery</label>
                    <select name="plan_delivery" class="form-control form-select" id="plandelivery-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="IOC">IOC</option>
                        <option value="SOS">SOS</option>
                        <option value="ELEC.LSCS">ELEC.LSCS</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>