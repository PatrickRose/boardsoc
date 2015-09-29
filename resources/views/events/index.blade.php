@extends('base.standard')

@section('title')
    Events
@endsection

@section('content')

    <h1 class="page-header">
        BoardSoc Events
    </h1>

    @foreach($events->chunk(3) as $row)

        <div class="row">
            @foreach($row as $event)
                <div class="col-md-4">
                    <h2 class="page-header">
                        {!!
                        link_to_route(
                        'events.show',
                        $event->name,
                        ['event'=> $event]
                        )
                        !!}
                        <small>
                            {{ $event->date->format('l jS M') }}
                        </small>
                    </h2>

                    <p>
                        {{ $event->getFirstParagraph() }}
                    </p>
                    {!!
                    link_to_route(
                    'events.show',
                    'More information',
                    ['event'=> $event]
                    )
                    !!}
                </div>
            @endforeach
        </div>

    @endforeach
@endsection
