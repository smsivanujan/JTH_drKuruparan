        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="../assets/plugins/select2/select2.full.min.js"></script>

        <!-- FORM ELEMENTS JS -->
        <script src="../assets/js/formelementadvnced.js"></script>

        <!-- DATA TABLE JS-->
        <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
        <script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="../assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
        <script src="../assets/js/table-data.js"></script>


        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('assets/plugins/p-scroll/pscroll.js')}}"></script>

        <!-- FORM WIZARD JS-->
        <script src="../assets/plugins/formwizard/jquery.smartWizard.js"></script>
        <script src="../assets/plugins/formwizard/fromwizard.js"></script>

        <!-- INTERNAl JQUERY.STEPS JS -->
        <script src="../assets/plugins/jquery-steps/jquery.steps.min.js"></script>
        <script src="../assets/plugins/parsleyjs/parsley.min.js"></script>

        <!-- INTERNAL ACCORDION-WIZARD-FORM JS-->
        <script src="../assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js"></script>
        <script src="../assets/js/form-wizard.js"></script>

        @yield('scripts')

        <!-- COLOR THEME JS -->
        <script src="{{asset('assets/js/themeColors.js')}}"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('assets/js/custom.js')}}"></script>

        <!-- BMI -->
        <script>
            function calculateBMI() {
                const heightInput = document.getElementById('height').value;
                const weightInput = document.getElementById('weight').value;

                if (heightInput && weightInput) {
                    const heightInMeters = heightInput / 100;
                    const bmi = (weightInput / (heightInMeters * heightInMeters)).toFixed(2);
                    document.getElementById('bmi').value = bmi;
                } else {
                    document.getElementById('bmi').value = '';
                }
            }
        </script>

        <script>
            let fieldCount = 1;

            function changeCategory() {
                const specialty = document.getElementById('Category-dropdown').value;

                for (let i = 1; i < fieldCount; i++) {
                    const complaintDropdown = document.getElementById(`complaint-dropdown-${i}`);
                    if (complaintDropdown) {
                        updateDropdownOptions(complaintDropdown, specialty);
                    }
                }
            }

            function updateDropdownOptions(complaintDropdown, specialty) {
                complaintDropdown.innerHTML = '';
                complaintDropdown.innerHTML += '<option label="Choose one" disabled selected></option>';

                if (specialty === 'gyn') {
                    complaintDropdown.innerHTML += `
                <option value="First trimester (T1) bleeding">First trimester (T1) bleeding</option>
                <option value="Abnormal uterine bleeding (AUB)">Abnormal uterine bleeding (AUB)</option>
                <option value="Irregular bleeding">Irregular bleeding</option>
                <option value="Irregular cycle">Irregular cycle</option>
                <option value="Primary amenorrhea">Primary amenorrhea</option>
                <option value="Secondary amenorrhea">Secondary amenorrhea</option>
                <option value="BSS monitoring">BSS monitoring</option>
                <option value="Vaginal discharge">Vaginal discharge</option>
                <option value="Postmenoposal bleeding (PMB)">Postmenoposal bleeding (PMB)</option>
                <option value="Urinary incontinence">Urinary incontinence</option>
                <option value="Septic abortion">Septic abortion</option>
                <option value="Ovarian CA">Ovarian CA</option>
                <option value="Lower abdominal pain">Lower abdominal pain</option>
                <option value="Abdominal bloating">Abdominal bloating</option>
                <option value="Abdominal mass">Abdominal mass</option>
                <option value="Dyspepsia">Dyspepsia</option>
                <option value="Other">Other</option>`;
                } else if (specialty === 'obs') {
                    complaintDropdown.innerHTML += `
                <option value="Show">Show</option>
                <option value="Dribbling">Dribbling</option>
                <option value="Lower abdominal pain">Lower abdominal pain</option>
                <option value="Confinement">Confinement</option>
                <option value="Blood sugar series (BSS) monitoring">Blood sugar series (BSS) monitoring</option>
                <option value="Other">Other</option>`;
                }
            }

            document.getElementById('add-field-btn').addEventListener('click', function() {
                const complaintFields = document.getElementById('complaint-fields');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-3';
                newRow.id = `field-row-${fieldCount}`;
                newRow.innerHTML = `<div class="row">
                    <div class="form-group col-md-8">
                        <label class="form-label" for="complaint-dropdown-${fieldCount}">Complaint</label>
                        <select name="complaint[]" class="form-control form-select" id="complaint-dropdown-${fieldCount}" data-bs-placeholder="Select Complaint">
                            <option label="Choose one" disabled selected></option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label" for="duration-dropdown-${fieldCount}">Duration</label>
                        <select name="duration[]" class="form-control form-select" id="duration-dropdown-${fieldCount}" data-bs-placeholder="Select Duration">
                            <option label="Choose one" disabled selected></option>
                            <option value="1 Day">1 Day</option>
                            <option value="2 Day">2 Day</option>
                            <option value="3 Day">3 Day</option>
                            <option value="4 Day">4 Day</option>
                            <option value="5 Day">5 Day</option>
                            <option value="1 Week">1 Week</option>
                            <option value="2 Week">2 Week</option>
                            <option value="Half Month">Half Month</option>
                            <option value="3 Week">3 Week</option>
                            <option value="1 Month and more">1 Month and more</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-label" for="severity-dropdown-${fieldCount}">Severity</label>
                        <select name="severity[]" class="form-control form-select" id="severity-dropdown-${fieldCount}" data-bs-placeholder="Select Severity">
                            <option label="Choose one" disabled selected></option>
                            <option value="Mild">Mild</option>
                            <option value="Moderate">Moderate</option>
                            <option value="Severe">Severe</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="remarks-${fieldCount}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks-${fieldCount}" name="remarks[]" rows="1" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="form-group col-md-1 d-flex align-items-end">
                        <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount}')"><i class="fe fe-trash-2"></i></button>
                    </div>
                </div>`;

                complaintFields.appendChild(newRow);

                updateDropdownOptions(document.getElementById(`complaint-dropdown-${fieldCount}`), document.getElementById('Category-dropdown').value);

                fieldCount++;
            });

            function removeField(id) {
                const fieldRow = document.getElementById(id);
                fieldRow.remove();
            }
        </script>

        <script>
            let fieldCount2 = 2;

            document.getElementById('add-field-btn2').addEventListener('click', function() {
                const complaintFields = document.getElementById('pastobs-fields');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-3';
                newRow.id = `field-row-${fieldCount2}`;
                newRow.innerHTML = `<div class="row"> 
                    <div class="form-group col-md-3">
                        <label class="form-label" for="year-input-${fieldCount2}">Year</label>
                        <input type="number" class="form-control" placeholder="YYYY" id="year-input-${fieldCount2}" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="poa-text-${fieldCount2}">POA</label>
                        <input type="text" class="form-control" placeholder="POA" id="poa-text-${fieldCount2}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label" for="mod-text-${fieldCount2}">MOD</label>
                        <select name="mod[]" class="form-control form-select" id="mod-text-${fieldCount2}" data-bs-placeholder="Select MOD">
                             <option selected disabled value="">Choose...</option>
                            <option Value="LSCS">LSCS</option>
                            <option Value="AVD">AVD</option>
                            <option Value="NVD">NVD</option>
                            <option Value="IUD">IUD</option>
                            <option Value="Miscarriage">Miscarriage</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="birth-weight-text-${fieldCount2}">B.Weight</label>
                        <input type="text" class="form-control" placeholder="KG" id="birth-weight-text-${fieldCount2}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="remarks-${fieldCount}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks-${fieldCount}" name="remarks[]" rows="1" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-end">
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
                if (selectedValue === 'yes') {
                    newRowGender.innerHTML = `
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="Gender-dropdown">Gender</label>
                                <select name="specialty" class="form-control form-select" id="Gender-dropdown" data-bs-placeholder="Select Gender">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>`;
                    document.getElementById('Gender-dropdown').addEventListener('change', changeGender);
                } else {
                    newRowGender.innerHTML = '';
                    document.getElementById('newRow').innerHTML = '';
                }
            }

            function changeGender() {
                const specialtyGender = document.getElementById('Gender-dropdown').value;
                const newRow = document.getElementById('newRow');

                if (specialtyGender === 'male') {
                    newRow.innerHTML = `
                    <div class="row">
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked>
                                <span class="selectgroup-button">SFA</span>
                            </label>
                        </div>
                    </div>`;
                } else if (specialtyGender === 'female') {
                    newRow.innerHTML = `
                    <div class="row">
                        <label class="form-label" for="default-dropdown">Ovulatory Disorder</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="value" value="Hypothalamic Pituitary Axis" class="selectgroup-input">
                                <span class="selectgroup-button">Hypothalamic Pituitary Axis</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="value" value="PCOS" class="selectgroup-input">
                                <span class="selectgroup-button">PCOS</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="value" value="Ovarian Failure (POF/POI)" class="selectgroup-input">
                                <span class="selectgroup-button">Ovarian Failure (POF/POI)</span>
                            </label>
                        </div>
                        <label class="form-label" for="default-dropdown">Tubal Factors</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors_1" value="Infection" class="selectgroup-input">
                                <span class="selectgroup-button">Infection</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors_2" value="Surgery" class="selectgroup-input">
                                <span class="selectgroup-button">Surgery</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors_3" value="Endometriosis" class="selectgroup-input">
                                <span class="selectgroup-button">Endometriosis</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="tubal_factors_4" value="IBD" class="selectgroup-input">
                                <span class="selectgroup-button">IBD</span>
                            </label>
                        </div>
                        <label class="form-label" for="default-dropdown">Uterine</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_1" value="Congenital" class="selectgroup-input">
                                <span class="selectgroup-button">Congenital</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_2" value="Fibroids" class="selectgroup-input">
                                <span class="selectgroup-button">Fibroids</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_3" value="Polyps" class="selectgroup-input">
                                <span class="selectgroup-button">Polyps</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="uterine_4" value="Adhesion/Asherman's" class="selectgroup-input">
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

        <script>
            let fieldCount3 = 3;

            document.getElementById('add-field-btn3').addEventListener('click', function() {
                const complaintFields = document.getElementById('pastmedhx-fields');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-3';
                newRow.id = `field-row-${fieldCount2}`;
                newRow.innerHTML = `<div class="row"> 
                    <div class="form-group col-md-12">
                        <label class="form-label" for="pastmedhx-text-${fieldCount2}">Past Med Hx</label>
                        <select name="pastmedhx[]" class="form-control form-select" id="pastmedhx-text-${fieldCount2}" data-bs-placeholder="Select Past Med Hx">
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
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="remarks-${fieldCount}" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks-${fieldCount}" name="remarks[]" rows="1" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-end">
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