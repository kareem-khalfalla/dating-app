<h1>Profile</h1>
<p>{{ $user->name }}</p>
<p><a href="{{ route('profiles.messageRequest', $user) }}">send message request</a></p>