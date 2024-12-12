@extends('tamplate')
@section('content')
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Registration</h3>
            @if ($errors->any())
                        <div class="alert alert-danger">
                           
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                           
                        </div>
                    @endif
						<form action="{{route('admin.chekoutRegisterAuth')}}" method="POST" class="login-form">
               @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="name" placeholder="Enter Your Name*" >
		      		</div>
		      		<div class="form-group">
		      			<input type="number" class="form-control rounded-left" name="phone" placeholder="Enter Your Num*" >
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="email" placeholder="Enter Your Eamil*" >
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password" placeholder="Enter Your Password*" >
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right"> 
                 Already have an account?
                    <a href="{{route('chekout-login')}}">Login</a>
                  </div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('backend/js/jquery.min.js')}}"></script>
  <script src="{{asset('backend/js/popper.js')}}"></script>
  <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/js/main.js')}}"></script>

	</body>
</html>


@endsection
