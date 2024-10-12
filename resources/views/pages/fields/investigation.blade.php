<!-- <h6 class="mb-0">Investigation</h6> -->
<div>
    <div class="my-3">
        <div>
            <!-- CTG & TAS -->
            <div class="row">
                <!-- CTG -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="ctg-dropdown">CTG</label>
                    <select name="ctg" class="form-control form-select" id="ctg-dropdown">
                        <option label="Choose one" disabled selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Suspizions">Suspizions</option>
                        <option value="Pathological">Pathological</option>
                    </select>
                </div>
                <!-- FBC -->
                <div class="form-group col-md-9">
                    <label class="form-label" for="fbc-label">FBC</label>
                    <div class="row">
                        <!-- HB -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="hb-input">HB</label>
                            <div class="input-group">
                                <input type="number" name="hb" class="form-control" id="hb-input" placeholder="">
                                <span class="input-group-text">g/dL</span>
                            </div>
                        </div>
                        <!-- WBC -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="wbc-input">WBC</label>
                            <div class="input-group">
                                <input type="number" name="wbc" class="form-control" id="wbc-input" placeholder="">
                                <span class="input-group-text">x10<sup>9</sup>/L</span>
                            </div>
                        </div>
                        <!-- PLT -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="plt-input">PLT</label>
                            <div class="input-group">
                                <input type="number" name="plt" class="form-control" id="plt-input" placeholder="">
                                <span class="input-group-text">x10<sup>9</sup>/L</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CRP & Urine Full Report (UFR) & OGTT/BSS -->
            <div class="row">
                <!-- CRP -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="crp-number">CRP</label>
                    <input type="number" name="crp" class="form-control" id="crp-input" placeholder="">
                </div>
                <!-- Urine Full Report (UFR) -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="urinefullreport-dropdown">Urine Full Report (UFR)</label>
                    <select name="urine_full_report" class="form-control form-select" id="urinefullreport-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Proteinuria">Proteinuria</option>
                        <option value="Pus Cells">Pus Cells</option>
                    </select>
                </div>
                <!-- OGTT/BSS -->
                <div class="form-group col-md-4">
                    <label class="form-label" for="ogtt/bss-dropdown">OGTT/BSS</label>
                    <select name="ohtt_bss" class="form-control form-select" id="ohtt/bss-dropdown" data-bs-placeholder="">
                        <option label="Choose one" disabled selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
            <!-- Blood Sugar -->
            <div class="row">
                <label class="form-label" for="blood_sugar-label">Blood Sugar</label>
                <div class="d-flex">
                    <!-- RBS -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="rbs-number">RBS</label>
                        <div class="input-group">
                            <input type="number" name="rbs" class="form-control" id="rbs-input" placeholder="">
                            <div class="input-group-append">
                                <select class="form-control" name="rbs_unit" id="rbs-unit">
                                    <option value="mg/dL">mg/dL</option>
                                    <option value="mmol/L">mmol/L</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- FBS -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="fbs-number">FBS</label>
                        <div class="input-group">
                            <input type="number" name="fbs" class="form-control" id="fbs-input" placeholder="">
                            <div class="input-group-append">
                                <select class="form-control" name="fbs_unit" id="fbs-unit">
                                    <option value="mg/dL">mg/dL</option>
                                    <option value="mmol/L">mmol/L</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- PPBS -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="ppbs-number">PPBS</label>
                        <div class="input-group">
                            <input type="number" name="ppbs" class="form-control" id="ppbs-input" placeholder="">
                            <div class="input-group-append">
                                <select class="form-control" name="ppbs_unit" id="ppbs-unit">
                                    <option value="mg/dL">mg/dL</option>
                                    <option value="mmol/L">mmol/L</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rental Function Test & S.Electrolytes -->
            <div class="row">
                <!-- Rental Function Test -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="rental_function_test-label">Rental Function Test (RFT)</label>
                    <div class="d-flex">
                        <!-- S.Cr -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="scr-number">S.cr</label>
                            <input type="number" name="scr" class="form-control" id="scr-input" placeholder="">
                        </div>
                        <!-- BUN -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="bun-number">BUN</label>
                            <input type="number" name="bun" class="form-control" id="bun-input" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- S.Electrolytes -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="s_electrolytes-label">S.Electrolytes</label>
                    <div class="d-flex">
                        <!-- Na+ -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="sodium-number">Na+</label>
                            <input type="number" name="sodium" class="form-control" id="sodium-input" placeholder="">
                        </div>
                        <!-- K+ -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="potassium-number">K+</label>
                            <input type="number" name="potassium" class="form-control" id="potassium-input" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Liver Function Test & Clotting Profile  -->
            <div class="row">
                <!-- Liver Function Test -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="liver_function_test-label">Liver Function Test (LFT)</label>
                    <div class="d-flex">
                        <!-- AST -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="ast-number">AST</label>
                            <input type="number" name="ast" class="form-control" id="ast-input" placeholder="">
                        </div>
                        <!-- ALT -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="alt-number">ALT</label>
                            <input type="number" name="alt" class="form-control" id="alt-input" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- Clotting Profile -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="clotting_profile-label">Clotting Profile</label>
                    <div class="d-flex">
                        <!-- PT -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="pt-number">PT</label>
                            <div class="input-group">
                                <input type="number" name="pt" class="form-control" id="pt-input" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">sec</span>
                                </div>
                            </div>
                        </div>
                        <!-- APTT -->
                        <div class="form-group col-md-6">
                            <label class="form-label" for="alt-number">APTT</label>
                            <div class="input-group">
                                <input type="number" name="aptt" class="form-control" id="aptt-input" placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">sec</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>