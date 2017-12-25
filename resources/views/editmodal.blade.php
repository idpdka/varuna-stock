<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Inventaris</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('editItem') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control mdl-name"/>
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" name="sell_price" class="form-control mdl-sell-price"/>
          </div>
          <div class="form-group">
            <label>Harga Beli</label>
            <input type="text" name="buy_price" class="form-control mdl-buy-price"/>
          </div>
          <div class="form-group">
            <label>Jumlah stok awal</label>
            <input type="text" name="quantity" class="form-control mdl-quantity"/>
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