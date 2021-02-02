
@extends('layouts.template')

@section('title')
{{Auth::user()->name}}  || Wealth Angels
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

				<h2>Dashboard</h2>

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
.list-box-listing-img a:before {
    content: "";
    height: 100%;
    width: 100%;
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    background-color: rgb(255 255 255 / 0%);
    border-radius: 4px;
    z-index: 11;
}
.numerical-rating {
    width: 150px;
}
.dashboard-list-box {
    margin: 0px 0 0 0;
}
.dashboard-list-box ul li img {
    height: 58px;
    width: 58px;
    color: #777;
    text-align: center;
    line-height: 37px;
    border-radius: 50%;
    transition: 0.3s;
    display: inline-block;
    background-color: #eee;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 30px;
}
.dashboard-list-box.with-icons ul li {
    padding-left: 100px;
}
body p {
    font-size: 16px;
    line-height: 29px;
}
</style>
<!-- Content
================================================== -->

<!-- Container -->
<div class="container">


	<div class="row">

        <div class="col-md-3">
        
        
        <img src="{{ url('assets/img/avatar/'.Auth::user()->avatar) }}" alt="{{Auth::user()->name}}">
        <h3>{{Auth::user()->name}}</h3>
            <div class="boxed-widget margin-top-30 margin-bottom-50">
                    <ul class="list-1">
						<li><a href="{{ url('my_dashboard') }}">Dashboard</a></li>
						<li><a href="{{ url('my_payment') }}">แจ้งการชำระเงิน</a></li>
						<li><a href="{{ url('logout') }}">ออกจากระบบ</a></li>
					</ul>
            </div>
		</div>

        <div class="col-md-9">
            
           
           
        <a href="{{ url('ราคาแพ็กเกจ') }}" class="button booking-confirmation-btn">เพิ่ม Account</a>
                


                <div class="dashboard-list-box invoices with-icons ">
					<h4>Active Listings</h4>
					<ul>
                    @if(isset($objs))
                    @foreach($objs as $u)

                    <?php 

                          $datediff = strtotime(($u->end)) - strtotime((date("Y-m-d")));
                          $days = floor($datediff / (60 * 60 * 24));
                          if($days < 0){
                            $days = 0;
                          }
                         ?>

						<li>
                        <img src="{{ url('img/broker/'.$u->image_b) }}" alt="{{ $u->name_b}}">
                            <p style="margin: 0 0 5px;">ID : <b>{{$u->order_id}}</b></p>
                            <p style="margin: 0 0 5px;">Package : <b>{{$u->name_p}}</b></p>
							<strong>{{ $u->email_ac }}</strong>
							<ul>
                              @if($u->status_x == 0)
                              <li class="unpaid">รอการตรวจสอบ</li>
                              @elseif($u->status_x == 1)
                              <li class="paid">พร้อมใช้งาน</li>
                               @elseif($u->status_x == 2)
                               <li class="unpaid">หมดอายุ</li>
                              @else
                              <li class="unpaid">ปิดการใช้งาน</li>
                              @endif
							
								<li>Account: {{ $u->account_ac }}</li>
								<li>จำนวนวัน: {{ ($days) }}</li>
							</ul>
							<div class="buttons-to-right">
                                <a href="{{ url('edit_my_package/'.$u->id_q) }}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="{{ url('api/del_my_package/'.$u->id_q) }}" onclick="return confirm('Are you sure?')" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

                        @endforeach
					@endif
						
						
                    

					</ul>
				</div><br><br>
            
		</div>


        

    </div>
</div>
<!-- Container / End -->




@endsection

@section('scripts')
@stop('scripts')