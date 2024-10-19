<!-- <h6 class="mb-0">Past Gyn Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <!-- Menstrual HX & Contraception HX -->
            <div class="row">
                <!-- Menstrual HX -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="menstrualhx-label">Menstrual HX</label>
                    <label class="form-label" for="menarche_at-number">Menarche at</label>
                    <input type="number" step="any" step="any" name="menarche_at" class="form-control" placeholder="">
                </div>

                <!-- Contraception HX -->
                <div class="form-group col-md-9">
                    <label class="form-label" for="contraceptionhx-label">Contraception HX</label>
                    <label class="form-label" for="typeofcontraceptionhx-label">Types of Contraception</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="contraception[]" value="OCP" class="selectgroup-input">
                            <span class="selectgroup-button">OCP</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="contraception[]" value="DMPA" class="selectgroup-input">
                            <span class="selectgroup-button">DMPA</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="contraception[]" value="IUD" class="selectgroup-input">
                            <span class="selectgroup-button">IUD</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="contraception[]" value="IUCD" class="selectgroup-input">
                            <span class="selectgroup-button">IUCD</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="contraception[]" value="Condom" class="selectgroup-input">
                            <span class="selectgroup-button">Condom</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="contraception[]" value="Others" class="selectgroup-input">
                            <span class="selectgroup-button">Others</span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- Bleeding Pattern -->
            <label class="form-label" for="bleedingpattern-label">Bleeding Pattern</label>
            <div class="row">
                <!-- Amount -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="amount-text">Amount</label>
                    <input type="text" name="amount" class="form-control" placeholder="">
                </div>
                <!-- Duration -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="duration-text">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="">
                </div>
                <!-- Regularity -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="regularity-radio">Regularity</label>
                    <div>
                        <label class="rdiobox" for="rdio-primary-unchecked1" style="margin-right: 10px;">
                            <input name="rdio-primary1" type="radio" class="radio-primary" id="rdio-primary-unchecked1">
                            <span>Regular</span>
                        </label>
                        <label class="rdiobox" for="rdio-primary1" style="margin-right: 10px;">
                            <input name="rdio-primary1" type="radio" class="radio-primary" id="rdio-primary1">
                            <span>Irregular</span>
                        </label>
                    </div>
                </div>
                <!-- AUB -->
                <div class="form-group col-md-3">
                    <label class="form-label" for="aub-radio">AUB</label>
                    <div>
                        <label class="rdiobox" for="rdio-primary-unchecked2" style="margin-right: 10px;">
                            <input name="rdio-primary2" type="radio" class="radio-primary" value="Yes" id="rdio-primary-unchecked2">
                            <span>Yes</span>
                        </label>
                        <label class="rdiobox" for="rdio-primary2" style="margin-right: 10px;">
                            <input name="rdio-primary2" type="radio" class="radio-primary" value="No" id="rdio-primary2">
                            <span>No</span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- Subfertility -->
            <label class="form-label" style="margin-right: 10px;" for="default-label">Subfertility</label>
            <div class="row">
                <div class="form-group  col-md-12">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked3">
                            <input name="rdio-primary3" type="radio" id="rdio-primary-unchecked3" value="Yes" style="margin-right: 5px;">
                            <span>Yes</span>
                        </label>
                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary3">
                            <input name="rdio-primary3" type="radio" id="rdio-primary3" value="No" style="margin-right: 5px;">
                            <span>No</span>
                        </label>
                    </div>
                    <div id="newRowGender">
                        <!-- Gender -->
                    </div>
                    <div id="newRowPGH">
                        <!-- Gyn -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Past Gyn Hx -Subfertility Script -->
<script>
    function getSelectedRadio() {
        const radios = document.querySelectorAll('input[name="rdio-primary3"]');
        let selectedValue = null;

        radios.forEach((radio) => {
            if (radio.checked) {
                selectedValue = radio.value;
            }
        });

        const newRowGender = document.getElementById('newRowGender');
        if (selectedValue === 'Yes') {
            newRowGender.innerHTML = `
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="gender-dropdown">Gender</label>
                                <select name="gender" class="form-control form-select" id="gender-dropdown" data-bs-placeholder="">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>`;
            document.getElementById('gender-dropdown').addEventListener('change', changeGender);
        } else {
            newRowGender.innerHTML = '';
            document.getElementById('newRowPGH').innerHTML = '';
        }
    }

    function changeGender() {
        const specialtyGender = document.getElementById('gender-dropdown').value;
        const newRow = document.getElementById('newRowPGH');

        if (specialtyGender === 'Male') {
            newRow.innerHTML = `
                    <div class="row">
                        <!-- SFA -->
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="male_factors[]" value="SFA" class="selectgroup-input" checked>
                                <span class="selectgroup-button">SFA</span>
                            </label>
                        </div>
                    </div>`;
        } else if (specialtyGender === 'Female') {
            newRow.innerHTML = `
                    <div class="row">
                        <!-- Ovulatory Disorder -->
                        <label class="form-label" for="default-dropdown">Ovulatory Disorder</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="ovulatory_disorder[]" value="Hypothalamic Pituitary Axis" class="selectgroup-input">
                                <span class="selectgroup-button">Hypothalamic Pituitary Axis</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="ovulatory_disorder[]" value="PCOS" class="selectgroup-input">
                                <span class="selectgroup-button">PCOS</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="ovulatory_disorder[]" value="Ovarian Failure (POF/POI)" class="selectgroup-input">
                                <span class="selectgroup-button">Ovarian Failure (POF/POI)</span>
                            </label>
                        </div>
                        <!-- Tubal Factors -->
                        <label class="form-label" for="default-dropdown">Tubal Factors</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors[]" value="Infection" class="selectgroup-input">
                                <span class="selectgroup-button">Infection</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors[]" value="Surgery" class="selectgroup-input">
                                <span class="selectgroup-button">Surgery</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors[]" value="Endometriosis" class="selectgroup-input">
                                <span class="selectgroup-button">Endometriosis</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors[]" value="IBD" class="selectgroup-input">
                                <span class="selectgroup-button">IBD</span>
                            </label>
                        </div>
                        <!-- Uterine -->
                        <label class="form-label" for="default-dropdown">Uterine</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_factors[]" value="Congenital" class="selectgroup-input">
                                <span class="selectgroup-button">Congenital</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_factors[]" value="Fibroids" class="selectgroup-input">
                                <span class="selectgroup-button">Fibroids</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_factors[]" value="Polyps" class="selectgroup-input">
                                <span class="selectgroup-button">Polyps</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_factors[]" value="Adhesion/Asherman's" class="selectgroup-input">
                                <span class="selectgroup-button">Adhesion/Asherman's</span>
                            </label>
                        </div>
                    </div>`;
        }
    }

    document.querySelectorAll('input[name="rdio-primary3"]').forEach((radio) => {
        radio.addEventListener('change', getSelectedRadio);
    });
</script>