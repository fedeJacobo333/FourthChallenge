<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/app.css" type="text/css">

    <title>Travel Agency</title>
</head>

<body id="menu-body">
    <header>
        <div class="header">
            <div id="app">
                <a href="/"><h1 id="app-title">Travel Agency</h1></a>
            </div>
            <nav class="menu">
                <a class="{{ Request()->is('cities') ? 'current_page_item' : '' }}" href="/cities">Ciudades</a>
                <a class="{{ request()->is('airlines') ? 'current_page_item' : '' }}" href="/airlines">Aereolineas</a>
                <a class="{{ request()->is('flights') ? 'current_page_item' : '' }}" href="/flights">Vuelos</a>
            </nav>
        </div>
    </header>

<div class="container">
    @yield('content')
</div>
</body>
</html>
