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

<!-- ROW -->
<div class="row">
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
                    <label class="form-label" for="default-dropdown">Current Preq Hx</label>
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
                    <label class="form-label" for="default-dropdown">Past Obs Hx</label>
                    <!-- <div class="card">
                        <div class="card-body bg-blue">
                            <div id="complaint-form">
                                <div id="complaint-fields" class="row">
                                    <div class="form-group col-md-2">
                                        <label class="form-label" for="year-input">Year</label>
                                        <input type="number" class="form-control" placeholder="Years (YYYY)" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-label" for="poa-text">POA</label>
                                        <input type="text" class="form-control" placeholder="POA">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-label" for="moa-text">MOA</label>
                                        <input type="text" class="form-control" placeholder="MOA">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-label" for="birth-weight-text">Birth Weight (KG)</label>
                                        <input type="text" class="form-control" placeholder="Birth Weight (KG)">
                                    </div>
                                    <div class="form-group col-md-2 d-flex align-items-end">
                                        <button class="btn btn-danger remove-field-btn" type="button" onclick="removeField('field-row-${fieldCount}')">X</button>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success mb-3" type="button" id="add-field-btn">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Past Obs
                            </button>
                        </div>
                    </div> -->
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
                            <label class="form-label" for="default-dropdown">menstrual hx</label>
                            <div class="row">
                                <div class="form-group col-md-1">
                                    <label class="form-label" for="age">Age</label>
                                    <input type="text" class="form-control" placeholder="age">
                                </div>
                                <label class="form-label" for="default-dropdown">Bleeding Pattern</label>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="amount">Amount</label>
                                    <input type="text" class="form-control" placeholder="amount">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="duration">Duration</label>
                                    <input type="text" class="form-control" placeholder="duration">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="aub1">AUB</label>
                                    <div style="display: flex; gap: 10px;">
                                        <label class="rdiobox" for="rdio-primary-unchecked1" style="margin-right: 10px;">
                                            <input name="rdio-primary1" type="radio" class="radio-primary" id="rdio-primary-unchecked1">
                                            <span>Reqularity</span>
                                        </label>
                                        <label class="rdiobox" for="rdio-primary1" style="margin-right: 10px;">
                                            <input checked name="rdio-primary1" type="radio" class="radio-primary" id="rdio-primary1">
                                            <span>Irreqularity</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="aub2">AUB</label>
                                    <div style="display: flex; gap: 10px;">
                                        <label class="rdiobox" for="rdio-primary-unchecked2" style="margin-right: 10px;">
                                            <input name="rdio-primary2" type="radio" class="radio-primary" id="rdio-primary-unchecked2">
                                            <span>YES</span>
                                        </label>
                                        <label class="rdiobox" for="rdio-primary2" style="margin-right: 10px;">
                                            <input checked name="rdio-primary2" type="radio" class="radio-primary" id="rdio-primary2">
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                                <label class="form-label" for="default-dropdown">Contraception HX</label>
                                <div class="form-group ">
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked>
                                            <span class="selectgroup-button">OCP</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="CSS" class="selectgroup-input">
                                            <span class="selectgroup-button">DMPA</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="PHP" class="selectgroup-input">
                                            <span class="selectgroup-button">Idelle</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                                            <span class="selectgroup-button">IUCD</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="Angular" class="selectgroup-input">
                                            <span class="selectgroup-button">Condom</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="Java" class="selectgroup-input">
                                            <span class="selectgroup-button">Others</span>
                                        </label>
                                    </div>
                                </div>
                                <label class="form-label" for="default-dropdown">Subfertility</label>
                                <div style="display: flex; gap: 10px;">
                                    <label class="rdiobox" for="rdio-primary-unchecked3" style="margin-right: 10px;">
                                        <input name="rdio-primary3" type="radio" class="radio-primary" id="rdio-primary-unchecked3">
                                        <span>YES</span>
                                    </label>
                                    <label class="rdiobox" for="rdio-primary3" style="margin-right: 10px;">
                                        <input checked name="rdio-primary3" type="radio" class="radio-primary" id="rdio-primary3">
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="form-group ">
                                    <div style="display: flex; gap: 10px;">
                                        <label class="rdiobox" for="rdio-primary-unchecked4" style="margin-right: 10px;">
                                            <input name="rdio-primary4" type="radio" class="radio-primary" id="rdio-primary-unchecked4">
                                            <span>Male</span>
                                        </label>
                                        <label class="rdiobox" for="rdio-primary4" style="margin-right: 10px;">
                                            <input checked name="rdio-primary4" type="radio" class="radio-primary" id="rdio-primary4">
                                            <span>Female</span>
                                        </label>
                                    </div>
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked>
                                            <span class="selectgroup-button">SFA</span>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="form-label" for="default-dropdown">Ovulatory Disorder</label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="CSS" class="selectgroup-input">
                                                <span class="selectgroup-button">Hypotholamic Pitutagal hale</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="PHP" class="selectgroup-input">
                                                <span class="selectgroup-button">PCOS</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                                                <span class="selectgroup-button">Overiah Failiure (POF/POI)</span>
                                            </label>
                                        </div>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="form-label" for="default-dropdown">Tubal Factors</label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="CSS" class="selectgroup-input">
                                                <span class="selectgroup-button">Infection</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="PHP" class="selectgroup-input">
                                                <span class="selectgroup-button">Surgery</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                                                <span class="selectgroup-button">Endometriosos</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                                                <span class="selectgroup-button">IBD</span>
                                            </label>
                                        </div>

                                        <div class="selectgroup selectgroup-pills">
                                            <label class="form-label" for="default-dropdown">Uterine</label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="CSS" class="selectgroup-input">
                                                <span class="selectgroup-button">Conqenital</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="PHP" class="selectgroup-input">
                                                <span class="selectgroup-button">Fiberids</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                                                <span class="selectgroup-button">Polyps</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                                                <span class="selectgroup-button">Adhesion/Ashermanis</span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>
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
                                    <input type="number" class="form-control" placeholder="Past Med HX">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="c-text">Allergy HX</label>
                                    <input type="number" class="form-control" placeholder="Past Med HX">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="c-text">Farmer HX</label>
                                    <input type="number" class="form-control" placeholder="Farmer HX">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="c-text">Social HX</label>
                                    <input type="number" class="form-control" placeholder="Social HX">
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
</div>
<!-- ROW CLOSED -->

@endsection

@section('modal')

@endsection

@section('scripts')

<!-- APEXCHART JS -->
<script src="{{asset('assets/js/apexcharts.js')}}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

<!-- INDEX JS -->
<script src="{{asset('assets/js/index1.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>

@endsection