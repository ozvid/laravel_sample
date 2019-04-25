<header class="header home-page-two home-page-five">
	<nav class="navbar navbar-default header-navigation stricky header_navbar">
		<div class="container">
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false">
    				<span class="sr-only">Toggle navigation</span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a class="navbar-brand" href="{{url('/')}}">{{ config('app.name') }}</a>
    		</div>
    		<div class="collapse navbar-collapse main-navigation" id="main-nav-bar">
    			<ul class="nav navbar-nav navigation-box navbar-right">
    				@if(Auth::check()) 
    					<li><a href="{{url('logout')}}">Logout</a></li>
    				@else
    					<li><a href="{{url('login')}}">Login</a></li>
    					<li><a href="{{url('register')}}">Sign Up</a></li>
    				@endif
    			</ul>
    		</div>
    	</div>
	</nav>
</header>
