@extends('layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')

<section class="fullwidth padding-top-75 padding-bottom-75" data-background-color="#fff">

<!-- Container / Start -->
<div class="container">

	<div class="row justify-content-around">


		<!-- Contact Form -->
		<div class="col-lg-8 col-lg-offset-2">

			<section id="contact ">
				<h4 class="headline margin-bottom-35">สมัครสมาชิก</h4>

				<div id="contact-message"></div> 
                
                @error('name')
                <div class="notification error closeable">
				<p><span>Error!</span> {{ $message }}</p>
				<a class="close"></a>
			    </div>
                @enderror

                @error('password')
                <div class="notification error closeable">
				<p><span>Error!</span> {{ $message }}</p>
				<a class="close"></a>
			    </div>
                @enderror

                @error('email')
                <div class="notification error closeable">
				<p><span>Error!</span> {{ $message }}</p>
				<a class="close"></a>
			    </div>
                @enderror

                <div class="sign-in-form style-1">


                <form method="POST" action="{{ url('/register') }}" class="login">
                @csrf

                    <p class="form-row form-row-wide">
								<label for="username2">Username:
									<i class="im im-icon-Male"></i>
									<input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}" />
                                    
								</label>
							</p>
								
							<p class="form-row form-row-wide">
								<label for="email2">Email Address:
									<i class="im im-icon-Mail"></i>
									<input type="text" class="input-text" name="email" id="email" value="{{ old('email') }}" />
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password1">Password:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password" id="password1"/>
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password2">Repeat Password:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password_confirmation" id="password2"/>
								</label>
							</p>

							<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />

                    </form>
                    </div>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->

</section>





@endsection

@section('scripts')


@stop('scripts')