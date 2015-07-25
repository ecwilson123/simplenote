 <div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role='presentation'><a href="{{ url('/') }}">Home</a></li>
            @if (Auth::guest())
            <li role="presentation"><a href="{{ url('/auth/register') }}">Register</a></li>
            <li role="presentation"><a href="{{ url('/auth/login') }}">Login</a></li>
            @else
            <li role="presentation">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Notes <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/notes') }}">My Notes</a></li>
                    <li><a href="{{ url('/notes/create') }}">Create Note</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/collections') }}">My Collections</a></li>
                </ul>
            </li>
            
            <li role="presentation">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::User()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/settings') }}">Settings</a></li>
                    <li><a href="{{ url('/auth/logout') }}">Log out</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>
    <h3 class="text-muted">SimpleNote</h3>
</div>