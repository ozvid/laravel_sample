@extends('frontend.layouts.main')
@section('content')

<section class="login-form">
  	<div class="container">
   		<div class="row">
    		<div class="col-md-offset-4 col-md-4">
				<form action="" method="post">
    				<div class="panel panel-default">
      					<div class="panel-body">
	   						<div class="text-center">
								<h3>Sign up</h3>
	   						</div>
	   						@csrf
                            <div class="form-group">
                            	<label>Full Name</label>
                            	<input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control">
                            	<span class="font-weight-bold text-danger">
                                	@if($errors->has('full_name'))
                                		{{ $errors->first('full_name') }}
                                	@endif
                                </span>
                            </div>
                            <div class="form-group">
                            	<label>Email</label>
                            	<input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            	<span class="font-weight-bold text-danger">
                                	@if($errors->has('email'))
                                		{{ $errors->first('email') }}
                                	@endif
                                </span>
                            </div>
                            <div class="form-group">
                            	<label>Password</label>
                            	<input type="password" name="password" value="{{ old('password') }}" class="form-control">
                            	<span class="font-weight-bold text-danger">
                                	@if($errors->has('password'))
                                		{{ $errors->first('password') }}
                                	@endif
                                </span>
                            </div>
                            <div class="form-group">
                            	<label>Confirm Password</label>
                            	<input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control">
                            	<span class="font-weight-bold text-danger">
                                	@if($errors->has('confirm_password'))
                                		{{ $errors->first('confirm_password') }}
                                	@endif
                                </span>
                            </div>
                            <div class="form-group">
                            	<input type="submit" name="submit" value="Register" class="btn btn-success">
                            </div>
   	  					</div>
						<div class="panel-footer text-center">
			    			<div class="registration m-t-20 m-b-20">
								Already have an account ?<a href="{{ url('login') }}"> Login </a>
							</div>
			   			</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
