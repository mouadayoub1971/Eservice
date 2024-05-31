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
            href="{{route('professeur.modules.index')}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Modules Enseigne') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{route('professeur.scores.index')}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-zoom') }}"></use>
            </svg>
            {{ __('scores') }}
        </a>
    </li>

</ul>
