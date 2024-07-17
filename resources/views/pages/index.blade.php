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
                    <label class="form-label" for="default-dropdown">Current Preq Hx</label>
                    <div class="card">
                        <div class="card-body bg-gray">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="form-label" for="parity-dropdown">Parity</label>
                                    <select name="yrs-married" class="form-control form-select" id="parity-dropdown" data-bs-placeholder="Select Years Married">
                                        <option label="Choose one"></option>
                                        <option value="G">G</option>
                                        <option value="P">P</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="form-label" for="yrs-married-dropdown">M.Yrs</label>
                                    <input type="number" class="form-control" placeholder="Years (YYYY)" id="year-input" min="1000" max="9999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="LMP-text">LMP</label>
                                    <input type="text" class="form-control" placeholder="LMP">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="EDD-text">EDD</label>
                                    <input type="text" class="form-control" placeholder="EDD">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="Working-EDD-text">Working EDD</label>
                                    <input type="text" class="form-control" placeholder="Working EDD">
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