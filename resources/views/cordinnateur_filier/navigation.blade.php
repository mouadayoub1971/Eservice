

<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-chart-line"></i>
            </div>
           Dashboard
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link  {{ request()->is('modules*') ? 'active' : '' }}"
            href="{{Route("cordinateur_filier.Module.index")}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-book"></i>
            </div>
            Modules
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('TimeTable*') ? 'active' : '' }}" href="{{Route("cordinateur_filier.TimeTable.index",['classe'=>''])}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-regular fa-calendar-days"></i>
            </div>
            {{ __('Time Table') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{route('professeur.modules.index')}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-book-open"></i>
            </div>
            {{ __('My subjects') }}
        </a>
    </li>




    <li class="nav-group" aria-expanded="true">
        <a class="nav-link nav-group-toggle" >
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-pencil"></i>
            </div>
            scores
        </a>
        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link " href="{{route('professeur.scores.index')}}">
                    <div class="nav-icon"  style="margin-top: -10px">
                        <i class="fa-solid fa-user-ninja"></i>
                    </div>
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
