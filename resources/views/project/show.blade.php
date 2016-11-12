Проект {{ $project->name }}

@if($usersUndertime)
    @foreach ($usersUndertime as $user)
        <p>
            {{ $user['name'] }} - {{ $user['time'] }}
        </p>
    @endforeach
@endif
