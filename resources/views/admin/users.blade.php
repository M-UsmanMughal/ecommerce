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
          <h3>Users</h3>
          <p class="text-subtitle text-muted">For user to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header ">
          <div class="row justify-content-between ">
            <h5 class="col-md-3">Users</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add New User
            </button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New User</h1>
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
                  <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <label for="name" class="form-label">User Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Product name" required><br>

                    <label for="email" class="form-label"> User Email:</label>
                    <input type='email' name="email" class="form-control" required placeholder="Enter User Email"><br>

                    <label for="number" class="form-label">User Number:</label>
                    <input type="number" class="form-control" name="phone" required placeholder="Enter User Number"><br>
                    
                    <label for="password" class="form-label">User Password:</label>
                    <input type="password" class="form-control" name="password" required placeholder="Enter User Password"><br>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add User</button>
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
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Register Date</th>
                  <th>Action</th>
                </tr>
              </thead>
             <tbody>
              @foreach($users as $user)
              <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                  <td>
                      <!-- Delete Form -->
                      <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                      </form>
                  </td>
              </tr>
              @endforeach
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