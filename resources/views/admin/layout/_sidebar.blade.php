  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
<!--       <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">EMC Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<!--         <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">{{auth()->guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.dashboard') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Главная
<!--                 <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('setting.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'setting.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Settings')}}
<!--                 <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('faq.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'faq.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Faq')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('promocode.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'promocode.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Promocodes')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rateplan.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'rateplan.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Rateplans')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('document.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'document.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Documents')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('fieldcategory.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'fieldcategory.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('FieldCategories')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('fieldtemplate.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'fieldtemplate.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('FieldTemplates')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('subscribe.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'subscribe.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Subscribes')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ticket.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'ticket.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('Tickets')}}<span class="badge badge-secondary">{{$opent_ticket_count}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('videoinstruction.index')}}" class="nav-link {{ (strpos(Route::currentRouteName(), 'videoinstruction.index') === 0) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('VideoInstructions')}}
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
