<?php
use App\User;
use App\Http\models\LoginHistory;
?>
@extends('admin.layouts.main')
@section('content')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Dashboard</h1>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="col-sm-12"></div>
	<a href="{{ URL::to('admin/users') }}">
		<div class="col-sm-6 col-lg-3">
			<div class="card text-white bg-flat-color-3">
				<div class="card-body pb-0">
					<div class="row">
						<div class="col">
							<h4 class="mb-0">
        						<strong>
                                <?php
                                $count = User::where('role_id', User::ROLE_USER)->count();
                                ?>
                                {{ $count }}
                                </strong>
        					</h4>
							<p class="text-light">Users</p>
						</div>
					  	<div class="col d-flex justify-content-end">
					   		<div class="icon-wrap">
					    		<i class="fa fa-users"></i>
					   		</div>
					  	</div>
					</div>
				</div>
				<div class="chart-wrapper px-0" style="height: 50px;"></div>
			</div>
		</div>
	</a>
</div>

<canvas id="lineChart"></canvas>

@endsection
