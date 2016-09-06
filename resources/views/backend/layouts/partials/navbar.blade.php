

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{ trans('lang_admin.homepage.cinema') }}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ trans('lang_admin.homepage.hd') }}</b>{{ trans('lang_admin.homepage.cinema') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">{{ trans('lang_admin.homepage.toggle_navigation') }}</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.homepage.you_messages') }}</li>
              <li class="footer"><a href="#">{{ trans('lang_admin.homepage.see_all_messages') }}</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.homepage.you_notifications') }}</li>
              <li class="footer"><a href="#">{{ trans('lang_admin.homepage.view_all') }}</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.homepage.you_tasks') }}</li>
              <li class="footer">
                <a href="#">{{ trans('lang_admin.homepage.view_all_tasks') }}</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::guard('admin')->user()->image == null)
                <img class="user-image" src="{{ url(config('path.img_default').'profile_default.jpg') }}">
              @else
                <img class="user-image" src="{{ url(config('path.upload_user').Auth::guard('admin')->user()->image) }}">
              @endif
              <span class="hidden-xs">{{ Auth::guard('admin')->user()->username }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <a href="#"><p>{{ trans('lang_admin.homepage.profile') }}</p></a>
              </li>
              <li class="user-header">
                <a href="#"><p>{{ trans('lang_admin.homepage.change_pass') }}</p></a>
              </li>
              <li class="user-header">
                <a href="{{ route('admin.logout') }}"><p>{{ trans('lang_admin.homepage.sign_out') }}</p></a>
              </li>
            
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::guard('admin')->user()->image == null)
            <img class="user-image" src="{{ url(config('path.img_default').'profile_default.jpg') }}">
          @else
            <img class="user-image" src="{{ url(config('path.upload_user').Auth::guard('admin')->user()->image) }}">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::guard('admin')->user()->username }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('lang_admin.homepage.online') }}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">{{ trans('lang_admin.homepage.title_admin') }}</li>
        <li class="treeview {{ Request::is('admin') ? "active" : "" }}">
          <a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> <span>{{ trans('lang_admin.homepage.dashboard') }}</span></a>
        </li>
        <li class="treeview {{ Request::is('admin/user/create') ? "active" : "" }}">
          <a href="{{route('admin.user.create')}}">
            <i class="fa fa-fw fa-edit"></i>
            <span>{{ trans('lang_admin.homepage.create_acc') }}</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/user') ? "active" : "" }}">
          <a href="{{route('admin.user.index')}}">
            <i class="fa fa-users"></i>
            <span>{{ trans('lang_admin.homepage.user_manager') }}</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/film') ? "active" : "" }}">
          <a href="#">
            <i class="fa fa-film"></i> <span>{{ trans('lang_admin.homepage.manage_film') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/film') ? "active" : "" }}"><a href="{{route('admin.film.index')}}"><i class="fa fa-film"></i> {{ trans('lang_admin.homepage.film') }}</a></li>
            <li class="{{ Request::is('admin/category') ? "active" : "" }}"><a href="#"><i class="fa fa-list-alt"></i> {{ trans('lang_admin.homepage.category') }}</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/booking') ? "active" : "" }}">
          <a href="#">
            <i class="fa fa-ticket"></i> <span>{{ trans('lang_admin.homepage.manage_booking') }}</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/comment') ? "active" : "" }}">
          <a href="#">
            <i class="fa fa-comments-o"></i> <span>{{ trans('lang_admin.homepage.manage_comment') }}</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-rss-square"></i> {{ trans('lang_admin.homepage.manage_ads') }}</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/advertisement') ? "active" : "" }}">
          <a href="#">
            <i class="fa fa-rss-square"></i> <span>{{ trans('lang_admin.homepage.manage_ads') }}</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
