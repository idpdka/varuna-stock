<div class="modal fade" id="deleteSupplierModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('deleteSupplier') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus data "<span class="mdl-name"></span>"?</p>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" class="mdl-id">
          <button type="submit" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>