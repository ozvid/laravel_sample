<?php
use Illuminate\Support\Facades\URL;
use App\User;
?>
@extends('admin.layouts.main') @section('content')

<div class="breadcrumbs">
	<div class="col-sm-12">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Users</h1>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header"> 
						<strong class="card-title">Users</strong> 
						<a href="{{url('admin/user/add')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a> 
					</div>
					<div class="card-body">
						@if(!$users->isEmpty())
    						<table class="table table-striped table-bordered">
    							<thead>
    								<tr>
    									<th>Id</th>
                        				<th>Full Name</th>
                        				<th>Email</th>
                        				<th>Contact</th>
                        				<th>State</th>
                        				<th>Created On</th>
                        				<th>Action</th>
                        		 	</tr>
    							</thead>
    							<tbody>
    								@foreach ($users as $user)
        								<tr>
        									<td>{{ $user->id }}</td>
        									<td>{{ $user->full_name }}</td>
                            				<td>{{ $user->email }}</td>
                            				<td>{{ $user->contact_no }}</td>
                            				<td>{{ User::getState($user->state_id) }}</td>
                            				<td>{{ $user->created_at}}</td>
        									<td>
        										<a href="{{url('/admin/user/'.$user->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a> &nbsp;
        										<a href="{{url('/admin/user/edit/'.$user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a> &nbsp;
        										<a  onclick="return confirm('Are you sure? You want to delete it.')" href="{{url('/admin/user/delete/'.$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        									</td>
        								</tr>
    								@endforeach
    							</tbody>
    						</table>
    						{{ $users->links()}}
    					@else
    						<h4 class="text-center">No users registered</h4	>
    					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
