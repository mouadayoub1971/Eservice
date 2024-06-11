<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
            href="{{route('professeur.modules.index')}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-book"></i>
            </div>
            {{ __('Modules Enseigne') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{route('professeur.scores.index')}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-pen-clip"></i>
            </div>
            {{ __('scores') }}
        </a>
    </li>

</ul>
