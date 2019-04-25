@extends('frontend.layouts.main')
@section('content')

<section class="login-form">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
        		<form action="" method="POST">
        			@csrf
            		<div class="panel panel-default">
						<div class="panel-body">
    						<div class="text-center">
    							<h3 class="margin-10">Reset password</h3>
    							<p> Please fill out your email. A link to reset password will be sent there.</p>
    						</div>
               				<div class="form-group">
               					<label for="email">Email</label>
               					<input type="email" name="email" value="{{ old('email') }}" class="form-control">
               					<span class="font-weight-bold text-danger">
                                	@if($errors->has('email'))
                                		{{ $errors->first('email') }}
                                	@endif
                                </span>
               				</div>
               				<div class="form-group">
                            	<input type="submit" name="submit" value="Reset Password" class="btn btn-success">
                            </div>
                		</div>
                	</div>
                </form>
			</div>
		</div>
	</div>
</section>

@endsection
