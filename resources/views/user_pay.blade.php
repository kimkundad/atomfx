@extends('layouts.template')

@section('title')
แจ้งการชำระเงิน || Wealth Angels
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

				<h2>แจ้งการชำระเงิน</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li>แจ้งการชำระเงิน</li>
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

		@if ($errors->has('order_id_c'))
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก หมายเลขสั่งซื้อด้วยค่ะ!</h5>

                  @endif

                  @error('name_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ชื่อผู้แจ้งด้วยค่ะ!</h5>
                  @enderror

                  @error('email_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก อีเมลด้วยค่ะ!</h5>
                  @enderror

                  @error('phone_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก เบอร์ติดต่อด้วยค่ะ!</h5>
                  @enderror

                  @error('money_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ยอดชำระเงินด้วยค่ะ!</h5>
                  @enderror


                  @error('day_tran')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ยอดชำระเงินด้วยค่ะ!</h5>
                  @enderror


                  @error('image')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณาแบนหลักฐานการชำระเงินด้วยค่ะ!</h5>
                  @enderror


        <section id="contact">
		
                <p>โปรดกรอกข้อมูลรายละเอียดการชำระเงินอย่างครบถ้วน เพื่อประโยชน์แก่ท่านเอง</p>
                <br>
				<div id="contact-message"></div> 

                <form  action="{{url('post_confirm_payment/')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}

					<div class="row">

                        <div class="col-md-6">
							<div>
								<input name="order_id_c" type="text"  placeholder="หมายเลข ID สั่งซื้อ" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="name_c" type="text"  placeholder="ชื่อ-นามสกุล" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email_c" type="email"  placeholder="อีเมล" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>

                        <div class="col-md-6">
							<div>
								<input name="phone_c" type="text"  placeholder="เบอร์ติดต่อ" required="required" />
							</div>
						</div>

						<div class="col-md-12">
							<div>
								<input name="money_c" type="text"  placeholder="จำนวนเงิน" required="required" />
							</div>
						</div>

					</div>

					
                  
                    <h5 class="margin-top-30 margin-bottom-10">โอนเงินเข้าธนาคารไหน? </h5>

                    <div class="payment">
                        <div class="payment-tab payment-tab-active">
                            <div class="payment-tab-trigger">
                                <input id="paypal1" name="bank" type="radio" value="1">
                                <label for="paypal1">Kasikorn Bank 047-3-29595-4 Acdicator Co.,Ltd.</label>
                                <img class="payment-logo" src="https://www.masterphotonetwork.com/assets/images/bank/1539933252.png" alt="Kasikorn Bank">
                            </div>

                        </div>


                        <div class="payment-tab payment-tab-active">
                            <div class="payment-tab-trigger">
                                <input id="paypal2" name="bank" type="radio" value="2">
                                <label for="paypal2">Kasikorn Bank 047-3-29595-4 Acdicator Co.,Ltd.</label>
                                <img class="payment-logo" src="https://www.masterphotonetwork.com/master/assets/image/bank/icon-bankscb.png" alt="Kasikorn Bank">
                            </div>

                        </div>
			        </div>

                    <div class="row">

                        <div class="col-md-6">
							<div class="theme-payment-page-form-item form-group">
                            <br>
                            <label id="label-r">วันที่-เวลาโอนเงิน</label>
							
                                <input type="text" id="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" value="{{ old('day_tran')}}" data-max-year="2021" data-lock="from" name="day_tran">
							</div>
						</div>

						<div class="col-md-6">
							<div>
                            <br>
                            <label id="label-r">เวลา (ชั่วโมง : นาที)</label>
								<input type="text" id="booking-time"  placeholder="10:30" name="time_tran" value="9:00 am" />
							</div>
						</div>

                        <div class="col-md-12">
							<div>
                            <br>
                            <label id="label-r">สลิปการโอนเงิน</label>
                            <input class="" type="file" name="image">
							</div>
						</div>

						

					</div>


                 

					<div>
						<div class="g-recaptcha" data-sitekey="6LdBOl8UAAAAALrNu0pKZ5qiNc42G2FYKh8Jmynb"></div>
					</div>

					<div>
						<textarea name="re_mark" cols="40" rows="3" placeholder="ข้อความถึงทีมงาน" spellcheck="true" ></textarea>
					</div>

					<button type="submit" class="submit button" >แจ้งชำระเงิน</button>

					</form>
			</section>
			
            
            <br><br>
		</div>
	</div>
	<!-- Row / End -->

</div>
<!-- Container / End -->

@endsection

@section('scripts')
<link href="{{ url('assets/css/plugins/datedropper.css') }}" rel="stylesheet" type="text/css">
<script src="{{ url('assets/scripts/datedropper.js') }}"></script>
<script>$('#booking-date').dateDropper();</script>
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugins/timedropper.css') }}">
<script src="{{ url('assets/scripts/timedropper.js') }}"></script>


<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script>

@stop('scripts')