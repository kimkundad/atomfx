<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100 align-items-center">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="{{ url('admin/dashboard') }}"><img src="{{ url('assets/img/logo_website_w.png') }}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('admin/dashboard') }}"><img src="{{ url('assets/img/logo_website_w.png') }}" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1">


            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">


              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="{{ url('assets/img/avatar/'.Auth::user()->avatar) }}" alt="profile"/>
                  <span class="nav-profile-name"> {{ Auth::user()->name }} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    
					
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('logout') }}">
                    <i class="icon-logout text-primary mr-2"></i>
                    ออกจากระบบ
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu text-dark"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a href="{{ url('admin/dashboard') }}" class="nav-link"><i class="link-icon icon-pie-chart"></i><span class="menu-title">หน้าแรก</span></a>
            </li>
           
            <li class="nav-item">
              <a href="{{ url('admin/blog') }}" class="nav-link"><i class="link-icon icon-pin"></i><span class="menu-title">บทความ</span></a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/package') }}" class="nav-link"><i class="link-icon icon-layers"></i><span class="menu-title">Package</span></a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/broker') }}" class="nav-link"><i class="link-icon icon-pin"></i><span class="menu-title">Broker</span></a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/category') }}" class="nav-link"><i class="link-icon icon-ghost"></i><span class="menu-title">หมวดหมู่</span></a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/order') }}" class="nav-link"><i class="link-icon icon-wallet"></i><span class="menu-title">Orders</span></a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/payment') }}" class="nav-link"><i class="link-icon icon-refresh "></i><span class="menu-title">แจ้งชำระเงิน</span></a>
            </li>

           
            <li class="nav-item">
              <a href="{{ url('admin/slide_show') }}" class="nav-link"><i class="link-icon icon-disc"></i><span class="menu-title">รูปสไลด์</span></a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/setting') }}" class="nav-link"><i class="link-icon icon-settings"></i><span class="menu-title">ตั้งค่า</span></a>
            </li>
            
			



          </ul>
        </div>
      </div>
    </nav>
