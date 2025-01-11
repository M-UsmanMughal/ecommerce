@extends('admin.tamplate')
@section('contant')


<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Ordars</h3>
          <p class="text-subtitle text-muted">For user to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ordars</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header ">
          <div class="row justify-content-between ">
            <h5 class="col-md-3">Ordars</h5>
            <!-- Button trigger modal -->
          <div class="card-body">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @include('sweetalert::alert')
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>User Id</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Product id</th>
                  <th>Payment</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
          </div>
        </div>
    </section>
  </div>

 
</div>

@endsection

@push('css')
<link rel="stylesheet" href="{{asset('adminstyle/vendors/simple-datatables/style.css')}}">
@endpush

@push('js')
<script src="{{asset('adminstyle/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush