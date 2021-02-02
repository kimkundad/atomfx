@extends('layouts.template')

@section('title')
อยากลงทุนแต่ไม่รู้จะเริ่มต้นอย่างไร หรือมีปัญหาที่ไม่รู้จะปรึกษาใคร ปรึกษาเราได้ในทุกเรื่องของการลงทุน วางใจให้ แองเจิ้ล || Wealth Angels
@stop


@section('stylesheet')
@stop('stylesheet')

@section('content')


<!-- Slider
================================================== -->

<!-- Revolution Slider -->
<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

<!-- 5.0.7 auto mode -->
	<div id="rev_slider_4_1" class="rev_slider home fullwidthabanner" style="display:none;" data-version="5.0.7">
		<ul>

		@if(isset($slide))
			@foreach($slide as $u)
			<!-- Slide  -->
			<li data-index="rs-{{ $u->id }}" data-transition="fade" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="800" data-fsslotamount="7" data-saveperformance="off">

				<!-- Background -->
				<img src="{{ url('img/slide/'.$u->image) }}" alt="{{ $u->title }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina data-kenburns="on" data-duration="12000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0">

				<!-- Caption-->
				<div class="tp-caption custom-caption-2 tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
					id="slide-1-layer-2" 
					data-x="['left','left','left','left']"
					data-hoffset="['0','40','40','40']"
					data-y="['middle','middle','middle','middle']" data-voffset="['0']" 
					data-width="['640','640', 640','420','320']"
					data-height="auto"
					data-whitespace="nowrap"
					data-transform_idle="o:1;"	
					data-transform_in="y:0;opacity:0;s:1000;e:Power2.easeOutExpo;s:400;e:Power2.easeOutExpo" 
					data-transform_out="" 
					data-mask_in="x:0px;y:[20%];s:inherit;e:inherit;" 
					data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
					data-start="1000" 
					data-responsive_offset="on">

					<!-- Caption Content -->
					<div class="R_title margin-bottom-15"
					id="slide-2-layer-1"
					data-x="['left','center','center','center']"
					data-hoffset="['0','0','40','0']"
					data-y="['middle','middle','middle','middle']"
					data-voffset="['-40','-40','-20','-80']"
					data-fontsize="['32','32', '32','32','22']"
					data-lineheight="['55','55','55','32','22']"
					data-width="['640','640', 640','420','320']"
					data-height="none" data-whitespace="normal"
					data-transform_idle="o:1;"
					data-transform_in="y:-50px;sX:2;sY:2;opacity:0;s:1000;e:Power4.easeOut;"
					data-transform_out="opacity:0;s:300;"
					data-start="600"
					data-splitin="none"
					data-splitout="none"
					data-basealign="slide"
					data-responsive_offset="off"
					data-responsive="off"
					style="z-index: 6; color: #fff; letter-spacing: 0px; font-weight: 600; ">{{ $u->title }}</div>

					<div class="caption-text">{{ $u->detail }}</div>
					<a href="{{ $u->url_btn }}" class="button medium">อ่านต่อ</a>
				</div>

			</li>
			@endforeach
			@endif
			

		</ul>
		<div class="tp-static-layers"></div>

	</div>
</div>
<!-- Revolution Slider / End -->


<!-- Info Section -->
<div class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="headline centered margin-top-80">
				ทำไมต้องลงทุนกับ AtomFxs?
				<span class="margin-top-25">บางครั้งการลงทุนอาจเป็นเรื่องซับซ้อนและสับสน AtomFxs ลดความซับซ้อนของการลงทุนด้วยเครื่องมือที่ใช้งานง่าย ซึ่งช่วยเพิ่มประสิทธิภาพและความเรียบง่าย.</span>
			</h2>
		</div>
	</div>

	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<h3>เครื่องมือซื้อขายพิเศษ <br><br></h3>
				<p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Mail-withAtSign"></i>
				<h3>บทวิเคราะห์ตลาดประจำวัน <br>จากข่าวสารของ FxPro</h3>
				<p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra porta purus.</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Checked-User"></i>
				<h3>การวิเคราะห์ทางเทคนิคจาก <br> Trading Central</h3>
				<p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat pharetra consectetur.</p>
			</div>
		</div>
	</div>

</div>
<!-- Info Section / End -->
<!--
<section class="fullwidth border-top margin-top-70 padding-top-75 padding-bottom-75" data-background-color="#fff">

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">ฟีเจอร์ที่มีประสิทธิภาพ <span> ลดความซับซ้อนของการลงทุนด้วยเครื่องมือที่ใช้งานง่าย ซึ่งช่วยเพิ่มประสิทธิภาพและความเรียบง่าย</span></h3>
		</div>
		
		<div class="col-md-4">

		
			<a href="#" class="img-box" data-background-image="{{ url('assets/img/img2.jpg') }}">
				<div class="img-box-content visible">
				
					<span>ใช้ EA ในการเทรดกับ ใช้คนเทรด ต่างกันอย่างไร</span>
				</div>
			</a>

		</div>	
			
		<div class="col-md-8">

			<a href="#" class="img-box" data-background-image="{{ url('assets/img/img1.png') }}">
				<div class="img-box-content visible">
					<span>ATomFXs หุ่นยนต์เทรดอัตโนมัติs</span>
				</div>
			</a>

		</div>	

		<div class="col-md-8">

	
			<a href="#" class="img-box" data-background-image="{{ url('assets/img/img4.png') }}">
				<div class="img-box-content visible">
					<span>AtomFXs-Fund Screenshot</span>
				</div>
			</a>

		</div>	
			
		<div class="col-md-4">


			<a href="#" class="img-box" data-background-image="{{ url('assets/img/img3.png') }}">
				<div class="img-box-content visible">
					
					<span>AtomFXs-TradingView</span>
				</div>
			</a>

		</div>

	</div>
</div>

</section> -->


<!-- Pricing Tables -->
<section class="fullwidth border-top margin-top-70 padding-top-75 padding-bottom-75" data-background-color="#fff">

	<!-- Container / Start -->
	<div class="container">


		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-50">
					สร้างกองทุนการลงทุนของคุณ
				</h3>
			</div>
		</div>


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
			</div>
		</div>
		<!-- Row / End -->

	</div>
	<!-- Container / End -->

</section>
<!-- Pricing Tables / End -->



<!-- Recent Blog Posts -->
<section class="fullwidth padding-top-75 padding-bottom-75" data-background-color="#f9f9f9">
	<div class="container">

	@if(isset($blog))
	@foreach($blog as $j)
		@if($j->count > 0)
		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-50">
				{{$j->name}}
				</h3>
			</div>
		</div>

		<div class="row">
			<!-- Blog Post Item -->
			@if(isset($j->option))
			@foreach($j->option as $u)
			<div class="col-md-4">
				<a href="{{ url('blog_detail/'.$u->id) }}" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{ url('img/blog/'.$u->image) }}" alt="{{ $u->title }}">
						@if($u->type == 0)
						<span class="blog-item-tag">Tips</span>
						@else
						<span class="blog-item-tag">Stories</span>
						@endif
						
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>{{ formatDateThat($u->created_at) }}</li>
							</ul>
							<h3>{{ $u->title }}</h3>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->
			@endforeach
			@endif

		</div>
		@endif
		@endforeach
		@endif

		<div class="row">
			<div class="col-md-12 centered-content">
				<a href="{{ url('บทความ') }}" class="button border margin-top-10">View Blog</a>
			</div>
		</div>

	</div>
</section>
<!-- Recent Blog Posts / End -->

@endsection

@section('scripts')



<!-- REVOLUTION SLIDER SCRIPT -->
<script type="text/javascript" src="{{ url('assets/scripts/themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/themepunch.revolution.min.js') }}"></script>

<script type="text/javascript">
	var tpj=jQuery;			
	var revapi4;
	tpj(document).ready(function() {
		if(tpj("#rev_slider_4_1").revolution == undefined){
			revslider_showDoubleJqueryError("#rev_slider_4_1");
		}else{
			revapi4 = tpj("#rev_slider_4_1").show().revolution({
				sliderType:"standard",
				jsFileLocation:"scripts/",
				sliderLayout:"auto",
				dottedOverlay:"none",
				delay:9000,
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					onHoverStop:"on",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					}
					,
					arrows: {
						style:"zeus",
						enable:true,
						hide_onmobile:true,
						hide_under:600,
						hide_onleave:true,
						hide_delay:200,
						hide_delay_mobile:1200,
						tmp:'<div class="tp-title-wrap"></div>',
						left: {
							h_align:"left",
							v_align:"center",
							h_offset:40,
							v_offset:0
						},
						right: {
							h_align:"right",
							v_align:"center",
							h_offset:40,
							v_offset:0
						}
					}
					,
					bullets: {
				enable:false,
				hide_onmobile:true,
				hide_under:600,
				style:"hermes",
				hide_onleave:true,
				hide_delay:200,
				hide_delay_mobile:1200,
				direction:"horizontal",
				h_align:"center",
				v_align:"bottom",
				h_offset:0,
				v_offset:32,
				space:5,
				tmp:''
					}
				},
				viewPort: {
					enable:true,
					outof:"pause",
					visible_area:"80%"
			},
			responsiveLevels:[1200,992,768,480],
			visibilityLevels:[1200,992,768,480],
			gridwidth:[1180,1024,778,480],
			gridheight:[640,500,400,300],
			lazyType:"none",
			parallax: {
				type:"mouse",
				origo:"slidercenter",
				speed:2000,
				levels:[2,3,4,5,6,7,12,16,10,25,47,48,49,50,51,55],
				type:"mouse",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
		}
	});	/*ready*/
</script>		





<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
	(Load Extensions only on Local File Systems ! 
	The following part can be removed on Server for On Demand Loading) -->	
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/extensions/revolution.extension.video.min.js') }}"></script>

<script>

$(document).on('click','.btnSendData',function (event) {

	swal("กรูณา ทำการลงทะเบียนหรือล็อกอินเข้าสู่ระบบก่อน")
	.then((value) => {
		window.location.replace("{{url('login')}}");
});

});

</script>

@stop('scripts')