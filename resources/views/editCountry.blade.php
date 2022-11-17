<!-- Modal -->
<div class="modal fade editCountry" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Country</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('update.country')}}" method="POST" id="edit-country">
                @csrf
                <input type="hidden" name="country_id" value="">
                <div class="form-group">
                    <label for="country_name">Country Name</label>
                    <input type="text" class="form-control" name="country_name" placeholder="Country Name">
                    <span class="text-danger error-text country_name_error"></span>
                </div>
                <div class="form-group">
                    <label for="city">Country City</label>
                    <input type="text" class="form-control" name="country_city" placeholder="Country City">
                    <span class="text-danger error-text country_city_error"></span>
                </div>
                <div class="button-group mt-2">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>