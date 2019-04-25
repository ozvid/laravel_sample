<?php
use App\User;
use Illuminate\Support\Facades\URL;
?>
@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"></div>
			<div class="card-body card-block">
				<form method="POST" action="">
					@csrf
					<div class="form-group">
						<label for="full_name">Full Name:</label>
						<input type="text" class="form-control" id="full_name" name="full_name" value="{{ old( 'full_name', $user->full_name) }}">
						@if ($errors->has('full_name'))
                        	<div class="error">{{ $errors->first('full_name') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" id="email" name="" value="{{ old( 'email', $user->email) }}" disabled>
						@if ($errors->has('email'))
                        	<div class="error">{{ $errors->first('email') }}</div>
                    	@endif
					</div>
					<div class="form-group">
						<label> Contact Number</label>
                    	<input class="form-control" type="text" id="num" name="contact_no" value="{{ old( 'contact_no', $user->contact_no) }}"/>
               			@if ($errors->has('contact_no'))
                			<div class="error">{{ $errors->first('contact_no') }}</div>
            			@endif
                   	</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control" id="address" name="address" value="{{ old( 'address', $user->address) }}">
						@if ($errors->has('address'))
                        	<div class="error">{{ $errors->first('address') }}</div>
                    	@endif
					</div>
					@if($user->role_id != User::ROLE_ADMIN)
    					<div class="form-group">
    						<label for="address">State:</label>
    						<select class="form-control" name="state_id">
    							<option value="" disabled>Select State...</option>
    							<?php 
    							foreach (User::getState() as $key => $state) { ?>
    							    <option value="{{ $key }}" {{ $key == old('state_id', $user->state_id) ? 'selected' : '' }}>{{ $state }}</option>
    							<?php } ?>
    						</select>
    						@if ($errors->has('address'))
                            	<div class="error">{{ $errors->first('address') }}</div>
                        	@endif
    					</div>
    				@else
    					<input type="hidden" name="state_id" value="{{ $user->state_id }}">
    				@endif
					<div class="form-group">
						<button type="submit" class="btn btn-success" value="save">UPDATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
