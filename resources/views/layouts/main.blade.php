<!DOCTYPE html>
<html>
    <head>
        <title>Vivid Intranet</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
        <link href="/css/app.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div class="auth-bar">
                <div class="container">
                    <div class="logo"></div>
                    @if (Auth::check())
                        <nav class="auth-nav">
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
            @if (Auth::check())
                <nav class="main-nav">
                    <div class="container">
                        <ul>
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="/types/">Types</a></li>
                            <li><a href="/clients/">Client List</a></li>
                        </ul>
                    </div>
                </nav>
            @endif
        </header>
        
        @yield('content')    
    </body>
</html>
