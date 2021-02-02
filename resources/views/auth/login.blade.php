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
				<h4 class="headline margin-bottom-35">เข้าสู่ระบบ</h4>

				<div id="contact-message"></div> 


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
                <form method="POST" action="{{ url('/login') }}" class="login">
                @csrf
                    <p class="form-row form-row-wide">
                        <label for="username">Email:
                            <i class="im im-icon-Male"></i>
                            <input type="text" class="input-text" name="email" placeholder="Email Address" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password:
                            <i class="im im-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" placeholder="Password" />
                        </label>
                        <span class="lost_password">
                            <a href="{{ route('password.request') }}" >ลืมพาสเวิร์ด</a>
                        </span>
                    </p>

                    <div class="form-row">
                        
                        <div class="checkboxes margin-top-10">
                            <input type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember-me">จดจำฉันไว้ในระบบ</label>
                        </div>
                        
                    </div>

                    <br>
                        <input type="submit" class="button border margin-top-5" name="login" value="เข้าสู่ระบบ" />

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