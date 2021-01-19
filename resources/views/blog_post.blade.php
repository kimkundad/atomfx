@extends('layouts.template')

@section('title')
{{ $objs->title }}
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')


<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Stories and Tips </h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('/') }}">หน้าหลัก</a></li>
						<li>Stories and Tips</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-9 col-md-8 padding-right-30">


			<!-- Blog Post -->
			<div class="blog-post single-post">
				
				<!-- Img -->
				 <img class="post-img" src="{{ url('img/blog/'.$objs->image) }}" alt="{{ $objs->title }}"> 

				
				<!-- Content -->
				<div class="post-content">

					<h3>{{ $objs->title }}</h3>

					<ul class="post-meta">
						<li>{{ formatDateThat($objs->created_at) }}</li>
						@if($objs->type == 0)
						<li><a href="#">Tips</a></li>
						@else
						<li><a href="#">Stories</a></li>
						@endif
						<li><a href="#">{{ $objs->view }} ยอดเข้าชม</a></li>
					</ul>

					<p>
					{!! $objs->detail !!}
					</p>
					
					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
					<li><a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u={{ url('blog_detail/'.$objs->id) }}&t={{ $objs->title }}"
						onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
						target="_blank" title="{{ $objs->title }}"><i class="fa fa-facebook"></i> Share</a></li>
									<li><a class="twitter-share" href="https://twitter.com/share?url={{ url('blog_detail/'.$objs->id) }}&via=wealthangels&text={{ $objs->title }}"
						onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
						target="_blank" title="{{ $objs->title }}"><i class="fa fa-twitter"></i> Tweet</a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-45">
				<li class="next-post">
					@if(isset($pre))
					<a href="{{ url('blog_detail/'.$pre->id) }}"><span>Next Post</span>
					{{ $pre->title }}</a>
					@endif
				</li>
				<li class="prev-post">
					@if(isset($next))
					<a href="{{ url('blog_detail/'.$next->id) }}"><span>Previous Post</span>
					{{ $next->title }}</a>
					@endif
				</li>
			</ul>


			
            

		
        


			<div class="margin-top-50"></div>


	</div>
	<!-- Content / End -->



	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

		<!-- Widget -->
		<div class="widget margin-top-40">
				<h3>Got any questions?</h3>
				<div class="info-box margin-bottom-10">
					<p>Having any questions? Feel free to ask!</p>
					<a href="{{ url('ติดต่อเรา') }}" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
				</div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget ">
				<br>
				<h3>Popular Posts</h3>
				<ul class="widget-tabs">

				@if(isset($slide))
					<!-- Post #1 -->
					@foreach($slide as $u)
					<li>
						<div class="widget-content">
								
							
							<div class="widget-text">
								<h5><a href="{{ url('blog_detail/'.$u->id) }}">{{ $u->title }} </a></h5>
								<span>{{ formatDateThat($u->created_at) }}</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
					@endforeach
					@endif

				</ul>

			</div>
			<!-- Widget / End-->


			<!-- Widget -->
			<div class="widget margin-top-40">
				<h3 class="margin-bottom-25">Social</h3>
				<div class="header-widget " style="margin-top:20px; text-align: left; height: 74px;">
					<a target="_blank" href="{{ setting()->facebook_url }}" class="sign-in " style="margin-right: 5px;"> 
						<img src="{{ url('assets/images/facebook_logo.png') }}" alt="facebook" style="width: 52px;"> 
					</a>
					<a target="_blank" href="{{ setting()->line_oa_url }}" class="sign-in "> 
					<img src="{{ url('assets/images/line_logo.png') }}" alt="line_logo" style="width: 52px;"> 
					</a>
				</div>

			</div>
			<!-- Widget / End-->

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>

@endsection

@section('scripts')

@stop('scripts')