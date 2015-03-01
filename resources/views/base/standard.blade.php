<html>
<head>
    <title>@yield('title') - BoardSoc</title>
    {!! Helpers::css() !!}
</head>
<body>
{!! Navbar::withBrand('BoardSoc')->withContent('') !!}
<div class="container">
    @yield('content')
</div>
{!! Helpers::js() !!}
</body>
</html>