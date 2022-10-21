<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
                <a class="nav-link" title="Logout" href="{{url('logout')}}" onclick="return confirm('Are you sure you want to logout?')"><span
                        class="menu-icon"><i class="mdi mdi-power"></i>
                    </span></a>
                    <h6>{{Session::get('logged_in')['name']}}
                    </h6>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>

    </div>

</nav>
