<div wire:ignore.self style="background-color: #fff!important; overflow-y: auto; max-height: 400px"
    class="notifications dropdown-menu dropdown-menu-lg-right dropdown-secondary"
    aria-labelledby="navbarDropdownMenuLink-5">
    <h2>{{ __('navbar.Notifications') }}</span></h2>
    @forelse ($notifications as $notification)
        <a href="{{ route('profile', $notification->data['id']) }}" class="notifications-item"
            {{ $loop->last ? 'id=last_record_notification' : '' }}>
            <img src="{{ asset('storage/' . $notification->data['avatar']) }}" alt="img">
            <div class="text">
                </h4>
                <p>
                    {{ __('notifications.' . $notification->data['message'], ['username' => $notification->data['username']]) }}
                </p>
            </div>
        </a>
        @empty
        <p style="color:gray; text-align: center; font: bold; padding-top: 1rem">{{ __('navbar.Empty notifications') }}</p>
    @endforelse
</div>
@if (\Route::currentRouteName()!='chat')
    <x-loadMore id="last_record_notification" />
@endif
