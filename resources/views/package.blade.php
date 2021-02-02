@extends('layouts.template')

@section('title')
Pricing Tables || Wealth Angels
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

				<h2>ราคาแพ็กเกจ</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li>ราคาแพ็กเกจ</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Pricing Tables
================================================== -->

<!-- Container / Start -->
<div class="container">

	<!-- Row / Start -->
	<div class="row">

		<div class="col-md-12">
			<div class="pricing-container margin-top-30">

			<!-- Plan #1 -->

            @if(isset($pack))
					@foreach($pack as $u)
					<div class="plan 
					@if(isset($u->text_5))
					featured
					@endif
					">

					@if(isset($u->text_5))
					<div class="listing-badge">
							<span class="featured">Featured</span>
						</div>
					@endif

						<div class="plan-price">
							<h3>{{ $u->name }}</h3>
							<span class="value">{{ $u->price }}</span>
							<span class="period">{{ $u->detail }}</span>
						</div>

						<div class="plan-features">
							<ul>
								<li>{{ $u->text_1 }}</li>
								<li>{{ $u->text_2 }}</li>
								<li>{{ $u->text_3 }}</li>
								<li>{{ $u->text_4 }}</li>
							</ul>
							@if (Auth::guest())
							<a class="button border btnSendData" >Get Started</a>
							@else
							<a class="button border " href="{{ url('add_my_package/'.$u->id) }}">Get Started</a>
							@endif
							
						</div>

					</div>
					@endforeach
					@endif

			</div>
            <br><br>
		</div>
	</div>
	<!-- Row / End -->

</div>
<!-- Container / End -->

@endsection

@section('scripts')
@stop('scripts')