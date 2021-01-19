
@extends('layouts.template')

@section('title')
ติดต่อเรา || Wealth Angels
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

				<h2>เกี่ยวกับเรา</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('/') }}">หน้าแรก</a></li>
						<li>เกี่ยวกับเรา</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<section class="fullwidth padding-bottom-75" data-background-color="#fff">
<!-- Container / Start -->
<div class="container " >

	<!-- Blockquote
	================================================== -->
	<div class="row">
		<div class="col-md-12">
		<!-- Headline -->
		<h4 class="headline with-border margin-top-0 margin-bottom-35">Blockquote</h4>
		<blockquote>Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui morbi pulvinar dui non quam pretium ut lacinia tortor.</blockquote>
		</div>
	</div>


	<!-- Inline Elements
	================================================== -->
	<div class="row">
		<div class="col-md-12">
		<!-- Headline -->
		<h4 class="headline with-border margin-top-45 margin-bottom-25">Inline Elements</h4>

		<p>Etiam elit est, tincidunt non tincidunt <sup>This is sup element</sup> elit, sed do. Mauris aliquet ultricies <sub>This is sub element</sub> volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ut labolore magna aliqua. <del>This is deleted element</del> enim ad minim veniam. Lorem ipsum elit <mark class="color">mark element with “color” class.</mark>, consectetur adipisicing. Lorem <dfn>dfn element here</dfn> ipsum dosectetur tincidunt sit amet, <strong>strong text</strong>. Aliquam eu id lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. Lorem ipsum dosectetur <code>Some code text</code> velit sagittis, <abbr title="The abbr tag">abbreviation</abbr> elit est <mark>highlighted text by using “mark” tag</mark>.</p>

		</div>
	</div>


	<!-- Tooltips
	================================================== -->
	<div class="row">
		<div class="col-md-12">
		<!-- Headline -->
		<h4 class="headline margin-top-40 margin-bottom-25">Tooltips</h4>

			<p>Maecenas dolor est, interdum a euismod eu, <a href="#" class="tooltip top" title="First Tooltip">tooltip from top</a> nisl. Nam sed iaculis massa. Sed nisl lectus, tempor sollicitudin est <a href="#" class="tooltip right" title="Second Tooltip">tooltip from right</a> dignissim bibendum <a href="#" class="tooltip left" title="Third Tooltip">tooltip from left</a> nam erat felis, commodo sed semper commodo vel mauris <a href="#" class="tooltip bottom" title="Fourth Tooltip">tooltip from bottom</a> bibendum tempus.</p>

		</div>
	</div>

</div>
<!-- Container / End -->
</section>


@endsection

@section('scripts')
@stop('scripts')