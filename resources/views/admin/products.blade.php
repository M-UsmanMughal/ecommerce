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
          <h3>Products</h3>
          <p class="text-subtitle text-muted">For user to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header ">
          <div class="row justify-content-between ">
            <h5 class="col-md-3">Products</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add New Products
            </button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Products</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach

                  </div>
                  @endif
                  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="form-label">Products Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Product name" required><br>

                    <label for="description" class="form-label"> ProductsDescription:</label>
                    <textarea name="description" class="form-control" required placeholder="Enter Product description"></textarea><br>

                    <label for="photo" class="form-label">Products Photo:</label>
                    <input type="file" class="form-control" name="photo" required><br>
                    
                    <label for="price" class="form-label">Products Price:</label>
                    <input type="number" class="form-control" name="price" required placeholder="Enter Cetagory price"><br>

                    <label for="status" class="form-label">Products Status:</label>
                    <select name="status" class="form-control" required>
                      <option value="">Select Status...</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @include('sweetalert::alert')
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product)
                <tr>
                  <td>{{ $product->id  }}</td>
                  <td>{{ $product->name }}</td>
                  <td>
                    <img src="{{ asset('images/'. $product->photo) }}" alt="Image" width="50">
                  </td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->status == 1? 'Active' : 'Inactive' }}</td>
                  <td>
                    <!-- <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a> -->
                 <!-- Edit Product Button -->
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                    Edit
                  </button>

                  <!-- Edit Product Modal -->
                  <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="name" class="form-label">Product Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required><br>

                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea><br>

                            <label for="photo" class="form-label">Product Photo:</label>
                            <input type="file" class="form-control" name="photo"><br>
                            <p>Current Image:</p>
                            <img src="{{ asset('images/' . $product->photo) }}" alt="Image" width="100"><br><br>

                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}" required><br>

                            <label for="status" class="form-label">Status:</label>
                            <select name="status" class="form-control" required>
                              <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                              <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select><br>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty

                <tr>
                  <td colspan="5" class="text-center">No products found.</td>
                </tr>
                @endforelse
            
              </tbody>
            </table>
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