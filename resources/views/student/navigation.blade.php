


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
        <a class="nav-link" href="{{Route('student.modules.index')}}">

            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-regular fa-rectangle-list"></i>
            </div>
            {{ __('My Modules') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('student.TimeTable.index')}}">

                <div class="nav-icon"  style="margin-top: -10px">
                    <i class="fa-regular fa-calendar-days"></i>
                </div>

            {{ __('My TimeTable') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{Route('student.scores.index')}}">
            <div class="nav-icon"  style="margin-top: -10px">
                <i class="fa-solid fa-pen-clip"></i>
            </div>
            {{ __('My Scores') }}
        </a>
    </li>





</ul>
