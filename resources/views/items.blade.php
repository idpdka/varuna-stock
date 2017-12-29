@extends('app')

@section('content')
<!-- Page Content -->
<div class="container items">
  <div class="row ">
    <div class="col-lg-3">
      <h2 class="my-4">Varuna Aquarium</h1>
      <div class="list-group">
        @foreach ($categories as $category)
          <a href="{{ url('/items/' . $category->id) }}" class="list-group-item {{ ($category->id == $page_category) ? 'active' : '' }}">{{ $category->name }}</a>
        @endforeach
      </div>
    </div>
    <div class="col-lg-9">
      <div class="text-right">
        <button type="button" class="btn btn-success add-btn" data-toggle="modal" data-target="#addItemModal" data-category="{{ $page_category }}">Tambah Inventaris</button>
      </div>
      <div class="text-right search-bar">
        <form class="form-inline" method="get" action="{{ url('/items/' . $page_category) }}">
          <div class="form-group">
            <input type="text" name="filter" class="form-control"/>
            <button type="submit" class="btn btn-primary">Cari</button>
          </div>
        </form>
      </div>
      @foreach ($items as $item)
        <div class="card item">
          <div class="card-block">
            <div class="card-body">
              <h4 class="card-title">{{ $item->name }}</h4>
              <p class="card-text">Harga Beli : Rp {{ number_format($item->buy_price, 0, ',', '.') }}</p>
              <p class="card-text">Harga Jual : Rp {{ number_format($item->sell_price, 0, ',', '.') }}</p>
              <p class="card-text">Jumlah stok : {{ $item->quantity }}</p>
              <p class="card-text">Supplier : <a href="{{ ($item->supplier_id == 0) ? '#' : url('/suppliers/?filter=' . $item->company_name) }}" target="_blank">{{ ($item->supplier_id == 0) ? '-' : $item->company_name }}</a></p>
              <p class="card-text">Keterangan : {{ $item->note }}</p>
            </div>
            <div class="card-footer text-right">
              <button type="button" 
                      class="btn btn-sm btn-warning edit-btn"
                      data-toggle="modal"
                      data-target="#editItemModal"
                      data-id="{{ $item->id }}"
                      data-name="{{ $item->name }}"
                      data-sell-price="{{ $item->sell_price }}"
                      data-buy-price="{{ $item->buy_price }}"
                      data-note="{{ $item->note }}"
                      data-quantity="{{ $item->quantity }}">Update</button>
              <button type="button"
                      class="btn btn-sm btn-danger delete-btn"
                      data-toggle="modal"
                      data-target="#deleteItemModal"
                      data-id="{{ $item->id }}"
                      data-name="{{ $item->name }}">Hapus</button>
            </div>
          </div>
        </div>
      @endforeach

      <div class="row">
        <div class="text-center">
          {{ $items->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>

{{-- MODALS --}}
@include('modals.additemmodal')
@include('modals.edititemmodal')
@include('modals.deleteitemmodal')

<script type="text/javascript">
  $('.add-btn').click(function() {
    $('.add-category').val($(this).data('category'));
  });

  $('.edit-btn').click(function() {
    $('.mdl-id').val($(this).data('id'));
    $('.mdl-name').val($(this).data('name'));
    $('.mdl-sell-price').val($(this).data('sell-price'));
    $('.mdl-buy-price').val($(this).data('buy-price'));
    $('.mdl-quantity').val($(this).data('quantity'));
    $('.mdl-note').val($(this).data('note'));
  });

  $('.delete-btn').click(function() {
    $('.mdl-id').val($(this).data('id'));
    $('.mdl-name').html($(this).data('name'));
  });
</script>
@endsection