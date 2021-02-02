
@extends('layouts.template')

@section('title')
404  || Wealth Angels
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>404 Not Found</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>404 Not Found</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">

			<section id="not-found" class="center">
				<h2>404 <i class="fa fa-question-circle"></i></h2>
				<p>We're sorry, but the page you were looking for doesn't exist.</p>

				<!-- Search -->
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="main-search-input gray-style margin-top-50 margin-bottom-10">
							<br><br>
						</div>
					</div>
				</div>
				<!-- Search Section / End -->


			</section>

		</div>
	</div>

</div>
<!-- Container / End -->


@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
@stop('scripts')