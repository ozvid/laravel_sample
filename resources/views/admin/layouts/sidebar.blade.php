<?php
use Illuminate\Support\Facades\URL;
use App\User;
use Illuminate\Support\Facades\Auth;
?>
<aside id="left-panel" class="left-panel">
	<nav class="navbar navbar-expand-sm navbar-default">
		<div class="navbar-header">
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#main-menu" aria-controls="main-menu"
				aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="{{ Url::to('/admin') }}">
				{{ config('app.name') }}
			</a>
			<a class="navbar-brand hidden" href="{{ Url::to('/admin') }}"><h2>L</h2></a>
		</div>
		<div id="main-menu" class="main-menu collapse navbar-collapse">
			<ul class="nav navbar-nav">
			    <!-- Dashboard -->
				<li class="active"><a href="{{ URL::to('admin') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a></li>
				<li class=""><a href="{{ URL::to('admin/users') }}"> <i class="menu-icon fa fa-users"></i>Users</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</nav>
</aside>
