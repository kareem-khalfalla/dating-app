@forelse ($user->notifications as $notification)
    @if ($notification->type === 'App\Notifications\MessageNotification')
        <p>New messages request</p>
    @endif
    [{{ $notification->created_at }}] from <strong>{{ $notification->data['name'] }}</strong>
    <div>
        <a href="">accept</a>
        <a href="{{ route('profiles.messageRequestRefused', $user) }}">refuse</a>
    </div>
@empty
    <p>Empty notifications!</p>
@endforelse
