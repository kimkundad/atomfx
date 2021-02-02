<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="{{ url('/') }}"><img src="{{ url('assets/img/logo_website.png') }}" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="{{ url('เกี่ยวกับเรา') }}">เกี่ยวกับเรา</a></li>
						<li><a href="{{ url('บทความ') }}">บทความ</a></li>
						<li><a href="{{ url('ราคาแพ็กเกจ') }}">แพ็กเกจ</a></li>
						<li><a href="{{ url('ติดต่อเรา') }}">ติดต่อเรา</a></li>
						
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					@if (Auth::guest())
					<a href="{{ url('login') }}" class="sign-in "><i class="sl sl-icon-login"></i> เข้าสุ่ระบบ</a>
					<a href="{{ url('register') }}" class="button border with-icon">สมัครใช้งาน <i class="sl sl-icon-plus"></i></a>
					@else

					<div class="user-menu">
						<div class="user-name"><span><img src="{{ url('assets/img/avatar/'.Auth::user()->avatar) }}" alt=""></span>Hi, {{Auth::user()->name}}</div>
						<ul>
							<li><a href="{{ url('my_dashboard') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
							<li><a href="{{ url('แจ้งการชำระเงิน') }}"><i class="sl sl-icon-tag"></i> แจ้งการชำระเงิน</a></li>
							<li><a href="{{ url('logout') }}"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
					@endif
				</div>
			</div>
			<!-- Right Side Content / End -->

			
			

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->