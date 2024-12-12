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
          <h3>Settings</h3>
          <p class="text-subtitle text-muted">For user to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
       <!-- Trigger Modal -->
     

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $setting->title ?? '' }}" required>
                        </div>

                        <!-- Logo -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo:</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                            @if($setting->logo)
                                <img src="{{ asset('images/' . $setting->logo) }}" alt="Logo" width="100" class="mt-2">
                            @endif
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $setting->phone ?? '' }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $setting->email ?? '' }}" required>
                        </div>

                        <!-- GitHub Link -->
                        <div class="mb-3">
                            <label for="github_link" class="form-label">GitHub Link:</label>
                            <input type="text" name="github_link" id="github_link" class="form-control" value="{{ $setting->github_link ?? '' }}" required>
                        </div>

                        <!-- LinkedIn Link -->
                        <div class="mb-3">
                            <label for="linkedin_link" class="form-label">LinkedIn Link:</label>
                            <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" value="{{ $setting->linkedin_link ?? '' }}" required>
                        </div>

                        <!-- About Photos -->
                        <div class="mb-3">
                            <label for="about_photo_1" class="form-label">About Photo 1:</label>
                            <input type="file" name="about_photo_1" id="about_photo_1" class="form-control">
                            @if($setting->about_photo_1)
                                <img src="{{ asset('images/' . $setting->about_photo_1) }}" alt="About Photo 1" width="100" class="mt-2">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="about_photo_2" class="form-label">About Photo 2:</label>
                            <input type="file" name="about_photo_2" id="about_photo_2" class="form-control">
                            @if($setting->about_photo_2)
                                <img src="{{ asset('images/' . $setting->about_photo_2) }}" alt="About Photo 2" width="100" class="mt-2">
                            @endif
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <textarea name="address" id="address" class="form-control">{{ $setting->address ?? '' }}</textarea>
                        </div>

                        <!-- About Description -->
                        <div class="mb-3">
                            <label for="about_description" class="form-label">About Description:</label>
                            <textarea name="about_description" id="about_description" class="form-control">{{ $setting->about_description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
      <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header ">
                <div class="row justify-content-between ">
                    <h5 class="col-md-3">Settings</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#editProductModal">
                      Update
                  </button>
                    
                </div>
            </div>
    
            <div class="card-body">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @include('sweetalert::alert')
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="title" class="mb-2">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" disabled 
                            value="{{ $setting->title ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="logo" class="mb-2">Logo:</label>
                        <input type="file" name="logo" id="logo" class="form-control" disabled>
                        @if($setting->logo)
                            <img src="{{ asset('images/' . $setting->logo) }}" alt="Logo" width="100" class="mt-2">
                        @endif
                    </div>
                </div>
    
                <div class="row my-4">
                    <div class="col-md-6">
                        <label for="number" class="mb-2">Number:</label>
                        <input type="number" name="phone" id="number" class="form-control "disabled 
                            value="{{ $setting->phone ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="mb-2">Email:</label>
                        <input type="email" name="email" id="email" class="form-control "disabled 
                            value="{{ $setting->email ?? '' }}">
                    </div>
                </div>
    
                <div class="row my-4">
                    <div class="col-md-6">
                        <label for="github" class="mb-2">Github Link:</label>
                        <input type="text" name="github_link" id="github" class="form-control "disabled 
                            value="{{ $setting->github_link ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="linkedin" class="mb-2">LinkedIn Link:</label>
                        <input type="text" name="linkedin_link" id="linkedin" class="form-control "disabled 
                            value="{{ $setting->linkedin_link ?? '' }}">
                    </div>
                </div>
    
                <div class="row my-4">
                    <div class="col-md-6">
                        <label for="aboutImg_1" class="mb-2">About Image_1:</label>
                        <input type="file" name="about_photo_1" id="aboutImg_1" class="form-control" disabled >
                        @if($setting->about_photo_1)
                            <img src="{{ asset('images/' . $setting->about_photo_1) }}" alt="About Image 1" width="100" class="mt-2">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="aboutImg_2" class="mb-2">About Image_2:</label>
                        <input type="file" name="about_photo_2" id="aboutImg_2" class="form-control" disabled>
                        @if($setting->about_photo_2)
                            <img src="{{ asset('images/' . $setting->about_photo_2) }}" alt="About Image 2" width="100" class="mt-2">
                        @endif
                    </div>
                </div>
    
                <div class="row my-4">
                    <div class="col-md-6">
                        <label for="address" class="mb-2">Address:</label>
                        <textarea name="address" id="address" class="form-control" disabled>{{ $setting->address ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="about_desc" class="mb-2">About Description:</label>
                        <textarea name="about_description" id="about_desc" class="form-control" disabled>{{ $setting->about_description ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    
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