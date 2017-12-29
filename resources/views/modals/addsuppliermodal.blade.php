<div class="modal fade" id="addSupplierModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('addSupplier') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="company_name" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="phone" class="form-control"/>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>