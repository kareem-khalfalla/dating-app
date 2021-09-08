<x-app-layout>
    {{-- @if ($notification->type === 'App\Notifications\MessageNotification')
        <p>New messages request</p>
    @endif --}}

    <br><br><br><br>
    <div class="container mb-4">
        <div class="row">

            <div class="col-12 col-lg-6 pt-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>{{ __('requests.All requests') }} [ {{ count($user->unreadNotifications) }} ]</h4>
                    </div>
                    <div class="card-body">

                        @forelse ($user->unreadNotifications as $notification)
                            <div class="row box_frind col-12 p-1">
                                @dump($notification->data)
                                <a href="profile-id.html">
                                    <img class="img_user" {{-- src="{{ asset($notification->data['image']) ?? asset('img/avatar.png') }}" --}}
                                        alt="{{ $notification->data['name'] }}">
                                </a>
                                <h5 class="col-5">[{{ $notification->created_at }}] {{ __('requests.from') }}
                                    <strong>{{ $notification->data['name'] }}</strong>
                                </h5>
                                <a href="#"><button class="btn btn-outline-primary">{{ __('requests.accept') }}</button></a>&nbsp;
                                <a href="{{ route('profiles.messageRequestRefused', $user) }}"><button
                                        class="btn btn-outline-danger">{{ __('requests.cancel') }}</button></a>
                            </div>
                        @empty
                            <p>{{ __('requests.Empty notifications') }}!</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 pt-2">
                @livewire('user-search-by-name-component')
            </div>

        </div>
    </div>
</x-app-layout>
