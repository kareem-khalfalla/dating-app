@forelse ($users as $user)
    <h3><a href="{{ route('users.profile', $user) }}">{{ $user->name }}</a></h3>
@empty

@endforelse
