<div wire:ignore style="background-color: #fff!important"
    class="notifications dropdown-menu dropdown-menu-lg-right dropdown-secondary"
    aria-labelledby="navbarDropdownMenuLink-5">

    <h2>Notifications</span></h2>
    @foreach ($notifications as $notification)
        @if ($notification->type == 'App\Notifications\FriendRequestDeniedNotification' && $notification->notifiable_type == 'App\Models\User')
            <a href="{{ route('profile', $notification->data['id']) }}" class="notifications-item">
                <img src="{{ asset('storage/' . $notification->data['avatar']) }}" alt="img">
                <div class="text">
                    <h4>{{ $notification->data['username'] }}
                    </h4>
                    <p>
                        {{ $notification->data['message'] }}
                    </p>
                </div>
            </a>
        @endif
    @endforeach
</div>
