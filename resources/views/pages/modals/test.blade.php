<div class="modal fade" id="modaltest_">
    <div class="modal-dialog modal-xl modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal">Pregnanacy Visit Record</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body text-start">
                <div class="card-body">
                    <form id="form" action="{{ route('complaints.store') }}" method="POST">
                        @csrf
                        <div class="list-group">
                            <div style="display: flex;">
                                <!-- Navigation Column -->
                                <div style="width: 150px; background-color: #f8f9fa; padding: 10px; border-radius: 7px;">
                                    <ul class="nav1 nav-column flex-column br-7" style="list-style-type: none; padding: 0;">
                                        <li class="nav-item1" style="margin-bottom: 10px;">
                                            <a class="nav-link thumb text-dark-light active" href="#page8" onclick="showPage(8)" style="text-decoration: none; color: #4CAF50; font-weight: bold;">IX</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Form Content -->
                                <div style="flex-grow: 1; padding: 20px;">
                                    <form id="form" action="{{ route('complaints.store') }}" method="POST">
                                        @csrf
                                        <input type="text" class="form-control" name="input_id_patient" id="input_id_patient" hidden>

                                        <!-- Category -->
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

                                        <!-- Social HX -->
                                        <div id="page8" class="form-page" style="display: none;">
                                            <h2>Social HX</h2>
                                            <div style="padding: 15px; background-color: #d9edf7;">
                                                @include('pages.fields.social_hx')
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function showPage(pageNumber) {
        var pages = document.querySelectorAll('.form-page');
        pages.forEach(function(page) {
            page.style.display = 'none';
        });
        document.getElementById('page' + pageNumber).style.display = 'block';

        // Update navigation link styles
        var links = document.querySelectorAll('a');
        links.forEach(function(link) {
            link.style.color = 'black';
            link.style.fontWeight = 'normal';
        });
        var activeLink = document.querySelector('a[href="#page' + pageNumber + '"]');
        activeLink.style.color = '#4CAF50';
        activeLink.style.fontWeight = 'bold';
    }
</script>