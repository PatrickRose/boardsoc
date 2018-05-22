@extends('base.standard')

@section('title')
    Committee Admin Page
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>
                    Committee Admin Page
                </h3>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="container mtb">
        <div class="row">
            <div class="col-md-4">
                <h2 class="page-header">
                    Sign up new user
                </h2>

                {!! link_to_route('users.create', 'Sign someone up', [], ['class' => 'btn btn-default']) !!}
            </div>
            <div class="col-md-4">
                <h2 class="page-header">
                    Create new event
                </h2>

                {!! link_to_route('events.create', 'Create new event', [], ['class' => 'btn btn-default']) !!}
            </div>
            <div class="col-md-4">
                <h2 class="page-header">
                    Library Admin
                </h2>

                {!! link_to_route('library.create', 'Add game to library', [], ['class' => 'btn btn-default']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2 class="page-header">
                    Achievement Admin
                </h2>

                {!! link_to_route('achievements.create', 'Add achievement', [], ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    </div>
@endsection
