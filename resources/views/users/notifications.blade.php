<x-app-layout>
    {{-- @if ($notification->type === 'App\Notifications\MessageNotification')
        <p>New messages request</p>
    @endif --}}

    <br><br><br><br>
    <div class="container mb-4">
        <div class="row">

            <div class="col-12 pt-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>All requests [ {{ count($user->notifications) }} ]</h4>
                    </div>
                    <div class="card-body">

                        @forelse ($user->notifications as $notification)
                            <div class="row box_frind col-12 p-1">
                                <a href="profile-id.html">
                                    <img class="img_user" src="{{ asset($notification->data['image']) ?? asset('img/avatar.png') }}" alt="{{ $notification->data['name'] }}">
                                </a>
                                <h5 class="col-5">[{{ $notification->created_at }}] from
                                    <strong>{{ $notification->data['name'] }}</strong></h5>
                                <a href="#"><button class="btn btn-outline-primary">accept</button></a>&nbsp;
                                <a href="{{ route('profiles.messageRequestRefused', $user) }}"><button class="btn btn-outline-danger">cancel</button></a>
                            </div>
                        @empty
                            <p>Empty notifications!</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
