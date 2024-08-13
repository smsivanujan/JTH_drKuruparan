<h6 class="mb-0" data-acc-title>Past Gyn Hx</h6>
<div data-acc-content>
    <div class="my-3">
        <div>
            <label class="form-label" for="menstrualhx-label">Menstrual HX</label>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="form-label" for="menarcheat-number">Menarche at (years)</label>
                    <input type="number" name="age" class="form-control" placeholder="Age in years">
                </div>
            </div>
            <label class="form-label" for="bleedingpattern-label">Bleeding Pattern</label>
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="amount-text">Amount</label>
                    <input type="text" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="duration-text">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="Duration">
                </div>
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
            <label class="form-label" for="default-label">Contraception HX</label>
            <div class="row">
                <div class="form-group">
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
                <label class="form-label" style="margin-right: 10px;" for="default-label">Subfertility</label>
                <div class="form-group">
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
                    <div id="newRow">
                        <!-- Gyn -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>