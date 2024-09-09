@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pregnancies</li>
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
                    <h3 class="card-title">Pregnancies Gyn and Obs</h3>
                </div>
                <div class="col-lg-6 text-end">
                    <button type="button" title="Add" id="btn-add" class="modal-effect btn btn-primary-gradient btn-pill" data-bs-effect="effect-sign" data-bs-toggle="modal" data-bs-target="#modal_"><i class="fe fe-plus me-2"></i>Add</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom operationList-table" id="file-datatable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>View</th>
                                <th>Action</th>
                                <th>No</th>
                                <th>Category</th>
                                <th>PHN</th>
                                <th>Full Name</th>
                                <th>B.H.T</th>
                                <th>Ward</th>
                                <th>Age</th>
                                <th>Sex</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pregnanacies as $row)
                            <tr>
                                <td></td>
                                <td> <a class="btn btn-green view" title="View" data-id="{{ $row->id }}"
                                        data-patientID="{{ $row->patientID }}"
                                        data-category="{{ $row->category }}"
                                        data-prefix="{{ $row->patientPersonalTitle }}"
                                        data-full_name="{{ $row->patientName }}"
                                        data-age="{{ $row->age }}"
                                        data-gender="{{ $row->patientSex }}"
                                        data-ward="{{ $row->ward }}"
                                        data-BHTClinicFileNo="{{ $row->BHTClinicFileNo }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-blue edit" title="Edit"
                                        data-id="{{ $row->id }}"
                                        data-patientID="{{ $row->patientID }}"
                                        data-category="{{ $row->category }}"
                                        data-prefix="{{ $row->patientPersonalTitle }}"
                                        data-full_name="{{ $row->patientName }}"
                                        data-age="{{ $row->age }}"
                                        data-gender="{{ $row->patientSex }}"
                                        data-ward="{{ $row->ward }}"
                                        data-BHTClinicFileNo="{{ $row->BHTClinicFileNo }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->category }}</td>
                                <td>{{ $row->patientID }}</td>
                                <td>{{ $row->patientPersonalTitle }} {{ $row->patientName }}</td>
                                <td>{{ $row->BHTClinicFileNo }}</td>
                                <td>{{ $row->ward }}</td>
                                <td>{{ $row->age }}</td>
                                <td>{{ $row->patientSex }}</td>
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
@include('pages.modals.clinic')
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        // show modal on backend validation error
        if (!@json($errors - > isEmpty())) {
            $('#modal_').modal('show');
            var id = $('#id').val();
            if (id == 0) {
                $('#createFormModal').html('Create Pregnanacy');
            } else {
                $('#createFormModal').html('Update Pregnanacy');
            }
        }

        // create new record
        $('#btn-add').click(function() {
            document.querySelector('#search-form').querySelectorAll('input, button').forEach(function(element) {
                element.disabled = false;
            });
            $("#id").val(0);
            $("#category").val('').trigger('change');
            $("#patient").val('');
            $("#surgery").val('').trigger('change');
            $("#surgery_date").val('');
            // $("#prefix").text('');
            $("#full_name").val('');
            $("#gender").val('');
            $("#age").val('');
            $("#ward").val('');
            $("#BHTClinicFileNo").val('');
            $("#diagnosis").val('');
            $('#createFormModal').html('Create Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });

        // edit record
        $('.operationList-table').on('click', '.edit', function() {
            document.querySelector('#search-form').querySelectorAll('input, button').forEach(function(element) {
                element.disabled = true;
            });
            $("#id").val($(this).attr('data-id'));
            $("#category").val($(this).attr('data-category'));
            $("#patient").val($(this).attr('data-patientID'));
            $("#surgery").val($(this).attr('data-surgery')).trigger('change');
            $("#surgery_date").val($(this).attr('data-surgery_date'));
            $("#gender").val($(this).attr('data-gender'));
            $("#age").val($(this).attr('data-age'));
            $("#ward").val($(this).attr('data-ward'));
            $("#BHTClinicFileNo").val($(this).attr('data-BHTClinicFileNo'));
            $("#diagnosis").val($(this).attr('data-diagnosis')).trigger('change');
            $('#createFormModal').html('Update Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });
    });
</script>




@endsection