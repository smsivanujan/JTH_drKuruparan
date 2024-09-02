<div class="modal fade" id="modal_">
    <div class="modal-dialog modal-lg modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal">Patient's Clinical Record</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body text-start">
                <div class="container d-flex justify-content-center">
                    <div class="col-md-4">
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

                            <!-- IX -->
                            <div class="list-group-item py-4" data-acc-step>
                                @include('pages.fields.ix')
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row ">
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

        <!-- IX -->
        <div class="list-group-item py-4" data-acc-step>
            @include('pages.fields.ix')
        </div>

    </div>
</form>
</div>

</div>
</div>
</div> --}}