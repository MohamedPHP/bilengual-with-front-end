<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-user"></i>
                            <p>Settings</p>
                            <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action 1</a></li>
                        <li><a href="#">Action 2</a></li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                      </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
