<div wire:ignore style="background-color: #fff!important; overflow-y: auto; max-height: 400px"
    class="notifications dropdown-menu dropdown-menu-lg-right dropdown-secondary"
    aria-labelledby="navbarDropdownMenuLink-5">

    <h2>Notifications</span></h2>
    @foreach ($notifications as $notification)
        @if ($notification->type == 'App\Notifications\FriendRequestDeniedNotification' && $notification->notifiable_type == 'App\Models\User')
            <a href="{{ route('profile', $notification->data['id']) }}" class="notifications-item"
                {{ $loop->last ? 'id=last_record' : '' }}>
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

    @if ($loadAmount <= count(Auth::user()->notifications))
        <p style="color:gray; text-align: center; font: bold; padding-top: 1rem">No more notifications</p>
    @endif
</div>

@push('scripts')
    <script>
        const lastRecord = document.getElementById('last_record');
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    @this.loadMore();
                }
            }, options);
        });
        if (lastRecord) {
            observer.observe(lastRecord);
        }
    </script>
@endpush