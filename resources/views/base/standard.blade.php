<html>
<head>
    <title>@yield('title') - BoardSoc</title>
    {!! Helpers::css() !!}
</head>
<body>
{!! Navbar::withBrand('BoardSoc')
    ->withContent( Navigation::links([
        [
            'title' => 'Home',
            'link' => route('home'),
        ],
        [
            'title' => 'About',
            'link' => route('about'),
        ],
        [
            'title' => 'Events',
            'link' => route('events.index'),
        ],
        [
            'title' => 'Library',
            'link' => route('library.index'),
        ],
])) !!}

<div class="container">
    @yield('content')
</div>
{!! Helpers::js() !!}
</body>
</html>