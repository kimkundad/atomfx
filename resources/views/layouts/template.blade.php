
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<!-- Basic Page Needs
================================================== -->
<title>@yield('title')</title>
<meta name="description" content="Wealth Angels ได้รวบรวมทุกสาระ เรื่องการเงิน จากประสบการณ์ตรงในแวดวงการเงินกว่า 10 ปี ถ้าคุณอยากจะเริ่มต้นเรียนรู้ ติดตามเราได้ thewealthangels.com">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@if(isset(setting()->facebook_image))
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:title" content="{{ setting()->facebook_title }} ">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ url('img/setting/'.setting()->facebook_image) }}">
<meta property="og:description" content="{{ setting()->facebook_detail }}">
@endif

@include('layouts.inc-style')
@yield('stylesheet')

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">




@include('layouts.inc-header')






<!-- Slider
================================================== -->

@yield('content')



@include('layouts.inc-footer')


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->



@include('layouts.inc-script')
        @yield('scripts')


</body>
</html>