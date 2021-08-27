@forelse ($notifications as $notification)
    @if ($notification->type === 'App\Notifications\MessageNotification')
        <p>New messages request</p>
    @endif
    [{{ $notification->created_at }}] from <strong>{{ $notification->data['name'] }}</strong>
@empty
    <p>Empty notifications!</p>
@endforelse
