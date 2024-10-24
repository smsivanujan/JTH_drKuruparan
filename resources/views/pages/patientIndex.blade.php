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
                                <th>Visit</th>
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
                            @foreach ($pregnancies as $row)
                            <tr>
                                <td></td>
                                <td>
                                    <a class="btn btn-yellow" href="{{ route('pregnanacyVisit.index', ['patientID' => $row->patientID]) }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-plus"></i>
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
@include('pages.modals.clinicView')
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        // show modal on backend validation error
        if (!@json($errors -> isEmpty())) {
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
            $("#full_name").val('');
            $("#gender").val('');
            $("#age").val('');
            $("#ward").val('');
            $("#BHTClinicFileNo").val('');
            $('#createFormModal').html('Create Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });

    });
</script>

@endsection