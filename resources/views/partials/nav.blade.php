<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Blog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @yield('class2')><a href="/articles">Articles</a></li>
                @if (Auth::check() and Auth::user()->isAdmin)
                    <li @yield('class3')><a href="/users">Manage Users</a></li>
                @endif
                <li @yield('class4')><a href="/contact">Contact</a></li>
                <li @yield('class5')><a href="/about">About</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
                @if (Auth::check())
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        Copyright &reg; 2016 Attic Inc. - All Rights Reserved
        Powered by UNO
    </div>
</nav>