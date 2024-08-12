@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="search-box">Patient</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search-box" placeholder="Search for...">
                        <button class="btn btn-primary text-white">Search!</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table  border text-nowrap text-md-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>BHI</th>
                            <th>PHNS</th>
                            <th>NIC</th>
                            <th>Contact</th>
                            <th>Consultant</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Power Pandi</td>
                            <td>OS/17/25/2024</td>
                            <td>2012458895</td>
                            <td>960870735V</td>
                            <td>0768738887</td>
                            <td>Sirisgantha</td>
                            <td>2000-10-12</td>
                            <td>27</td>
                            <td>Male</td>
                            <td>Kasthuri road, Karuvepilai, Jaffna</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Row-->
<div class="row ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="card-title">
                    Patient's Clinical Record
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label" for="category-dropdown">Category</label>
                        <select name="category" class="form-control form-select" id="category-dropdown" data-bs-placeholder="Select Category" onchange="changeCategory()">
                            <option label="Choose one" disabled selected></option>
                            <option value="GYN">GYN</option>
                            <option value="OBS">OBS</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="form" action="{{ route('complaints.store') }}" method="POST">
                    @csrf
                    <div class="list-group">
                        <!-- Presenting Complaint -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0 me-2" data-acc-title>Presenting Complaint</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div id="complaint-form">
                                            <div id="complaint-fields">
                                                <!-- dynamic fields will be added here -->
                                            </div>
                                        </div>
                                        <button class="btn btn-success mb-3" type="button" id="add-field-btn">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Complaint
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Pregnancy Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Current Pregnancy Hx</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div class="row">
                                            <div class="form-group col-md-1">
                                                <label class="form-label" for="g-text">G</label>
                                                <input type="number" name="g" class="form-control" placeholder="G">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="form-label" for="p-text">P</label>
                                                <input type="number" name="p" class="form-control" placeholder="P">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="form-label" for="c-text">C</label>
                                                <input type="number"  name="c" class="form-control" placeholder="C">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="form-label" for="yrs-married-number">Married Year</label>
                                                <input type="number" name="married_year" class="form-control" placeholder="Years (YYYY)" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="form-label" for="lmp-text">LMP</label>
                                                <input type="date" name="lmp" class="form-control" placeholder="LMP">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="form-label" for="edd-text">EDD</label>
                                                <input type="date" name="edd" class="form-control" placeholder="EDD">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="form-label" for="workingedd-text">Working EDD</label>
                                                <input type="date" name="working_edd" class="form-control" placeholder="Working EDD">
                                            </div>
                                        </div>
                                        <div class="row">
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Past Obstetric Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Past Obstetric Hx</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div id="complaint-form">
                                            <div id="pastobs-fields" class="row">
                                                <!-- Initial form fields -->
                                            </div>
                                        </div>
                                        <button class="btn btn-success mb-3" type="button" id="add-field-btn2">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Past Obs
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Past Gyn Hx -->
                        <div class="list-group-item py-4" data-acc-step>
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
                        </div>

                        <!-- Past Med Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Past Med Hx</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div id="complaint-form">
                                            <div id="pastmedhx-fields" class="row">
                                                <!-- Initial form fields -->
                                            </div>
                                        </div>
                                        <button class="btn btn-success mb-3" type="button" id="add-field-btn3">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Past Med Hx
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Allergic Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Allergic Hx</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="drugalergyhx-dropdown">Drug Allergy Hx</label>
                                                <select name="drugalergyhx[]" class="form-control select2-style1" data-placeholder="Select Drug Allergy Hx" multiple>
                                                    <option label="Choose one" disabled></option>
                                                    <option value="Other Diagnostic Procedures">Other Diagnostic Procedures</option>
                                                    <option value="Preventive Imunisations/Medications">Preventive Imunisations/Medications</option>
                                                    <option value="Observe/Educate/Advice/Diet">Observe/Educate/Advice/Diet</option>
                                                    <option value="Consult with Primary Care Provider">Consult with Primary Care Provider</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="foodallergyhx-text">Food Allergy HX</label>
                                                <input type="text" name ="foodallergyhx" class="form-control" placeholder="Food Allergy HX">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="otherallergyhx-text">Other Allergy HX</label>
                                                <input type="text" name="otherallergyhx" class="form-control" placeholder="Other Allergy HX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Other HX -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Other HX</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="pastsurgeryhx-text">Past Surgery HX</label>
                                            <textarea id="pastsurgeryhx" name="pastsurgeryhx" class="form-control" rows="4" placeholder="Past Surgery HX"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="familyhx-text">Family HX</label>
                                            <textarea id="familyhx" name="familyhx" class="form-control" rows="4" placeholder="Family HX"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="socialhx-text">Social HX</label>
                                            <textarea id="socialhx" name="socialhx" class="form-control" rows="4" placeholder="Social HX"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gyn Examination -->
                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Gyn Examinationx</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="general-dropdown">General</label>
                                                <div class="selectgroup selectgroup-pills">
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="generalGyn[]" value="Pallor" class="selectgroup-input">
                                                        <span class="selectgroup-button">Pallor</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="generalGyn[]" value="Odema" class="selectgroup-input">
                                                        <span class="selectgroup-button">Odema</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="height">Height (cm)</label>
                                                <input type="number" name="height" id="height" class="form-control" placeholder="cm" oninput="calculateBMI()">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="weight">Weight (kg)</label>
                                                <input type="number"  name="weight" id="weight" class="form-control" placeholder="kg" oninput="calculateBMI()">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="bmi">BMI</label>
                                                <input type="number"  name="bmi" id="bmi" class="form-control" placeholder="BMI" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="temperature">Temperature</label>
                                                <input type="number"  name="temperature" class="form-control" placeholder="Celcious">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="system-checkbox">System</label>
                                                <div class="selectgroup selectgroup-pills">
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="system[]" value="CVS" class="selectgroup-input">
                                                        <span class="selectgroup-button">CVS</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="system[]" value="RS" class="selectgroup-input">
                                                        <span class="selectgroup-button">RS</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="system[]" value="CNS" class="selectgroup-input">
                                                        <span class="selectgroup-button">CNS</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="form-label" for="cvs-label">CVS</label>
                                        <div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-label" for="pulserate-text">Pulse Rate</label>
                                                    <input type="text" name="pulse_rate" id="pulse-rate" class="form-control" placeholder="Pulse Rate">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label" for="rhythm-dropdown">Rhythm</label>
                                                    <select name="rhythm" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Irregular">Irregular</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="bloodpressure-text">Blood Pressure</label>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-group col-md-6 d-flex align-items-center">
                                                            <label class="form-label" for="systolic-number">Systolic (mmHg)</label>
                                                            <input type="number" name="systolic" class="form-control" id="systolic-input" placeholder="Systolic (mmHg)">
                                                        </div>
                                                        <div class="form-group col-md-6 d-flex align-items-center">
                                                            <label class="form-label" for="diastolic-number">Diastolic (mmHg)</label>
                                                            <input type="number" name="diastolic" class="form-control" id="diastolic-input" placeholder="Diastolic (mmHg)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-label" for="heartsound-dropdown">Heart Sound</label>
                                                    <select name="heart_sound" class="form-control form-select" id="heartsound-dropdown" data-bs-placeholder="Select Heart Sound">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Abnormal">Abnormal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label" for="memor-dropdown">Memor</label>
                                                    <select name="memor" class="form-control form-select" id="memor-dropdown" data-bs-placeholder="Select Memor">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Present">Present</option>
                                                        <option value="Absent">Absent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label" for="rs-label">RS</label>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="breathsound-dropdown">Breath Sound</label>
                                                <select name="breath_sound" class="form-control form-select" id="breathsound-dropdown" data-bs-placeholder="Select Breath Sound">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Abnormal">Abnormal</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="thyroidexamination-radio">Thyroid Examination</label>
                                                <div style="display: flex; align-items: center; gap: 10px;">
                                                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked4">
                                                        <input name="rdio-primary4" type="radio" id="rdio-primary-unchecked4" value="Enlarged" style="margin-right: 5px;">
                                                        <span>Enlarged</span>
                                                    </label>
                                                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary4">
                                                        <input name="rdio-primary4" type="radio" id="rdio-primary4" value="Not Enlarged" style="margin-right: 5px;">
                                                        <span>Not Enlarged</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="abdexamination-dropdown">ABD Examination</label>
                                                <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Ins">Ins</option>
                                                    <option value="Palp">Palp</option>
                                                    <option value="Per">Per</option>
                                                    <option value="Ausca">Ausca</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label class="form-label" for="pelvicexamination-label">Pelvic Examination</label>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="inspectionSpeculum-dropdown">Inspection + Speculum</label>
                                                <select name="inspectionSpeculum" class="form-control form-select" id="inspectionSpeculum-dropdown" data-bs-placeholder="Select inspection + Speculum">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Vulval Area Mass">Vulval Area Mass</option>
                                                    <option value="Vulval Area Ulcers">Vulval Area Ulcers</option>
                                                    <option value="Vulval Area Discharge/Blood">Vulval Area Discharge/Blood</option>
                                                    <option value="Lumb At Vulva/Prolapse">Lumb At Vulva/Prolapse</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="stressincontinence-dropdown">Stress Incontinence</label>
                                                <select name="stress_incontinence" class="form-control form-select" id="stressincontinence-dropdown" data-bs-placeholder="Select Stress Incontinence">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="+ (ve)">+ (ve)</option>
                                                    <option value="- (ve)">- (ve)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label class="form-label" for="bimanualue-label">Bimanual VE</label>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="cervical-dropdown">Cervical Consistency</label>
                                                <select name="cervical" class="form-control form-select" id="cervical-dropdown" data-bs-placeholder="Select Cervical Consistency">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Firm">Firm</option>
                                                    <option value="Soft">Soft</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="os-dropdown">OS</label>
                                                <select name="os" class="form-control form-select" id="os-dropdown" data-bs-placeholder="Select OS">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Open">Open</option>
                                                    <option value="Closed">Closed</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="polyp/ulcer-dropdown">Polyp/Ulcer</label>
                                                <select name="polyp/ulcer" class="form-control form-select" id="polyp/ulcer-dropdown" data-bs-placeholder="Select Polyp/Ulcer">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Suspizions">Suspizions</option>
                                                    <option value="Pathological">Pathological</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="cervicalmotiontenderness-dropdown">Cervical Motion Tenderness</label>
                                                <select name="cervicalmotiontenderness" class="form-control form-select" id="cervicalmotiontenderness-dropdown" data-bs-placeholder="Select Cervical Motion Tenderness">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Present">Present</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label class="form-label" for="uterus-label">Uterus</label>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="direction-dropdown">Direction</label>
                                                <select name="direction" class="form-control form-select" id="direction-dropdown" data-bs-placeholder="Select Direction">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Anteverted">Anteverted</option>
                                                    <option value="Retroverted">Retroverted</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="adnexialmass-dropdown">Adnexial Mass</label>
                                                <select name="adnexialmass" class="form-control form-select" id="adnexialmass-dropdown" data-bs-placeholder="Select Adnexial Mass">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Present in Both">Present in Both</option>
                                                    <option value="Present in Right">Present in Right</option>
                                                    <option value="Present in Left">Present in Left</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label class="form-label" for="scan-label">Scan</label>
                                        <div class="row">
                                            <!-- TAS Finder Section -->
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="tasfinder-label">TAS Finder</label>
                                                <label class="form-label" for="tasuterus-text">Uterus</label>
                                                <input type="text" name="tas_uterus" id="tas-uterus" class="form-control" placeholder="cm">
                                            </div>

                                            <!-- TVS Finder Section -->
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="tvsfinder-label">TVS Finder</label>
                                                <label class="form-label" for="tvsuterus-text">Uterus</label>
                                                <input type="text" name="tvs_uterus" id="tvs-uterus" class="form-control" placeholder="Uterus">

                                                <label class="form-label" for="endometrium-text">Endometrium</label>
                                                <input type="text" name="endometrium" id="endometrium" class="form-control" placeholder="Endometrium">

                                                <label class="form-label" for="adnexialmass-text">Adnexial Mass</label>
                                                <input type="text" name="adnexial_mass_scan" id="adnexial-mass" class="form-control" placeholder="Adnexial Mass">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="problist-text">Problist</label>
                                                <textarea id="problist" name="problist" class="form-control" rows="4" placeholder="Enter Problist"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="medicalhx-dropdown">Medical HX</label>
                                                <select name="medical_hx" class="form-control form-select" id="medicalhx-dropdown" data-bs-placeholder="Select Medical HX">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Antibiotics">Antibiotics</option>
                                                    <option value="Analogeis">Analogeis</option>
                                                    <option value="Tranceme">Tranceme</option>
                                                    <option value="Meten">Meten</option>
                                                    <option value="Contracephon">Contracephon</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="surgeryhx-dropdown">Surgery HX</label>
                                                <select name="surgery_hx" class="form-control form-select" id="surgeryhx-dropdown" data-bs-placeholder="Select Surgery HX">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Open Sx">Open Sx</option>
                                                    <option value="Lapcroscope Sx">Lapcroscope Sx</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-4" data-acc-step>
                            <h6 class="mb-0" data-acc-title>Obs Examination</h6>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="general-checkbox">General</label>
                                                <div class="selectgroup selectgroup-pills">
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="generalObs[]" value="Pallor" class="selectgroup-input">
                                                        <span class="selectgroup-button">Pallor</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="generalObs[]" value="Odema" class="selectgroup-input">
                                                        <span class="selectgroup-button">Odema</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="bp-number">BP</label>
                                                <input type="number" name="bp" class="form-control" placeholder="BP">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="pr-number">PR</label>
                                                <input type="number" name="pr" class="form-control" placeholder="PR">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="thyroidexamination-radio">Thyroid Examination</label>
                                                <div style="display: flex; align-items: center; gap: 10px;">
                                                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked5">
                                                        <input name="rdio-primary5" type="radio" id="rdio-primary-unchecked5" value="Enlarged" style="margin-right: 5px;">
                                                        <span>Enlarged</span>
                                                    </label>
                                                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary5">
                                                        <input name="rdio-primary5" type="radio" id="rdio-primary5" value="Not Enlarged" style="margin-right: 5px;">
                                                        <span>Not Enlarged</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label" for="abdominalexamination-label">Abdominal Examination</label>
                                        <div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="inspection-dropdown">Inspection</label>
                                                    <select name="inspection" class="form-control form-select" id="inspection-dropdown" data-bs-placeholder="Select Inspection">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Linea nigra">Linea nigra</option>
                                                        <option value="Striae">Striae</option>
                                                        <option value="Flat Umblicus">Flat Umblicus</option>
                                                        <option value="Surgical Scar">Surgical Scar</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="sfh-number">SFH (cm)</label>
                                                    <input type="number" name="sfh" class="form-control" placeholder="cm">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="precentation-dropdown">Precentation</label>
                                                    <select name="precentation" class="form-control form-select" id="precentation-dropdown" data-bs-placeholder="Select Precentation">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Cephalic P/C">Cephalic P/C</option>
                                                        <option value="Breech P/C">Breech P/C</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="lie-dropdown">Lie</label>
                                                    <select name="lie" class="form-control form-select" id="lie-dropdown" data-bs-placeholder="Select Lie">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Longitudinal">Longitudinal</option>
                                                        <option value="Transverse">Transverse</option>
                                                        <option value="Oblique">Oblique</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="position-dropdown">Position</label>
                                                    <select name="position" class="form-control form-select" id="position-dropdown" data-bs-placeholder="Select Position">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="LOA">LOA</option>
                                                        <option value="LOP">LOP</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="efw-text">EFW (Kg)</label>
                                                    <input type="text" name="efw" class="form-control" placeholder="Kg">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="engagement-radio">Engagement</label>
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked6">
                                                            <input name="rdio-primary6" type="radio" id="rdio-primary-unchecked6" value="Engaged" style="margin-right: 5px;">
                                                            <span>Engaged</span>
                                                        </label>
                                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary6">
                                                            <input name="rdio-primary6" type="radio" id="rdio-primary6" value="Not Engaged" style="margin-right: 5px;">
                                                            <span>Not Engaged</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="liquor-radio">Liquor</label>
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked7">
                                                            <input name="rdio-primary7" type="radio" id="rdio-primary-unchecked7" value="Adequate" style="margin-right: 5px;">
                                                            <span>Adequate</span>
                                                        </label>
                                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary7">
                                                            <input name="rdio-primary7" type="radio" id="rdio-primary7" value="Not Adequate" style="margin-right: 5px;">
                                                            <span>Not Adequate</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="fhs-radio">FHS</label>
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked8">
                                                            <input name="rdio-primary8" type="radio" id="rdio-primary-unchecked8" value="Present" style="margin-right: 5px;">
                                                            <span>Present</span>
                                                        </label>
                                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary8">
                                                            <input name="rdio-primary8" type="radio" id="rdio-primary8" value="Absent" style="margin-right: 5px;">
                                                            <span>Absent</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label" for="ve/modihiedbishopsscore-label">VE/Modihied Bishops Score</label>
                                        <label class="form-label" for="score-label">SCORE: 125</label>
                                        <div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="cervicaldilatation-text">Cervical Dilatation (Cm)</label>
                                                    <input type="text" name="cervical_dilatation" class="form-control" placeholder="cm">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="effacement-text">Effacement (%)</label>
                                                    <input type="text" name="effacement" class="form-control" placeholder="(%)">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="station-dropdown">Station</label>
                                                    <select name="station" class="form-control form-select" id="station-dropdown" data-bs-placeholder="Select Station">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="-2">-2</option>
                                                        <option value="-1">-1</option>
                                                        <option value="0">0</option>
                                                        <option value="+1">+1</option>
                                                        <option value="+2">+2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="cervicalconsistency-dropdown">Cervical Consistency</label>
                                                    <select name="cervical_consistency" class="form-control form-select" id="cervicalconsistency-dropdown" data-bs-placeholder="Select Cervical Consistency">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Firm">Firm</option>
                                                        <option value="Soft">Soft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="cervicalposition-dropdown">Cervical Position</label>
                                                    <select name="cervical_position" class="form-control form-select" id="cervicalposition-dropdown" data-bs-placeholder="Select Cervical Position">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Anterior">Anterior</option>
                                                        <option value="Positerior">Positerior</option>
                                                        <option value="Central">Central</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label" for="ix-label">IX</label>
                                        <div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-label" for="ctg-dropdown">CTG</label>
                                                    <select name="ctg" class="form-control form-select" id="ctg-dropdown" data-bs-placeholder="Select CTG">
                                                        <option label="Choose one" disabled selected></option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Suspizions">Suspizions</option>
                                                        <option value="Pathological">Pathological</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label class="form-label" for="tas-text">TAS</label>
                                                    <input type="description" name="tas" class="form-control" id="tas-input" placeholder="TAS">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="form-label" for="fbc-label">FBC</label>
                                                <div>
                                                    <div class="form-group col-ml-12">
                                                        <div class="d-flex">
                                                            <div class="form-group col-md-3">
                                                                <label class="form-label" for="hb-number">HB(g/dl)</label>
                                                                <input type="number" name="hb" class="form-control" id="hb-input" placeholder="HB(g/dl)">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="form-label" for="plt-number">PLT(/mm)</label>
                                                                <input type="number" name="plt" class="form-control" id="plt-input" placeholder="PLT(/mm)">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="form-label" for="wbc-number">WBC(/mm)</label>
                                                                <input type="number" name="wbc" class="form-control" id="wbc-input" placeholder="WBC(/mm)">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="crp-number">CRP</label>
                                                        <input type="number" name="crp" class="form-control" id="crp-input" placeholder="CRP">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="urinefullreport-dropdown">Urine Full Report</label>
                                                        <select name="urine_full_report" class="form-control form-select" id="urinefullreport-dropdown" data-bs-placeholder="Select Urine Full Report">
                                                            <option label="Choose one" disabled selected></option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Abnormal">Abnormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="ohtt/bss-dropdown">OHTT/BSS</label>
                                                        <select name="ohtt/bss" class="form-control form-select" id="ohtt/bss-dropdown" data-bs-placeholder="Select ohtt/bss">
                                                            <option label="Choose one" disabled selected></option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Abnormal">Abnormal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label" for="plan-label">Plan</label>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="antibiotics-dropdown">Antibiotics</label>
                                                <select name="antibiotics" class="form-control form-select" id="antibiotics-dropdown" data-bs-placeholder="Select Antibiotics">
                                                    <option label="Choose one" disabled selected></option>
                                                    <option value="Antibiotics">Antibiotics</option>
                                                    <option value="Analogeis">Analogeis</option>
                                                    <option value="DM Mx">DM Mx</option>
                                                    <option value="DM Mx">BP Mx</option>
                                                    <option value="Steroids">Steroids</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="plandelivery-dropdown">Plan Delivery</label>
                                                <select name="plan_delivery" class="form-control form-select" id="plandelivery-dropdown" data-bs-placeholder="Select Plan Delivery">
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
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Row -->

@endsection

@section('modal')

@endsection

@section('scripts')

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('a[href="#finish"]').addEventListener('click', function(event) {
            event.preventDefault();

            // Collect data from the dynamic fields
            const complaints = Array.from(document.querySelectorAll('[name="complaint[]"]')).map(el => el.value);
            const durations = Array.from(document.querySelectorAll('[name="duration[]"]')).map(el => el.value);
            const severities = Array.from(document.querySelectorAll('[name="severity[]"]')).map(el => el.value);
            const remarks = Array.from(document.querySelectorAll('[name="remarks[]"]')).map(el => el.value);

            // Prepare data to send
            const data = {
                complaints,
                durations,
                severities,
                remarks,
                _token: document.querySelector('meta[name="csrf-token"]').content // CSRF token
            };

            // Send data using fetch
            fetch('{{ route("complaints.store") }}', { // Use the named route here
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': data._token
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Data submitted successfully!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error submitting data: ' + error.message);
                });
        });
    });
</script>




@endsection