<?php
use App\User;
use Illuminate\Support\Facades\URL;
?>
@extends('admin.layouts.main') @section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
    		<div class="card-header">
    			<strong>Add</strong> User
    		</div>
			<div class="card-body card-block">
            	<form method="POST" action="" enctype="multipart/form-data">
                	@csrf
                	<div class="form-group">
						<label for="full_name">Full Name:</label>
						<input type="text" class="form-control" id="full_name" name="full_name" value="{{ old( 'full_name') }}">
						@if ($errors->has('full_name'))
                        	<div class="error">{{ $errors->first('full_name') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" id="email" name="email" value="{{ old( 'email') }}">
						@if ($errors->has('email'))
                        	<div class="error">{{ $errors->first('email') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" value="{{ old( 'password') }}">
						@if ($errors->has('password'))
                        	<div class="error">{{ $errors->first('password') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm Password:</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{ old( 'confirm_password') }}">
						@if ($errors->has('confirm_password'))
                        	<div class="error">{{ $errors->first('confirm_password') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label> Contact Number</label>
                    	<input class="form-control" type="text" id="num" name="contact_no" value="{{ old( 'contact_no') }}"/>
               			@if ($errors->has('contact_no'))
                			<div class="error">{{ $errors->first('contact_no') }}</div>
            			@endif
                   	</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control" id="address" name="address" value="{{ old( 'address') }}">
						@if ($errors->has('address'))
                        	<div class="error">{{ $errors->first('address') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label for="address">State:</label>
						<select class="form-control" name="state_id">
							<option value="" disabled>Select State...</option>
							<?php 
							foreach (User::getState() as $key => $state) { ?>
							    <option value="{{ $key }}" {{ $key == old('state_id') ? 'selected' : '' }}>{{ $state }}</option>
							<?php } ?>
						</select>
						@if ($errors->has('address'))
                        	<div class="error">{{ $errors->first('address') }}</div>
                    	@endif
					</div>
                	<div class="form-group">
                		<label for="profile_file">Image:</label>
                		<input type="file" class="form-control" id="profile_file" name="profile_file">
                		@if ($errors->has('profile_file'))
                            <div class="error">{{ $errors->first('profile_file') }}</div>
                        @endif
                	</div>
                	<div class="form-group">
                         <button type="submit" class="btn btn-success" value="save">SAVE</button>
                    </div>
            	</form>
            </div>
		</div>
	</div>
</div>



@endsection

