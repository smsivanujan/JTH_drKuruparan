@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pregnancies Visit</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="col-lg-6">
                    <h3 class="card-title">TEST</h3>
                </div>
                <div class="col-lg-6 text-end">
                    <button type="button" title="Add" id="btn-add" class="modal-effect btn btn-primary-gradient btn-pill" data-bs-effect="effect-sign" data-bs-toggle="modal" data-bs-target="#modaltest_"><i class="fe fe-plus me-2"></i>Add</button>
                </div>
            </div>
            <div class="card-body">
                <!-- Personal Info Table -->
                <div class="row mb-3 bg-info p-3 w-100">
                    <h3 class="card-title text-center w-100">Personal Info</h3>
                    <table class="table table-borderless">
                        <tbody>
                            @foreach ($pregnanacies as $row)
                            <tr>
                                <td><strong>PHN:</strong><br><input type="text" class="form-control" id="patient" name="patient" value="{{ $row->patient_id }}" readonly></td>
                                <td><strong>BHT:</strong><br><input type="text" class="form-control" id="BHTClinicFileNo" value="{{ $row->BHTClinicFileNo }}" readonly></td>
                                <td><strong>Gender:</strong><br><input type="text" class="form-control" id="gender" value="{{ $row->patientSex }}" readonly></td>
                            </tr>
                            <tr>
                                <td><strong>Full Name:</strong><br><input type="text" class="form-control" id="full_name" value="{{ $row->patientPersonalTitle }} {{ $row->patientName }}" readonly></td>
                                <td><strong>Ward:</strong><br><input type="text" class="form-control" id="ward" value="{{ $row->ward }}" readonly></td>
                                <td><strong>Age:</strong><br><input type="text" class="form-control" id="age" value="{{ $row->age }}" readonly></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

{{-- modal section --}}
@section('modal')
@include('pages.modals.test')
@endsection

@section('scripts')






@endsection