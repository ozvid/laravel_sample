@extends('frontend.layouts.main')
@section('content')
<section class="login-form">
  	<div class="container">
   		<div class="row">
    		<div class="col-md-offset-4 col-md-4">
			 	<form method="POST">
    				<div class="panel panel-default">
      					<div class="panel-body">
	   						<div class="text-center"><h3>Log In</h3></div>
	   						@csrf
		    				<div class="form-group">
		    					<label for="email">Email</label>
		    					<input type="email" class="form-control" value="{{ old('email') }}" name="email">
		    					<span class="font-weight-bold text-danger">
    		    					@if($errors->has('email'))
                                		{{ $errors->first('email') }}
                                	@endif
                                </span>
		    				</div>
		    				<div class="form-group">
		    					<label for="password">Password</label>
		    					<input type="password" class="form-control" value="{{ old('password') }}" name="password">
		    					<span class="font-weight-bold text-danger">
    		    					@if($errors->has('password'))
                                		{{ $errors->first('password') }}
                                	@endif
                                </span>
		    				</div>
							<div class="row">
								<div class="col-md-6">
									<div class="checkbox remember">
										<input type="checkbox" class="" value="{{ old('remember_me') }}" name="remember_me">
										<label>Remember Me</label>
										<span class="font-weight-bold text-danger">
    										@if($errors->has('remember_me'))
                                        		{{ $errors->first('remember_me') }}
                                        	@endif
                                        </span>
									</div>
								</div>
								<div class="col-md-6 text-right">
									<input type="submit" name="submit" value="Login" class="btn btn-success">
								</div>
							</div>
						</div>
						<div class="panel-footer text-center">
	     					<a href="{{ url('forgot-password') }}">Forgot Password? </a>
	   					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
