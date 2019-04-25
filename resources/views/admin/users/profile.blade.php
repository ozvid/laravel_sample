<?php
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Input;
?>
@include('admin.layouts.main')
@section('content')
   
   <form method="POST" action="" enctype="multipart/form-data">
@csrf
<?php 

$new_id=$_REQUEST['id'];
$user = User::where('id',$new_id)->first();
?>
<div class="form-group" style="margin:0 auto;width:50%;text-align:left">
    <div class="form-group">
		<label for="first_name">First Name:</label> <input type="text"
			class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}">
	</div>
	<div class="form-group">
		<label for="last_name">Last Name:</label> <input type="text"
			class="form-control" id="last_name"  name="last_name" value="{{$user->last_name}}">
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
		
	</div>
	<div class="form-group">
		<label for="contact_no">Contact_no:</label> <input type="text"
			class="form-control" id="contact_no" name="contact_no" value="{{$user->contact_no}}">
	</div>
	<div class="form-group">
		<label for="address">Address:</label> <input type="text"
			class="form-control" id="address" name="address" value="{{$user->address}}">
	</div>
	<div class="form-group">
		<label for="city">City:</label> <input type="text"
			class="form-control" id="city" name="city" value="{{$user->city}}">
	</div>
	<div class="form-group">
		<label for="state">State:</label> <input type="text"
			class="form-control" id="state" name="state" value="{{$user->state}}">
	</div>
	<div class="form-group">
		<label for="country">Country:</label> <input type="text"
			class="form-control" id="country" name="country" value="{{$user->country}}">
	</div>
	<div class="form-group">
    		<label for="profile_file">Image:</label> <input type="file"
    			class="form-control" id="profile_file" name="profile_file">
    			
                <div class="error"></div>
           
    	</div>
    	
	<div class="form-group">
         <button type="submit" class="btn btn-success" value="save">UPDATE</button>
    </div>
    </div>
    
</form>
        