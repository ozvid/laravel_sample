<?php
use Illuminate\Support\Facades\Auth;
use App\User;
?>
<div id="right-panel" class="right-panel">
	<header id="header" class="header">
		<div class="header-menu">
			<div class="col-sm-7">
				<a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
			</div>
			<div class="col-sm-5">
				<div class="user-area dropdown float-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    					<img class="user-avatar rounded-circle" src="{{ Auth::user()->profile_file != '' ? Auth::user()->profile_file : asset('public/img/default.png') }}" alt="User Avatar">
					</a>
					<div class="user-menu dropdown-menu">
						<a class="nav-link" href="{{url('admin/profile')}}"><i class="fa fa- user"></i>My Profile</a>
						<a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-power -off"></i>Logout</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	
