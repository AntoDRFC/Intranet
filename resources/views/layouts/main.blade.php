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
                    <nav class="auth-nav"></nav>
                </div>
            </div>
            <nav class="main-nav">
                <div class="container">
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="/types/">Types</a></li>
                        <li><a href="/clients/">Client List</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        
        @yield('content')    
    </body>
</html>
