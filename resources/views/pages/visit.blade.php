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
                    Patient's Visit Clinical Record
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
                        <div class="list-group-item py-4 bg-info" data-acc-step>
                            @include('pages.fields.presenting_complaint')
                        </div>

                        <!-- Current Pregnancy Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            @include('pages.fields.current_pregnancy_hx')
                        </div>

                        <!-- Past Obstetric Hx -->
                        <div class="list-group-item py-4  bg-info" data-acc-step>
                            @include('pages.fields.past_obstetric_hx')
                        </div>

                        <!-- Past Gyn Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            @include('pages.fields.past_gyn_hx')
                        </div>

                        <!-- Past Med Hx -->
                        <div class="list-group-item py-4  bg-info" data-acc-step>
                            @include('pages.fields.past_med_hx')
                        </div>

                        <!-- Allergic Hx -->
                        <div class="list-group-item py-4" data-acc-step>
                            @include('pages.fields.allergic_hx')
                        </div>

                        <!-- Other HX -->
                        <div class="list-group-item py-4  bg-info" data-acc-step>
                            @include('pages.fields.other_hx')
                        </div>

                        <!-- Gyn Examination -->
                        <div class="list-group-item py-4" data-acc-step>
                            @include('pages.fields.gyn_examination')
                        </div>

                        <!-- Obs Examination -->
                        <div class="list-group-item py-4  bg-info" data-acc-step>
                            @include('pages.fields.obs_examination')
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
@endsection