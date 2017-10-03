<html>
<body>
<p>
    Hi there {{ $user->name }}!
</p>

<p>
    Just to let you know that there are some events in the next few days!
</p>

<table>
    <thead>
    <tr>
        <th>
            Event Date
        </th>
        <th>
            Event Name
        </th>
        <th>
            Description
        </th>
        <th>
            Facebook Link
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>
                {{ $event->date->format('jS F Y') }}
            </td>
            <td>
                {{ $event->name }}
            </td>
            <td>
                {!! nl2br($event->details)  !!}
            </td>
            <td>
                <a href="https://www.facebook.com/events/{{ $event->facebook }}">
                    Hit attending on Facebook!
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
