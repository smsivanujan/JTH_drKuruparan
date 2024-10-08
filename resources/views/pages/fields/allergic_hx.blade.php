<!-- <h6 class="mb-0">Allergic Hx</h6> -->
<div>
    <div class="my-3">
        <div>
            <div class="row">
                <!-- Drug Allergy Hx -->
                <div class="form-group col-md-12">
                    <label class="form-label" for="drugalergyhx-dropdown">Drug Allergy Hx</label>
                    <select name="drugalergyhx[]" class="form-control select2-style1" data-placeholder="" multiple>
                        <option label="Choose one" disabled></option>
                        @foreach($drugAllergies as $allergy)
                        <option value="{{ $allergy->virtualItemId }}">{{ $allergy->virtualItemName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- Food Allergy HX -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="foodallergyhx-text">Food Allergy HX</label>
                    <textarea class="form-control" id="foodallergyhx" name="foodallergyhx" placeholder="" rows="1"></textarea>
                </div>
                <!-- Other Allergy HX -->
                <div class="form-group col-md-6">
                    <label class="form-label" for="otherallergyhx-text">Other Allergy HX</label>
                    <textarea class="form-control" id="otherallergyhx" name="otherallergyhx" placeholder="" rows="1"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>