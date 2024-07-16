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
                                <label class="form-label" for="default-dropdown">Default Select</label>
                                <select name="country" class="form-control form-select" id="default-dropdown" data-bs-placeholder="Select Country">
                                    <option label="Choose one" disabled></option>
                                    <option value="gyn">GYN</option>
                                    <option value="obs">OBS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body bg-info">
                            <!-- <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="complaint-dropdown">Complaint</label>
                                    <select name="complaint" class="form-control form-select" id="complaint-dropdown" data-bs-placeholder="Select Complaint">
                                        <option label="Choose one" disabled></option>
                                        <option value="Pain general/multiple sites">Pain general/multiple sites</option>
                                        <option value="Chills">Chills</option>
                                        <option value="Fever">Fever</option>
                                        <option value="Weakness/tiredness general">Weakness/tiredness general</option>
                                        <option value="Feeling ill">Feeling ill</option>
                                        <option value="Fainting/syncope">Fainting/syncope</option>
                                        <option value="Coma">Coma</option>
                                        <option value="Swelling">Swelling</option>
                                        <option value="Sweating problem">Sweating problem</option>
                                        <option value="Bleeding/haemorrhage not otherwise specified">Bleeding/haemorrhage not otherwise specified</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="duration-dropdown">Duration</label>
                                    <select name="duration" class="form-control form-select" id="duration-dropdown" data-bs-placeholder="Select Duration">
                                        <option label="Choose one" disabled></option>
                                        <option value="1 Day">1 Day</option>
                                        <option value="2 Day">2 Day</option>
                                        <option value="3 Day">3 Day</option>
                                        <option value="4 Day">4 Day</option>
                                        <option value="5 Day">5 Day</option>
                                        <option value="1 Week">1 Week</option>
                                        <option value="2 Week">2 Week</option>
                                        <option value="2 Week">Half Month</option>
                                        <option value="3 Week">3 Week</option>
                                        <option value="1 Month and more">1 Month and more</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="severity-dropdown">Severity</label>
                                    <select name="severity" class="form-control form-select" id="severity-dropdown" data-bs-placeholder="Select Severity">
                                        <option label="Choose one" disabled></option>
                                        <option value="Mild">Mild</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Severe">Severe</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <input type="textarea" class="form-control" id="remarks" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="button" onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                </div>
                            </div> -->
                            <form id="complaint-form">
                                <div id="complaint-fields">
                                    <!-- <div class="row mb-3" id="field-row-0">
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="complaint-dropdown-0">Complaint</label>
                                            <select name="complaint[]" class="form-control form-select" id="complaint-dropdown-0" data-bs-placeholder="Select Complaint">
                                                <option label="Choose one" disabled selected></option>
                                                <option value="Pain general/multiple sites">Pain general/multiple sites</option>
                                                <option value="Chills">Chills</option>
                                                <option value="Fever">Fever</option>
                                                <option value="Weakness/tiredness general">Weakness/tiredness general</option>
                                                <option value="Feeling ill">Feeling ill</option>
                                                <option value="Fainting/syncope">Fainting/syncope</option>
                                                <option value="Coma">Coma</option>
                                                <option value="Swelling">Swelling</option>
                                                <option value="Sweating problem">Sweating problem</option>
                                                <option value="Bleeding/haemorrhage not otherwise specified">Bleeding/haemorrhage not otherwise specified</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label" for="duration-dropdown-0">Duration</label>
                                            <select name="duration[]" class="form-control form-select" id="duration-dropdown-0" data-bs-placeholder="Select Duration">
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
                                            <label class="form-label" for="severity-dropdown-0">Severity</label>
                                            <select name="severity[]" class="form-control form-select" id="severity-dropdown-0" data-bs-placeholder="Select Severity">
                                                <option label="Choose one" disabled selected></option>
                                                <option value="Mild">Mild</option>
                                                <option value="Moderate">Moderate</option>
                                                <option value="Severe">Severe</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="remarks-0" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="remarks-0" name="remarks[]" rows="1" required></textarea>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <button class="btn btn-success mb-3" type="button" id="add-field-btn">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Complaint
                                </button> -->
                            </form>
                            <button class="btn btn-success mb-3" type="button" id="add-field-btn">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Complaint
                            </button>
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