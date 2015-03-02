@extends('base.standard')

@section('title')
    Committee Admin Page
@endsection

@section('content')
    <h1 class="page-header">
        Committee Admin Page
    </h1>

    <div class="row">
        <div>
            <h2>
                Sign up new user
            </h2>

            {!! link_to_route('users.create', 'Sign someone up') !!}
        </div>
    </div>
@endsection