<div class="modal fade" id="editSupplierModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('editSupplier') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control mdl-name"/>
          </div>
          <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="company_name" class="form-control mdl-company-name"/>
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="phone" class="form-control mdl-phone"/>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" class="mdl-id">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>