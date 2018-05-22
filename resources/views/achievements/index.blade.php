@extends('base.standard')

@section('title')
    Achievements
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>Achievements</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            {!! $accordion !!}
        </div>
    </div>

@endsection
