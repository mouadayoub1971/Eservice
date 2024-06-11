

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




    <li class="nav-group" aria-expanded="true">
        <a class="nav-link nav-group-toggle" >
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            scores
        </a>
        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link " href="{{route('professeur.scores.index')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-zoom') }}"></use>
                    </svg>
                    {{ __('My scores') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('cordinnateur_filier.scores.index')}}" target="_top"  >

                    <div class="nav-icon p-0"  style="margin-top: -10px">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    {{ __('Filier') }}
                </a>
            </li>
        </ul>
    </li>

</ul>
