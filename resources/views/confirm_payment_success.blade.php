
@extends('layouts.template')

@section('title')
Confirm payment success  || Wealth Angels
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

				<h2>คุณทำรายการสำเร็จ</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>คุณทำรายการสำเร็จ</li>
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
				<br>
                <img src="{{ url('img/engagement-strategicsuccess.jpg') }}" class="img-responsive center-block">
                <br>
				<p>คุณทำรายการสำเร็จ, ทางทีมงานจะรีบตรวจสอบให้เร็วที่สุด</p>

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