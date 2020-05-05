<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      <span class="material-icons text-danger">security</span> {{ __('COVID-19') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">lock</i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#adminExample" aria-expanded="true">
          <i class="material-icons">code</i>
          <p>{{ __('Admin data') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="adminExample">
          <ul class="nav">
              <li class="nav-item{{ $activePage == 'tables' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('tables.index') }}">
                      <i class="material-icons">content_paste</i>
                      <p>{{ __('Tables') }}</p>
                  </a>
              </li>
              <li class="nav-item{{ $activePage == 'sections' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('sections.index') }}">
                      <i class="material-icons">content_paste</i>
                      <p>{{ __('Sections') }}</p>
                  </a>
              </li>
              <li class="nav-item{{ $activePage == 'indicators' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('indicators.index') }}">
                      <i class="material-icons">content_paste</i>
                      <p>{{ __('Indicators') }}</p>
                  </a>
              </li>
              <li class="nav-item{{ $activePage == 'unitMeasurement' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('unit-measurement.index') }}">
                      <i class="material-icons">content_paste</i>
                      <p>{{ __('Unit measurements') }}</p>
                  </a>
              </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'data' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('data.index') }}">
          <i class="material-icons">lists</i>
            <p>{{ __('Data') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'getData' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('get-data.index') }}">
          <i class="material-icons">lists</i>
            <p>{{ __('Get data') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
