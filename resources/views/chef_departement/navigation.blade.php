


<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="true">
        <a class="nav-link nav-group-toggle" href="#">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-book"></i>
            </div>
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
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-user"></i>
            </div>
            {{ __('teachers') }}
        </a>
    </li>


    <li class="nav-item" >
        <a class="nav-link" href="{{route('professeur.modules.index')}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-book-open"></i>
            </div>
            {{ __('My subjects') }}
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
