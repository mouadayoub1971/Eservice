


<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="true">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            filiers
        </a>
        <ul class="nav-group-items">
            <li class="nav-item py-2">
                <a class="nav-link"
                   href="{{ route('chef_departement.filiers.index') }}" target="_top"  >

                    <div class="nav-icon p-0"  style="margin-top: -10px">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    {{ __('Filier') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('chef_departement.filiers.timetable') }}" target="_top"  >

                    <div class="nav-icon p-0"  style="margin-top: -10px">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    {{ __('TimeTable') }}
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('chef_departemenet.profs.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-microphone') }}"></use>
            </svg>
            {{ __('teachers') }}
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link " href="{{route('professeur.modules.index')}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-zoom') }}"></use>
            </svg>
            {{ __('My subjects') }}
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

   {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}"
            href="{{ route('permissions.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
            </svg>
            {{ __('Permissions') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            Two-level menu
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="#" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                    Child menu
                </a>
            </li>
        </ul>
    </li>--}}
</ul>
