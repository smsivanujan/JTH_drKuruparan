        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        {{-- <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script> --}}

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- INTERNAL SELECT2 JS -->
        <!-- <script src="../assets/plugins/select2/select2.full.min.js"></script> -->

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

        <!-- STICKY JS -->
        <script src="{{asset('assets/js/sticky.js')}}"></script>

        @yield('scripts')

        <!-- COLOR THEME JS -->
        <script src="{{asset('assets/js/themeColors.js')}}"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('assets/js/custom.js')}}"></script>

        <script>
            let fieldCount = 1;

            function changeCategory() {
                const specialty = document.getElementById('Category-dropdown').value;

                // Update options for all existing complaint dropdowns
                for (let i = 1; i < fieldCount; i++) {
                    const complaintDropdown = document.getElementById(`complaint-dropdown-${i}`);
                    if (complaintDropdown) {
                        updateDropdownOptions(complaintDropdown, specialty);
                    }
                }
            }

            function updateDropdownOptions(complaintDropdown, specialty) {
                // Clear existing options
                complaintDropdown.innerHTML = '';
                complaintDropdown.innerHTML += '<option label="Choose one" disabled selected></option>';

                // Add options based on selected specialty
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
                newRow.innerHTML = `
                <div class="form-group col-md-4">
                    <label class="form-label" for="complaint-dropdown-${fieldCount}">Complaint</label>
                    <select name="complaint[]" class="form-control form-select" id="complaint-dropdown-${fieldCount}" data-bs-placeholder="Select Complaint">
                        <option label="Choose one" disabled selected></option>
                    </select>
                </div>
                <div class="form-group col-md-3">
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
                <div class="form-group col-md-2">
                    <label class="form-label" for="severity-dropdown-${fieldCount}">Severity</label>
                    <select name="severity[]" class="form-control form-select" id="severity-dropdown-${fieldCount}" data-bs-placeholder="Select Severity">
                        <option label="Choose one" disabled selected></option>
                        <option value="Mild">Mild</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Severe">Severe</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="remarks-${fieldCount}" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remarks-${fieldCount}" name="remarks[]" rows="1" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="form-group col-md-1 d-flex align-items-end">
                    <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount}')">X</button>
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
                newRow.innerHTML = `
            <div class="form-group col-md-2">
                <label class="form-label" for="year-input-${fieldCount2}">Year</label>
                <input type="number" class="form-control" placeholder="Years (YYYY)" id="year-input-${fieldCount2}" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
            </div>
            <div class="form-group col-md-2">
                <label class="form-label" for="poa-text-${fieldCount2}">POA</label>
                <input type="text" class="form-control" placeholder="POA" id="poa-text-${fieldCount2}">
            </div>
             <div class="form-group col-md-2 col-12">
                <label for="mod-text-${fieldCount2}">MOD</label>
                <select class="form-select" id="mod-text-${fieldCount2}" name="mod">
                    <option selected disabled value="">Choose...</option>
                    <option Value="LSIS">LSIS</option>
                    <option Value="AVD">AVD</option>
                    <option Value="NVD">NVD</option>
                    <option Value="IUD">IUD</option>
                    <option Value="Misserage">Misserage</option>
                </select>
                <div class="invalid-feedback">Please select a CTS.</div>
            </div>
            <div class="form-group col-md-2">
                <label class="form-label" for="birth-weight-text-${fieldCount2}">Birth Weight (KG)</label>
                <input type="text" class="form-control" placeholder="Birth Weight (KG)" id="birth-weight-text-${fieldCount2}">
            </div>
            <div class="form-group col-md-2">
                <label for="remarks-${fieldCount}" class="form-label">Remarks</label>
                <textarea class="form-control" id="remarks-${fieldCount}" name="remarks[]" rows="1" required></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group col-md-2 d-flex align-items-end">
                <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount2}')">X</button>
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