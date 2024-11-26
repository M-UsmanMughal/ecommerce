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
          <h3>Cetagories</h3>
          <p class="text-subtitle text-muted">For user to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cetagories</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header ">
          <div class="row justify-content-between ">
            <h5 class="col-md-3">Cetagories Products</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add New Cetagories
            </button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Cetagories</h1>
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
                  <form action="{{ route('admin.cetagories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Cetagory name" required><br>

                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" required placeholder="Enter Cetagory description"></textarea><br>

                    <label for="photo" class="form-label">Photo:</label>
                    <input type="file" class="form-control" name="photo" required><br>

                    <label for="status" class="form-label">Status:</label>
                    <select name="status" class="form-control" required>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Ceatgory</button>
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cetagories as $cetagory)
                <tr>
                  <td>{{ $cetagory->id  }}</td>
                  <td>{{ $cetagory->name }}</td>
                  <td>
                    <img src="{{ asset('images/' . $cetagory->photo) }}" alt="Image" width="50">
                  </td>
                  <td>{{ $cetagory->status == 1 ? 'Active' : 'Inactive' }}</td>
                  <td>
                    <!-- <a href="{{ route('admin.cetagories.edit', $cetagory->id) }}" class="btn btn-primary">Edit</a> -->
                    <form action="{{ route('admin.cetagories.destroy', $cetagory->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">No categories found.</td>
                </tr>
                @endforelse
              </tbody>

            </table>
          </div>
        </div>

    </section>
  </div>

  <footer>
    <div class="footer clearfix mb-0 text-muted">
      <div class="float-start">
        <p>2021 &copy; Mazer</p>
      </div>
      <div class="float-end">
        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
            href="http://ahmadsaugi.com">A. Saugi</a></p>
      </div>
    </div>
  </footer>
</div>

@endsection