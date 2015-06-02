<html>
<head>
    <title>@yield('title') - BoardSoc</title>
    {!! Helpers::css() !!}
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <meta charset="UTF-8">
</head>
<body>
{!! Navbar::withBrand('BoardSoc')
    ->withContent(
        Navigation::links([
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
            [
                'title' => 'Admin',
                'link' => route('admin.index'),
                'callback' => function() {
                    return Auth::check() && Auth::user()->is_committee;
                }
            ],
        ])
    )
    ->withContent(
        $loginFormOrLogoutLink
    )!!}

<div class="container">
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach

    @yield('content')
</div>
{!! Helpers::js() !!}
<script src="{{ asset('search.js') }}"></script>
</body>
</html>