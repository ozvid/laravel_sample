@extends('frontend.layouts.main')

@section('content')

@if (isset($error))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $error }}</strong>
</div>
@endif

<section class="login-form">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
                <form method="post">
                	@csrf
            		<div class="panel panel-default">
    					<div class="panel-body">
    						<div class="text-center">
    							<h3 class="margin-10">Reset password</h3>
    							<p>Please fill out your email. A link to reset password will be sent there.</p>
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
                            	<input type="submit" name="submit" value="Update" class="btn btn-success">
                            </div>
        				</div>
					</div>
           		</form>
			</div>
		</div>
	</div>
</section>

@endsection
