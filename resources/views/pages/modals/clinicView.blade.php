<!-- Presenting Complaint -->
<div>
    @foreach ($total_surgery_types as $item)
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="complaint">Complaint: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="durations">Duration: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="severity">Severity: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="remarks">Remarks: {{$item->surgeryTypes}}</label>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="remarks">Remarks: {{$item->surgeryTypes}}</label>
        </div>
    </div>
    @endforeach
</div>

<!-- Current Pregnancy Hx -->
<div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="g-text">G: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="p-text">P: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="c-text">C: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="c-text">C: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="yrs-married-number">Married Year: {{$item->surgeryTypes}}</label>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="lmp-text">LMP: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="edd-text">EDD: {{$item->surgeryTypes}}</label>
            <label class="form-label" for="workingedd-text">Working EDD: {{$item->surgeryTypes}}</label>
        </div>
    </div>
</div>

<!-- Past Obstetric Hx -->
<div class="row">
    <div class="form-group col-md-12">
        <label class="form-label" for="year">Year: {{$item->surgeryTypes}}</label>
        <label class="form-label" for="poa">POA: {{$item->surgeryTypes}}</label>
        <label class="form-label" for="mod">MOD: {{$item->surgeryTypes}}</label>
        <label class="form-label" for="birth-weight">B.Weight: {{$item->surgeryTypes}}</label>
        <label for="pastObshx_remarks-${fieldCount}" class="form-label">Remarks: {{$item->surgeryTypes}}</label>
    </div>
    <div class="form-group col-md-12">
        <label for="pastObshx_remarks-${fieldCount}" class="form-label">Remarks: {{$item->surgeryTypes}}</label>
    </div>
</div>

<!-- Past Gyn Hx -->
<div class="row">
    <div>
        <!-- Menstrual HX & Contraception HX -->
        <div class="row">
            <!-- Menstrual HX -->
            <div class="form-group col-md-3">
                <label class="form-label" for="menstrualhx-label">Menstrual HX</label>
                <label class="form-label" for="menarche_at-number">Menarche at: {{$item->menarche_at}}</label>
            </div>

            <!-- Contraception HX -->
            <div class="form-group col-md-9">
                <label class="form-label" for="contraceptionhx-label">Contraception HX</label>
                <label class="form-label" for="amount-text">Types of Contraception: </label>
                @foreach ($total_surgery_types as $item)
                <label class="form-label" for="Contraception">{{$item->contraception}}</label>
                @endforeach
            </div>
        </div>

        <!-- Bleeding Pattern -->
        <label class="form-label" for="bleedingpattern-label">Bleeding Pattern</label>
        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-label" for="amount-text">Amount: {{$item->contraception}}</label>
                <label class="form-label" for="duration-text">Duration: {{$item->contraception}}</label>
                <label class="form-label" for="regularity-radio">Regularity: {{$item->contraception}}</label>
                <label class="form-label" for="aub-radio">AUB: {{$item->contraception}}</label>
            </div>
        </div>

        <!-- Subfertility -->
        <label class="form-label" style="margin-right: 10px;" for="default-label">Subfertility</label>
        if(subfertility === 'yes'){
        <!-- Past Gyn Hx -Subfertility Script -->
        if (specialtyGender === 'Male') {
        <div class="row">
            <!-- SFA -->
            @foreach ($total_surgery_types as $item)
            <label class="form-label" for="default-dropdown">SFA: {{$item->contraception}}</label>
            @endforeach
        </div>
        }elseif (specialtyGender === 'Female')
        <div class="row">
            <!-- Ovulatory Disorder -->
            @foreach ($total_surgery_types as $item)
            <label class="form-label" for="default-dropdown">Ovulatory Disorder: {{$item->contraception}}</label>
            @endforeach

            <!-- Tubal Factors -->
            @foreach ($total_surgery_types as $item)
            <label class="form-label" for="default-dropdown">Tubal Factors: {{$item->contraception}}</label>
            @endforeach

            <!-- Uterine -->
            @foreach ($total_surgery_types as $item)
            <label class="form-label" for="default-dropdown">Uterine: {{$item->contraception}}</label>
            @endforeach

        </div>
        }
        }else{
        //
        }
    </div>
</div>

<!-- Past Med Hx -->
<div class="row">
    @foreach ($total_surgery_types as $item)
    <div class="form-group col-md-4">
        <label class="form-label" for="pastmedhx">Past Med Hx: {{$item->contraception}}</label>
        <label for="pastMedHx_remarks" class="form-label">Remarks: {{$item->contraception}}</label>
    </div>
    @endforeach
</div>

<!-- Allergic Hx -->
<div class="row">
    <div class="form-group col-md-12">
        <label class="form-label" for="drugalergyhx">Drug Allergy Hx: {{$item->contraception}}</label>
        <label class="form-label" for="foodallergyhx">Food Allergy HX: {{$item->contraception}}</label>
        <label class="form-label" for="otherallergyhx-text">Other Allergy HX: {{$item->contraception}}</label>
    </div>
</div>

<!-- Other HX -->
<div class="row">
    <div class="form-group col-md-4">
        <label class="form-label" for="pastsurgeryhx-text">Past Surgery HX: {{$item->contraception}}</label>
        <label class="form-label" for="familyhx-text">Family HX: {{$item->contraception}}</label>
        <label class="form-label" for="socialhx-text">Social HX: {{$item->contraception}}</label>
    </div>
</div>

<!-- Gyn Examination -->
<div>
    <div class="row">
        <!-- General -->
        <div class="form-group col-md-6">
            <label class="form-label" for="general-dropdown">General: {{$item->contraception}}</label>
            <label class="form-label" for="gyn_thyroid-examination">Thyroid Examination: {{$item->contraception}}</label>
        </div>
    </div>

    <hr>
    <!-- Basic -->
    <div class="row">
        <div class="col-md-12">
            <label class="form-label" for="basic-label">Basic</label>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-label" for="height">Height (cm): {{$item->contraception}}</label>
                <label class="form-label" for="weight">Weight (kg): {{$item->contraception}}</label>
                <label class="form-label" for="bmi">BMI: {{$item->contraception}}</label>
                <label class="form-label" for="temperature">Temperature: {{$item->contraception}}</label>
            </div>
        </div>
    </div>

    <hr>
    <!-- CVS -->
    <div class="row">
        <div class="col-md-12">
            <label class="form-label" for="cvs-label">CVS</label>
        </div>
        <div class="row">
            <!-- Pulse Rate -->
            <div class="form-group col-md-3">
                <label class="form-label" for="pulse-rate">Pulse Rate: {{$item->contraception}}</label>
                <label class="form-label" for="rhythm-dropdown">Rhythm: {{$item->contraception}}</label>
                <label class="form-label" for="heartsound-dropdown">Heart Sound: {{$item->contraception}}</label>
                <label class="form-label" for="murmur-dropdown">Murmur: {{$item->contraception}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <!-- Blood Pressure -->
            <div class="form-group col-md-6">
                <label class="form-label" for="blood-pressure">Blood Pressure</label>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="systolic-input">Systolic (mmHg): {{$item->contraception}}</label>
                        <label class="form-label" for="diastolic-input">Diastolic (mmHg): {{$item->contraception}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <!-- RS (Respiratory System) -->
    <div class="form-group">
        <label class="form-label" for="breathsound-dropdown">RS (Respiratory System)</label>
        <div class="row">
            <!-- Breath Sound -->
            <div class="form-group col-md-6">
                <label class="form-label" for="breathsound-dropdown">Breath Sound: {{$item->contraception}}</label>
            </div>
        </div>
    </div>

    <hr>
    <!-- Abdominal Examination -->
    <div class="row">
        <div class="col-md-12">
            <label class="form-label" for="abdominalexamination-label">Abdominal Examination</label>
        </div>
        <div class="row">
            <!-- inspectionGyn -->
            <div class="form-group col-md-3">
                <label class="form-label" for="inspectionGyn-dropdown">Inspection: {{$item->contraception}}</label>
                <label class="form-label" for="percussion-dropdown">Percussion: {{$item->contraception}}</label>
                <label class="form-label" for="auscultator-dropdown">Auscultator: {{$item->contraception}}</label>
                <label class="form-label" for="auscultation-dropdown">Auscultation: {{$item->contraception}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <!-- Palpation -->
            <div class="form-group col-md-6">
                <label class="form-label" for="palpation-dropdown">Palpation</label>
                <div class="row">
                    <!-- Tenderness -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="tenderness-dropdown">Tenderness: {{$item->contraception}}</label>
                        <label class="form-label" for="size-number">Size: {{$item->contraception}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <!-- Pelvic Examination -->
    <div class="form-group">
        <label class="form-label" for="pelvicexamination-label">Pelvic Examination</label>
        <div class="row">
            <!-- Inspection + Speculum -->
            <div class="form-group col-md-6">
                <label class="form-label" for="inspectionSpeculum-dropdown">Inspection + Speculum: {{$item->contraception}}</label>
                <label class="form-label" for="stressincontinence-dropdown">Stress Incontinence: {{$item->contraception}}</label>
            </div>
        </div>
    </div>

    <hr>
    <!-- Bimanual VE -->
    <div class="form-group">
        <label class="form-label" for="bimanualue-label">Bimanual VE</label>
        <div class="row">
            <!-- Cervical Consistency -->
            <div class="form-group col-md-3">
                <label class="form-label" for="cervical-dropdown">Cervical Consistency: {{$item->contraception}}</label>
                <label class="form-label" for="os-dropdown">OS: {{$item->contraception}}</label>
                <label class="form-label" for="polyp-ulcer-dropdown">Polyp/Ulcer: {{$item->contraception}}</label>
                <label class="form-label" for="cervical-motion-tenderness-dropdown">Cervical Motion Tenderness: {{$item->contraception}}</label>
            </div>
        </div>
    </div>

    <hr>
    <!-- Scan -->
    <div class="form-group">
        <label class="form-label" for="scan-label">Scan</label>
        <div>
            <!-- TAS -->
            <label class="form-label" for="tas-label">TAS</label>
            <div>
                <!-- Uterus -->
                <div class="row">
                    <label class="form-label" for="uterus-tas-label">Uterus</label>
                    <div class="row">
                        <!-- Endometrium -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="endometrium-tas">Endometrium: {{$item->contraception}}</label>
                            <label class="form-label" for="fiber-tas-dropdown">Fiber: {{$item->contraception}}</label>
                            <label class="form-label" for="size-tas">Size: {{$item->contraception}}</label>
                            <label class="form-label" for="direction-tas-dropdown">Direction: {{$item->contraception}}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Average -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="average-tas-dropdown">Average: {{$item->contraception}}</label>
                        <label class="form-label" for="adnexialmass-tas-dropdown">Adnexial Mass: {{$item->contraception}}</label>
                        <label class="form-label" for="bladder-tas-dropdown">Bladder: {{$item->contraception}}</label>
                        <label class="form-label" for="free_fluid-tas-dropdown">Free fluid: {{$item->contraception}}</label>
                    </div>
                </div>
            </div>

            <!-- TVS -->
            <label class="form-label" for="tvs-label">TVS</label>
            <div>
                <!-- Uterus -->
                <div class="row">
                    <label class="form-label" for="uterus-tvs-label">Uterus</label>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label" for="endometrium-tvs">Endometrium: {{$item->contraception}}</label>
                            <label class="form-label" for="fiber-tvs-dropdown">Fiber: {{$item->contraception}}</label>
                            <label class="form-label" for="size-tvs">Size: {{$item->contraception}}</label>
                            <label class="form-label" for="direction-tvs-dropdown">Direction: {{$item->contraception}}</label>
                        </div>
                    </div>
                </div>
                <!-- CX -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-label" for="cx-dropdown">CX</label>
                        <label class="form-label" for="polyps-tvs-dropdown">Polyps: {{$item->contraception}}</label>
                        <label class="form-label" for="echopic-tvs-dropdown">Echopic: {{$item->contraception}}</label>
                        <label class="form-label" for="adnexialmass-tvs-dropdown">Adnexial Mass: {{$item->contraception}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <!-- Others -->
    <div class="form-group">
        <label class="form-label" for="others-label">Others</label>
        <div class="row">
            <!-- Problem list -->
            <div class="form-group col-md-6">
                <label class="form-label" for="problist">Problem list: {{$item->contraception}}</label>
                <label class="form-label" for="medicalhx-dropdown">Medical MX: {{$item->contraception}}</label>
                <label class="form-label" for="surgeryhx-dropdown">Surgery MX: {{$item->contraception}}</label>
            </div>
        </div>
    </div>
</div>

<!-- Obs Examination -->
<div>
    <div data-acc-content>
        <div class="my-3">
            <div>
                <div class="row">
                    <!-- General -->
                    <div class="form-group col-md-3">
                        <label class="form-label" for="general">General</label>
                        <label class="form-label" for="bp">BP: {{$item->contraception}}</label>
                        <label class="form-label" for="pr">PR: {{$item->contraception}}</label>
                        <label class="form-label" for="thyroidexamination">Thyroid Examination: {{$item->contraception}}</label>
                    </div>
                </div>

                <!-- Abdominal Examination -->
                <label class="form-label" for="abdominalexamination-label">Abdominal Examination</label>
                <div>
                    <div class="row">
                        <!-- inspectionObs -->
                        <div class="form-group col-md-4">
                            <label class="form-label" for="inspectionObs">Inspection: {{$item->contraception}}</label>
                            <label class="form-label" for="sfh">SFH (cm): {{$item->contraception}}</label>
                            <label class="form-label" for="lie">Lie: {{$item->contraception}}</label>
                            <label class="form-label" for="position">Position: {{$item->contraception}}</label>
                            <label class="form-label" for="engagement">Engagement: {{$item->contraception}}</label>
                            <label class="form-label" for="fhs">FHS: {{$item->contraception}}</label>
                        </div>
                    </div>
                </div>

                <!-- VE/Modified Bishops Score -->
                <label class="form-label" for="ve-modifiedbishops-score-label">VE/Modified Bishops Score</label>
                <label class="form-label" id="score-label">SCORE: 0</label>
                <div>
                    <div class="row">
                        <!-- Cervical Dilatation -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="cervicaldilatation">Cervical Dilatation: {{$item->contraception}}</label>
                            <label class="form-label" for="cervicalconsistency">Cervical Consistency: {{$item->contraception}}</label>
                            <label class="form-label" for="cervical_canel">Cervical Canel: {{$item->contraception}}</label>
                            <label class="form-label" for="cervicalposition">Cervical Position: {{$item->contraception}}</label>
                            <label class="form-label" for="station">Station of Presenting Part: {{$item->contraception}}</label>
                        </div>
                    </div>
                </div>

                <!-- Scan OBS -->
                <label class="form-label" for="scan-label">Scan</label>
                <div>
                    <!-- TAS OBS -->
                    <label class="form-label" for="tas-label">TAS</label>
                    <div class="row">
                        <!-- Fetus -->
                        <div class="form-group col-md-3">
                            <label class="form-label" for="fetus-dropdown">Fetus: {{$item->contraception}}</label>
                            <label class="form-label" for="precentation-dropdown">Precentation: {{$item->contraception}}</label>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="bpd-text">BPD: {{$item->contraception}}</label>
                                    <label class="form-label" for="ac-text">AC: {{$item->contraception}}</label>
                                    <label class="form-label" for="hc-text">HC: {{$item->contraception}}</label>
                                    <label class="form-label" for="fl-text">FL: {{$item->contraception}}</label>
                                    <label class="form-label" for="crl-text">CRL: {{$item->contraception}}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TVS OBS -->
                    <label class="form-label" for="tas-label">TVS</label>
                    <div class="row">
                        <!-- Placental Position -->
                        <div class="form-group col-md-2">
                            <label class="form-label" for="placental_position-text">Placental Position: {{$item->contraception}}</label>
                            <label class="form-label" for="efw-text">EFW: {{$item->contraception}}</label>
                            <label class="form-label" for="liquor-radio">Liquor: {{$item->contraception}}</label>
                            <label class="form-label" for="dopplier-dropdown">UT.A.Dopplier: {{$item->contraception}}</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Management & Ix -->
<div>
    <label class="form-label" for="ix-label">Ix</label>
    <div>
        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-label" for="ctg-dropdown">CTG: {{$item->contraception}}</label>
                <label class="form-label" for="tas-text">TAS: {{$item->contraception}}</label>
            </div>
        </div>
        <!-- FBC -->
        <div class="row">
            <label class="form-label" for="fbc-label">FBC</label>
            <div class="row">
                <div class="form-group col-ml-12">
                    <div class="d-flex">
                        <div class="form-group col-md-3">
                            <label class="form-label" for="hb-number">HB(g/dl): {{$item->contraception}}</label>
                            <label class="form-label" for="plt-number">PLT(/mm): {{$item->contraception}}</label>
                            <label class="form-label" for="wbc-number">WBC(/mm): {{$item->contraception}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="form-label" for="crp-number">CRP: {{$item->contraception}}</label>
                    <label class="form-label" for="urinefullreport-dropdown">Urine Full Report: {{$item->contraception}}</label>
                    <label class="form-label" for="ogtt/bss-dropdown">OGTT/BSS: {{$item->contraception}}</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Plan -->
    <label class="form-label" for="plan-label">Management Plan</label>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="antibiotics-dropdown">Antibiotics: {{$item->contraception}}</label>
            <label class="form-label" for="plandelivery-dropdown">Plan Delivery: {{$item->contraception}}</label>
        </div>
    </div>
</div>