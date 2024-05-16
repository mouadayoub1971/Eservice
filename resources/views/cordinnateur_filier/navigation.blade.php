<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
            href="{{Route("cordinateur_filier.Module.index")}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Modules') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-zoom') }}"></use>
            </svg>
            {{ __('Time Table') }}
        </a>
    </li>

</ul>
