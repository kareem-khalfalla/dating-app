<div wire:ignore style="background-color: #fff!important; overflow-y: auto; max-height: 400px"
    class="notifications dropdown-menu dropdown-menu-lg-right dropdown-secondary"
    aria-labelledby="navbarDropdownMenuLink-5">

    <h2>{{ __('navbar.Notifications') }}</span></h2>
    @foreach ($notifications as $notification)
        <a href="{{ route('profile', $notification->data['id']) }}" class="notifications-item"
            {{ $loop->last ? 'id=last_record' : '' }}>
            <img src="{{ asset('storage/' . $notification->data['avatar']) }}" alt="img">
            <div class="text">
                </h4>
                <p>
                    {{ __('notifications.' . $notification->data['message']) }}
                </p>
            </div>
        </a>
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
