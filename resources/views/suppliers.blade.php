@extends('app')

@section('content')
<!-- Page Content -->
<div class="container items">
  <div class="row ">
    <div class="col-lg-3">
      <h2 class="my-4">Varuna Aquarium</h1>
      <div class="list-group">
        <a href="{{ url('/suppliers') }}" class="list-group-item">Suppliers</a>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="text-right">
        <button type="button" class="btn btn-success add-btn" data-toggle="modal" data-target="#addSupplierModal">Tambah Supplier</button>
      </div>
      <div class="text-right search-bar">
        <form class="form-inline" method="get" action="{{ url('/suppliers') }}">
          <div class="form-group">
            <input type="text" name="filter" class="form-control"/>
            <button type="submit" class="btn btn-primary">Cari</button>
          </div>
        </form>
      </div>
      @foreach ($suppliers as $supplier)
        <div class="card item">
          <div class="card-block">
            <div class="card-body">
              <h4 class="card-title">{{ $supplier->company_name }}</h4>
              <p class="card-text">Contact Person : {{ $supplier->name }}</p>
              <p class="card-text">Nomor Telepon  : {{ $supplier->phone }}</p>
            </div>
            <div class="card-footer text-right">
              <button type="button" 
                      class="btn btn-sm btn-warning edit-btn"
                      data-toggle="modal"
                      data-target="#editSupplierModal"
                      data-id="{{ $supplier->id }}"
                      data-name="{{ $supplier->name }}"
                      data-company-name="{{ $supplier->company_name }}"
                      data-phone="{{ $supplier->phone }}">Update</button>
              <button type="button"
                      class="btn btn-sm btn-danger delete-btn"
                      data-toggle="modal"
                      data-target="#deleteSupplierModal"
                      data-id="{{ $supplier->id }}"
                      data-name="{{ $supplier->company_name }}">Hapus</button>
            </div>
          </div>
        </div>
      @endforeach

      <div class="row">
        <div class="text-center">
          {{ $suppliers->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>

{{-- MODALS --}}
@include('modals.addsuppliermodal')
@include('modals.editsuppliermodal')
@include('modals.deletesuppliermodal')

<script type="text/javascript">
  $('.edit-btn').click(function() {
    $('.mdl-id').val($(this).data('id'));
    $('.mdl-name').val($(this).data('name'));
    $('.mdl-company-name').val($(this).data('company-name'));
    $('.mdl-phone').val($(this).data('phone'));
  });

  $('.delete-btn').click(function() {
    $('.mdl-id').val($(this).data('id'));
    $('.mdl-name').html($(this).data('name'));
  });
</script>
@endsection