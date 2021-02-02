
@extends('layouts.template')

@section('title')
{{ $objs->name }}  || Wealth Angels
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')


<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Package : {{ $objs->name }}</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					
				</nav>

			</div>
		</div>
	</div>
</div>

<style>
.payment-logo {
    height: 44px;
    position: absolute;
    right: 19px;
    top: 10px;
    image-rendering: -webkit-optimize-contrast;
}
</style>
<!-- Content
================================================== -->

<!-- Container -->
<div class="container">


	<div class="row">

        <div class="col-md-12">
            <form id="contactForm" method="POST" action="{{ url('submit_package') }}">
            {{ csrf_field() }}
            <h4 class="headline with-border margin-top-0 margin-bottom-35">1. เลือก Broker ของคุณ</h4>

            <div class="payment">


                @if(isset($broker))
                @foreach($broker as $u)
				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input id="paypal{{ $u->id }}" name="cardType" type="radio" value="{{ $u->id }}">
						<label for="paypal{{ $u->id }}">{{ $u->name }}</label>
						<img class="payment-logo" src="{{ url('img/broker/'.$u->image) }}" alt="{{ $u->name }}">
					</div>

				</div>
                @endforeach
                @endif


				

			</div>
			<!-- Payment Methods Accordion / End -->

            <div class="margin-bottom-30"></div>

            <h4 class="headline with-border margin-top-0 margin-bottom-35">2. เพิ่ม Account ของ Broker</h4>
            <div class="row">

				<div class="col-md-12">
					<label>Email ที่ใช้งาน</label>
					<input type="text" id="email" name="email">
                    <input type="hidden" id="package" name="pack_id" value="{{ $objs->id }}">
				</div>

				<div class="col-md-12">
					<label>Account ที่ใช้งาน</label>
					<input type="text" id="account" name="account">
				</div>

				<div class="col-md-12">
					<div class="g-recaptcha" data-sitekey="6LdBOl8UAAAAALrNu0pKZ5qiNc42G2FYKh8Jmynb"></div>
				</div>

				

			</div>

       
            <button type="submit" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">บันทึกข้อมูล</button>
            <div class="margin-bottom-70"></div>
            </form>
		</div>

    </div>
</div>
<!-- Container / End -->

@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
@stop('scripts')