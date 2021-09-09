<div class="card shadow">

    <div class="card-header">
        <div class="input-group">
            <input wire:model.debounce.300ms="search" type="text" placeholder="{{ __('requests.Search') }}..." name=""
                class="form-control search">
            <div class="input-group-prepend">
                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>

    <div class="card-body">
        @foreach ($users as $user)

            <div class="row box_frind col-12 p-1">
                <a href="{{ route('profile', $user) }}">
                    <img class="img_user" src="{{ asset($user->avatar) }}"
                        alt="user image" data-toggle="tooltip" data-placement="top" title="show profile">
                </a>
                <h5 class="col-6">{{ $user->name }}</h5>
                <a href="#"><button class="btn btn-outline-success">{{ __('requests.Add') }}</button></a>&nbsp;
                <button wire:click="hide" class="btn btn-outline-secondary">{{ __('requests.Hide') }}</button>
            </div>
        @endforeach

        {{ $users->links() }}
    </div>
</div>
