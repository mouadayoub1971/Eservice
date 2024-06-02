<style>
    .profile:hover{
        box-shadow: 0 7px 18px 0 rgba(0, 0, 0, -0.0), 0 16px 19px 0 rgba(0, 0, 0, 0.10);
        padding: 2px;
        transition: .3s;
    }
</style>

<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('icons/brand.svg#full') }}"></use>
            </svg>
        </a>
        <ul class="header-nav ms-auto">

        </ul>
        @auth
            <div class="profile" style="display: flex ; align-items: center " >
            <ul class="header-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="avatar" style="width: 45px">
                            <img class="avatar-img" src="{{  url(Auth::user()->avatar) ? url(Auth::user()->avatar) : asset('img/default-avatar.jpg') }}"
                                alt="{{ Auth::user()->email }}">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <a class="dropdown-item" href="{{ route("profile.index",Auth::user()->id)}}">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                            </svg>
                            {{ __('My profile') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>
                            </svg>
                            {{ __('Logout') }}
                        </a>

                    </div>
                </li>
            </ul>
            <h5 style="margin: 0">{{Auth::user()->name}}</h5>
            </div>
        @endauth
        @if (trim($__env->yieldContent('breadcrumbs')))
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        @yield('breadcrumbs')
                    </ol>
                </nav>
            </div>
        @endif
    </div>
</header>
