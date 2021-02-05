<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ url('assets/scripts/jquery-2.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/custom.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script>



@if ($message = Session::get('error_confirm'))
swal("เกิดข้อผิดพลาดขึ้น กรุณาเช็คข้อมูลของคุณให้เรียบร้อย!");
@endif

@if ($message = Session::get('del_success'))
swal("ยินดีด้วย!", "คุณลบข้อมูลสำเร็จแล้ว!", "success");
@endif

@if ($message = Session::get('reject_data'))
swal("กรุณากรอกข้อมูลให้ครบ!");
@endif

@if ($message = Session::get('add_success'))
swal("ยินดีด้วย!", "คุณเพิ่มข้อมูลสำเร็จแล้ว!", "success");
@endif
</script>
{!! setting()->google_analytic !!}

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="962144800581082">
      </div>

      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HNQF3QXHHS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HNQF3QXHHS');
</script>

