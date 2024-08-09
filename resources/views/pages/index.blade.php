@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <!-- <div>
            <h1 class="page-title">Dashboard</h1>
        </div> -->
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
                        <label class="form-label" for="Category-dropdown">Category</label>
                        <select name="specialty" class="form-control form-select" id="Category-dropdown" data-bs-placeholder="Select Category" onchange="changeCategory()">
                            <option label="Choose one" disabled selected></option>
                            <option value="gyn">GYN</option>
                            <option value="obs">OBS</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="wizard3">

                    <h4>Presenting Complaint</h4>
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

                    <h4>Current Pregnancy Hx</h4>
                    <div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="form-label" for="g-text">G</label>
                                <input type="number" class="form-control" placeholder="G">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label" for="p-text">P</label>
                                <input type="number" class="form-control" placeholder="P">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label" for="c-text">C</label>
                                <input type="number" class="form-control" placeholder="C">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="yrs-married-dropdown">Married Year</label>
                                <input type="number" class="form-control" placeholder="Years (YYYY)" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="LMP-text">LMP</label>
                                <input type="date" class="form-control" placeholder="LMP">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="EDD-text">EDD</label>
                                <input type="date" class="form-control" placeholder="EDD">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="Working-EDD-text">Working EDD</label>
                                <input type="date" class="form-control" placeholder="Working EDD">
                            </div>
                        </div>
                    </div>

                    <h4>Past Obstetric Hx</h4>
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

                    <h4>Past Gyn Hx</h4>
                    <div>
                        <label class="form-label" for="default-dropdown">Menstrual HX</label>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="minarcheate">Menarche at (years)</label>
                                <input type="number" class="form-control" placeholder="age in years">
                            </div>
                        </div>
                        <label class="form-label" for="default-dropdown">Bleeding Pattern</label>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="form-label" for="amount">Amount</label>
                                <input type="text" class="form-control" placeholder="amount">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="duration">Duration</label>
                                <input type="text" class="form-control" placeholder="duration">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="aub1">Regularity</label>
                                <div>
                                    <label class="rdiobox" for="rdio-primary-unchecked1" style="margin-right: 10px;">
                                        <input name="rdio-primary1" type="radio" class="radio-primary" id="rdio-primary-unchecked1">
                                        <span>Regular</span>
                                    </label>
                                    <label class="rdiobox" for="rdio-primary1" style="margin-right: 10px;">
                                        <input checked name="rdio-primary1" type="radio" class="radio-primary" id="rdio-primary1">
                                        <span>Irregular</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="aub2">AUB</label>
                                <div>
                                    <label class="rdiobox" for="rdio-primary-unchecked2" style="margin-right: 10px;">
                                        <input name="rdio-primary2" type="radio" class="radio-primary" value="Yes" id="rdio-primary-unchecked2">
                                        <span>Yes</span>
                                    </label>
                                    <label class="rdiobox" for="rdio-primary2" style="margin-right: 10px;">
                                        <input checked name="rdio-primary2" type="radio" class="radio-primary" value="No" id="rdio-primary2">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <label class="form-label" for="default-dropdown">Contraception HX</label>
                        <div class="row">
                            <div class="form-group">
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="OCP" class="selectgroup-input">
                                        <span class="selectgroup-button">OCP</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="DMPA" class="selectgroup-input">
                                        <span class="selectgroup-button">DMPA</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="IUD" class="selectgroup-input">
                                        <span class="selectgroup-button">IUD</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="IUCD" class="selectgroup-input">
                                        <span class="selectgroup-button">IUCD</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="Condom" class="selectgroup-input">
                                        <span class="selectgroup-button">Condom</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="Others" class="selectgroup-input">
                                        <span class="selectgroup-button">Others</span>
                                    </label>
                                </div>
                            </div>
                            <label class="form-label" style="margin-right: 10px;" for="default-dropdown">Subfertility</label>
                            <div class="form-group">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked3">
                                        <input name="rdio-primary3" type="radio" id="rdio-primary-unchecked3" value="yes" style="margin-right: 5px;">
                                        <span>Yes</span>
                                    </label>
                                    <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary3">
                                        <input name="rdio-primary3" type="radio" id="rdio-primary3" value="no" style="margin-right: 5px;">
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

                    <h4>Past Med HX</h4>
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

                    <h4>Allergic Hx</h4>
                    <div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="drugalergyhx">Drug Allergy Hx</label>
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
                                <label class="form-label" for="c-text">Food Allergy HX</label>
                                <input type="text" class="form-control" placeholder="Food Allergy HX">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="c-text">Other Allergy HX</label>
                                <input type="text" class="form-control" placeholder="Other Allergy HX">
                            </div>
                        </div>
                    </div>

                    <h4>Other HX</h4>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label" for="p-text">Past Surgery HX</label>
                            <input type="textarea" class="form-control" placeholder="Past Surgery HX">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="c-text">Family HX</label>
                            <input type="textarea" class="form-control" placeholder="Family HX">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="c-text">Social HX</label>
                            <input type="textarea" class="form-control" placeholder="Social HX">
                        </div>
                    </div>

                    <h4>Gyn Examination</h4>
                    <div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="default-dropdown">General</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="Pallor" class="selectgroup-input">
                                        <span class="selectgroup-button">Pallor</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="Odema" class="selectgroup-input">
                                        <span class="selectgroup-button">Odema</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="form-label" for="height">Height (cm)</label>
                                <input type="number" id="height" class="form-control" placeholder="cm" oninput="calculateBMI()">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="weight">Weight (kg)</label>
                                <input type="number" id="weight" class="form-control" placeholder="kg" oninput="calculateBMI()">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="bmi">BMI</label>
                                <input type="number" id="bmi" class="form-control" placeholder="BMI" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="temperature">Temperature</label>
                                <input type="number" class="form-control" placeholder="Celcious">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="default-dropdown">System</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="CVS" class="selectgroup-input">
                                        <span class="selectgroup-button">CVS</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="RS" class="selectgroup-input">
                                        <span class="selectgroup-button">RS</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="CNS" class="selectgroup-input">
                                        <span class="selectgroup-button">CNS</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <label class="form-label" for="default-dropdown">CVS</label>
                        <div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="pulse-rate">Pulse Rate</label>
                                    <input type="text" id="pulse-rate" class="form-control" placeholder="Pulse Rate">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="rhythm">Rhythm</label>
                                    <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Regular">Regular</option>
                                        <option value="Irregular">Irregular</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="blood-pressure">Blood Pressure</label>
                                    <div class="d-flex align-items-center">
                                        <div class="form-group col-md-6 d-flex align-items-center">
                                            <label class="form-label" for="systolic-input">Systolic (mmHg)</label>
                                            <input type="number" name="systolic" class="form-control" id="systolic-input" placeholder="Systolic (mmHg)">
                                        </div>
                                        <div class="form-group col-md-6 d-flex align-items-center">
                                            <label class="form-label" for="diastolic-input">Diastolic (mmHg)</label>
                                            <input type="number" name="diastolic" class="form-control" id="diastolic-input" placeholder="Diastolic (mmHg)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="abdexamination-dropdown">Heart Sound</label>
                                    <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Other Diagnostic Procedures">Normal</option>
                                        <option value="Preventive Imunisations/Medications">Abnormal</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="abdexamination-dropdown">Memor</label>
                                    <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Other Diagnostic Procedures">Present</option>
                                        <option value="Preventive Imunisations/Medications">Absent</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="form-label" for="default-dropdown">RS</label>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="rhythm">Breath Sound</label>
                                <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="c-text">Thyroid Examination</label>
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
                                    <option value="Other Diagnostic Procedures">Ins</option>
                                    <option value="Preventive Imunisations/Medications">Palp</option>
                                    <option value="Observe/Educate/Advice/Diet">Per</option>
                                    <option value="Consult with Primary Care Provider">Ausca</option>
                                </select>
                            </div>
                        </div>

                        <label class="form-label" for="pelvicexamination">Pelvic Examination</label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="inspection-dropdown">Inspection + Speculum</label>
                                <select name="inspection" class="form-control form-select" id="inspection-dropdown" data-bs-placeholder="Select Inspection + Speculum">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Vulval Area Mass">Vulval Area Mass</option>
                                    <option value="Vulval Area Ulcers">Vulval Area Ulcers</option>
                                    <option value="Vulval Area Discharge/Blood">Vulval Area Discharge/Blood</option>
                                    <option value="Lumb At Vulval Prolapse">Lumb At Vulva/Prolapse</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="stressIncontinence-dropdown">Stress Incontinence</label>
                                <select name="inspection" class="form-control form-select" id="inspection-dropdown" data-bs-placeholder="Select Inspection + Speculum">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="+ (ve)">+ (ve)</option>
                                    <option value="- (ve)">- (ve)</option>
                                </select>
                            </div>
                        </div>

                        <label class="form-label" for="bimanualue-dropdown">Bimanual VE</label>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="cervical-dropdown">Cervical Consistency</label>
                                <select name="cervical" class="form-control form-select" id="cervical-dropdown" data-bs-placeholder="Select Cervical Consistency">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Hirm">Firm</option>
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
                                <label class="form-label" for="ohtt/blood-dropdown">Polyp/Ulcer</label>
                                <select name="ohtt/blood" class="form-control form-select" id="ohtt/blood-dropdown" data-bs-placeholder="Select OHTT/Blood">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Normal">Normal</option>
                                    <option value="Suspizions">Suspizions</option>
                                    <option value="Pathological">Pathological</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="ohtt/blood-dropdown">Cervical Motion Tenderness</label>
                                <select name="ohtt/blood" class="form-control form-select" id="ohtt/blood-dropdown" data-bs-placeholder="Select OHTT/Blood">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>
                        </div>

                        <label class="form-label" for="urine-dropdown">Uterus</label>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="form-label" for="urine-dropdown">Direction</label>
                                <select name="urine" class="form-control form-select" id="urine-dropdown" data-bs-placeholder="Select Urine">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Anteverted">Anteverted</option>
                                    <option value="Retroverted">Retroverted</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="crp-dropdown">Adnexial Mass</label>
                                <select name="fbc" class="form-control form-select" id="fbc-dropdown" data-bs-placeholder="Select FBC">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Not">Present in Both</option>
                                    <option value="Present">Present in Right</option>
                                    <option value="Present">Present in Left</option>
                                    <option value="Not">Absent</option>
                                </select>
                            </div>
                        </div>

                        <label class="form-label" for="scan-dropdown">Scan</label>
                        <div class="row">
                            <!-- TAS Finder Section -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tas-utreus">TAS Finder</label>
                                <label class="form-label" for="tas-utreus">Uterus</label>
                                <input type="text" id="tas-utreus" class="form-control" placeholder="cm">
                            </div>

                            <!-- TVS Finder Section -->
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tvs-utreus">TVS Finder</label>
                                <label class="form-label" for="tvs-utreus">Uterus</label>
                                <input type="text" id="tvs-utreus" class="form-control" placeholder="Uterus">

                                <label class="form-label" for="endometrium">Endometrium</label>
                                <input type="text" id="endometrium" class="form-control" placeholder="Endometrium">

                                <label class="form-label" for="adnexial-mass">Adnexial Mass</label>
                                <input type="text" id="adnexial-mass" class="form-control" placeholder="Adnexial Mass">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="height">Problist</label>
                                <textarea id="problist" name="problist" class="form-control" rows="4" placeholder="Enter Problist"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="height">Medical HX</label>
                                <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Antibiotics">Antibiotics</option>
                                    <option value="Analogeis">Analogeis</option>
                                    <option value="Tranceme">Tranceme</option>
                                    <option value="Meten">Meten</option>
                                    <option value="Contracephon">Contracephon</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="height">Surgery HX</label>
                                <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Antibiotics">Open Sx</option>
                                    <option value="Analogeis">Lapcroscope Sx</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h4>Obs Examination</h4>
                    <div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="default-dropdown">General</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="Pale" class="selectgroup-input">
                                        <span class="selectgroup-button">Pallor</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="value" value="Odema" class="selectgroup-input">
                                        <span class="selectgroup-button">Odema</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="g-text">BP</label>
                                <input type="number" class="form-control" placeholder="BP">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="g-text">PR</label>
                                <input type="number" class="form-control" placeholder="PR">
                            </div>
                        </div>

                        <label class="form-label" for="c-text">Thyroid Examination</label>
                        <div class="row">
                            <div class="form-group col-md-6">
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

                        <label class="form-label" for="default-dropdown">Abdominal Examination</label>
                        <div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="inspection-dropdown">Inspection</label>
                                    <select name="inspection" class="form-control form-select" id="inspection-dropdown" data-bs-placeholder="Select Inspection">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Linea nigra">Linea nigra</option>
                                        <option value="Striae">Striae</option>
                                        <option value="Umblicus">Flat Umblicus</option>
                                        <option value="Surgical Scar">Surgical Scar</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="g-text">SFH (cm)</label>
                                    <input type="number" class="form-control" placeholder="kg">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="abdexamination-dropdown">Precentation</label>
                                    <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Cephalic P/C">Cephalic P/C</option>
                                        <option value="Breech P/C">Breech P/C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="abdexamination-dropdown">Lie</label>
                                    <select name="abdexamination" class="form-control form-select" id="abdexamination-dropdown" data-bs-placeholder="Select ABD Examination">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Longitudinal">Longitudinal</option>
                                        <option value="Transverse">Transverse</option>
                                        <option value="Oblique">Oblique</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="default-dropdown">Position</label>
                                    <select name="inspection" class="form-control form-select" id="inspection-dropdown" data-bs-placeholder="Select Inspection">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Linea nigra">LOA</option>
                                        <option value="Striae">LOP</option>
                                        <option value="Umblicus">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="efw">EFW (Kg)</label>
                                    <input type="text" class="form-control" placeholder="EFW">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="c-text">Engagement</label>
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
                                    <label class="form-label" for="c-text">Liquor</label>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary-unchecked7">
                                            <input name="rdio-primary7" type="radio" id="rdio-primary-unchecked7" value="Engaged" style="margin-right: 5px;">
                                            <span>Adequate</span>
                                        </label>
                                        <label class="rdiobox" style="margin-right: 10px;" for="rdio-primary7">
                                            <input name="rdio-primary7" type="radio" id="rdio-primary7" value="Not Engaged" style="margin-right: 5px;">
                                            <span>Not Adequate</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="c-text">FHS</label>
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

                        <label class="form-label" for="ve/modihied bishops score">VE/Modihied Bishops Score</label>
                        <label class="form-label" for="g-text">SCORE: 125</label>
                        <div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="g-text">SCORE</label>
                                    <input type="number" class="form-control" placeholder="kg">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="cervicaldilatation">Cervical Dilatation (Cm)</label>
                                    <input type="text" class="form-control" placeholder="Cervical Dilatation">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="effacement">Effacement (%)</label>
                                    <input type="text" class="form-control" placeholder="effacement">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="Station-dropdown">Station</label>
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
                                    <label class="form-label" for="consistency-dropdown">Cervical Consistency</label>
                                    <select name="consistency" class="form-control form-select" id="consistency-dropdown" data-bs-placeholder="Select Cervical Consistency">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="Firm">Firm</option>
                                        <option value="Soft">Soft</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="Station-dropdown">Cervical Position</label>
                                    <select name="cervical" class="form-control form-select" id="cervical-dropdown" data-bs-placeholder="Select Cervical Position">
                                        <option label="Choose one" disabled selected></option>
                                        <option value="anterior">Anterior</option>
                                        <option value="positerior">Positerior</option>
                                        <option value="central">Central</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="form-label" for="ix-dropdown">IX</label>
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
                                    <label class="form-label" for="tas-dropdown">TAS</label>
                                    <input type="description" name="crp" class="form-control" id="crp-input" placeholder="CRP Value">
                                </div>
                            </div>
                            <div class="row">
                                <label class="form-label" for="fbc-input">FBC</label>
                                <div>
                                    <div class="form-group col-ml-12">
                                        <div class="d-flex">
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="gb-input">HB(g/dl)</label>
                                                <input type="number" name="gb" class="form-control" id="gb-input" placeholder="HB(g/dl)">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="plt-input">PLT(/mm)</label>
                                                <input type="number" name="plt" class="form-control" id="plt-input" placeholder="PLT(/mm)">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="wbc-input">WBC(/mm)</label>
                                                <input type="number" name="wbc" class="form-control" id="wbc-input" placeholder="WBC(/mm)">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="crp-input">CRP</label>
                                        <input type="number" name="crp" class="form-control" id="crp-input" placeholder="CRP Value">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="urine-dropdown">Urine Full Report</label>
                                        <select name="urine" class="form-control form-select" id="urine-dropdown" data-bs-placeholder="Select Urine">
                                            <option label="Choose one" disabled selected></option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="ohtt-blood-dropdown">OHTT/BSS</label>
                                        <select name="ohtt/blood" class="form-control form-select" id="ohtt-blood-dropdown" data-bs-placeholder="Select OHTT/Blood">
                                            <option label="Choose one" disabled selected></option>
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="form-label" for="plan">Plan</label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="ctg-dropdown">Antibiotics</label>
                                <select name="ctg" class="form-control form-select" id="ctg-dropdown" data-bs-placeholder="Select CTG">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="Antibiotics">Antibiotics</option>
                                    <option value="Analogeis">Analogeis</option>
                                    <option value="DM Mx">DM Mx</option>
                                    <option value="DM Mx">BP Mx</option>
                                    <option value="Steroids">Steroids</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="urine-dropdown">Plan Delivery</label>
                                <select name="urine" class="form-control form-select" id="urine-dropdown" data-bs-placeholder="Select Urine">
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
</div>
</div>
</div>
<!-- /Row -->

<!-- ROW -->
{{--<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Pationts Update</h3>
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label" for="Category-dropdown">Category</label>
                                <select name="specialty" class="form-control form-select" id="Category-dropdown" data-bs-placeholder="Select Category" onchange="changeCategory()">
                                    <option label="Choose one" disabled selected></option>
                                    <option value="gyn">GYN</option>
                                    <option value="obs">OBS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Presente Comptante -->
                    <label class="form-label" for="default-dropdown">Presente Comptante</label>
                    <div class="card">
                        <div class="card-body bg-info">
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

                    <!-- Current Preq Hx -->
                    <label class="form-label" for="default-dropdown">Current Pregnancy Hx</label>
                    <div class="card">
                        <div class="card-body bg-gray">
                            <div class="row">
                                <div class="form-group col-md-1">
                                    <label class="form-label" for="g-text">G</label>
                                    <input type="number" class="form-control" placeholder="G">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="form-label" for="p-text">P</label>
                                    <input type="number" class="form-control" placeholder="P">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="form-label" for="c-text">C</label>
                                    <input type="number" class="form-control" placeholder="C">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="yrs-married-dropdown">Married Year</label>
                                    <input type="number" class="form-control" placeholder="Years (YYYY)" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="LMP-text">LMP</label>
                                    <input type="date" class="form-control" placeholder="LMP">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="EDD-text">EDD</label>
                                    <input type="date" class="form-control" placeholder="EDD">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="Working-EDD-text">Working EDD</label>
                                    <input type="date" class="form-control" placeholder="Working EDD">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Past Obs Hx -->
                    <label class="form-label" for="default-dropdown">Past Obstetric Hx</label>
                    <div class="card">
                        <div class="card-body bg-blue">
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

                    <!-- Past Gyn Hx -->
                    <label class="form-label" for="default-dropdown">Past Gyn HX</label>
                    <div class="card">
                        <div class="card-body bg-gray">

                        </div>
                    </div>

                    <!-- Other Hx -->
                    <label class="form-label" for="default-dropdown">Other HX</label>
                    <div class="card">
                        <div class="card-body bg-gray">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="g-text">Past Med HX</label>
                                    <input type="text" class="form-control" placeholder="Past Med HX">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="p-text">Past Surgery HX</label>
                                    <input type="text" class="form-control" placeholder="Past Surgery HX">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="c-text">Allergy HX</label>
                                    <input type="text" class="form-control" placeholder="Past Allergy HX">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="c-text">Family HX</label>
                                    <input type="text" class="form-control" placeholder="Family HX">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="c-text">Social HX</label>
                                    <input type="text" class="form-control" placeholder="Social HX">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>--}}
<!-- ROW CLOSED -->

@endsection

@section('modal')

@endsection

@section('scripts')

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

@endsection