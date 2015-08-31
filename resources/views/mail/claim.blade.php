Hi there!

Someone says that they have earned an achievement. If they have, then click the link
below and give it them.

User: {{ $user->name }}
Achievement: {{ $achievement->name }} ({{ $achievement->description }})
Give achievement: {{ route('achievements.give', ['achievement' => $achievement->id, 'user' => $user->id]) }}

(Bear in mind that another committee user might have handled this already)

The BoardSoc website
