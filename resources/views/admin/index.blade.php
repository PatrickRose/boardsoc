@extends('base.standard')

@section('title')
    Committee Admin Page
@endsection

@section('content')
    <h1 class="page-header">
        Committee Admin Page
    </h1>

    <div class="row">
        <div class="col-md-4">
            <h2 class="page-header">
                Sign up new user
            </h2>

            {!! link_to_route('users.create', 'Sign someone up') !!}
        </div>
        <div class="col-md-4">
            <h2 class="page-header">
                Sign up new user
            </h2>

            {!! link_to_route('events.create', 'Create new event') !!}
        </div>
    </div>
@endsection