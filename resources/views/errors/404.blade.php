@extends('frontend.layouts.main')
@section('content')
<section class="login-form">
  	<div class="container">
		<div class="wrapper">
			<div class="col-sm-offset-2 col-sm-8">
				<div class="panel card-view mb-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="text-center">
								<a href="index.php"><img src="{{ asset('public/img/error.png') }}"></a>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12 col-xs-12 text-center">
									<h3 class="mb-20 text-danger">{{ $exception->getMessage() ? $exception->getMessage() : 'Page Not Found' }}</h3>
									<a class="btn btn-success btn-rounded green-btn btn-icon right-icon  mt-30" href="{{ url('/') }}">
										<span>Back to Home</span> <i class="fa fa-space-shuttle"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
