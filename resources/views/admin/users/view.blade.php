<?php
use Illuminate\Support\Facades\URL;
use App\User;
use Illuminate\Support\Facades\Auth;
?>


@extends('admin.layouts.main') @section('content')

<div class="page-header">
	<div class="row pt-3 pb-3">
		<div class="col-md-8">
			<div class="page-title ">
				<h3>{{ ucfirst($user->full_name) }}</h3>
				<span class="text-center label label-success">{{ User::getState($user->state_id) }}</span>
			</div>
		</div>
		<div class="col-md-4 d-flex justify-content-end align-items-center">
	 		<div class="row">
        		<div class="col-md-12">
        			<a href="{{url('admin/users')}}" class="btn btn-warning" title="Back"><i class="fa fa-arrow-left"></i></a>
        			<a href="{{url('admin/changePassword/'.$user->id)}}" class="btn btn-warning" title="ChangePassword"><i class="fa fa-lock"></i></a>
        			<a href="{{url('admin/user/edit/'.$user->id)}}" class="btn btn-warning" title="Update"><i class="fa fa-edit"></i> </a>
        			@if($user->id != Auth::id())
        				<a onclick="return confirm('Are you sure? You want to delete it.')" href="{{url('admin/user/delete/'.$user->id)}}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
        			@endif
        		</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="content mt-3">
    	<div class="animated fadeIn">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="col-lg-2 text-center position-relative">
    						@if(str_replace(url('/') . '/public/uploads/',"",$user->profile_file)) 
    							<img src="{!!asset($user->profile_file)!!}">
    						@else
    							<img src="{!!asset('public/img/default.png')!!}" class="css-class" alt="alt text">
    						@endif
                             <label for="file-input">
                                <i class="fa fa-edit" id="profile-icon"></i>
                                 </label>
                            <input id="file-input" type="file"/ hidden="hidden">

    						
    					</div>
    					<div class="col-lg-10">
    						<table class="table table-striped table-bordered">
    							<tbody>
    								<tr>
    									<th scope="row">Full Name:</th>
    									<td>{{$user->full_name}} </td>
    								</tr>
    								<tr>
    									<th scope="row">Email:</th>
    									<td>{{$user->email}}</td>
    								</tr>
    								<tr>
    									<th scope="row">Contact:</th>
    									<td>{{$user->country_code ? $user->country_code . '-' : ''}}{{$user->contact_no ? $user->contact_no : ''}}</td>
    								</tr>
    								<tr>
    									<th scope="row">Address:</th>
    									<td>{{$user->address}}</td>
    								</tr>
    								<tr>
    									<th scope="row">Role:</th>
    									<td>{{ User::getRole($user->role_id) }}</td>
    								</tr>
    								<tr>
    									<th scope="row">Created On:</th>
    									<td>{{$user->created_at}}</td>
    								</tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- .animated -->
    </div>
</div>

@endsection
