

<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
           Dashboard
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link  {{ request()->is('modules*') ? 'active' : '' }}"
            href="{{Route("cordinateur_filier.Module.index")}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            Modules
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('TimeTable*') ? 'active' : '' }}" href="{{Route("cordinateur_filier.TimeTable.index",['classe'=>''])}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-zoom') }}"></use>
            </svg>
            {{ __('Time Table') }}
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

</ul>
