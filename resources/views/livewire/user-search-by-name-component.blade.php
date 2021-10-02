<div class="card shadow">
    <div class="card-header search_box">
        <div class="input-group">
            <input wire:model.debounce.300ms="search" type="text" placeholder="{{ __('requests.Search') }}..." 
                class="form-control search">
            <div class="input-group-prepend">
                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>
    <div class="card-body">
        @forelse ($users as $user)

            <div class="row box_frind col-12 p-1">
                <a href="{{ route('profile', $user) }}">
                    <img class="img_user" src="{{ asset('storage/' . $user->avatar) }}" alt="user image"
                        data-toggle="tooltip" data-placement="top" title="show profile">
                </a>
                <h5 class="col-8">{{ $user->prettyUsername() }}</h5>
                <button wire:click.prevent="add({{ $user->id }})"
                    class="btn btn-outline-success">{{ __('requests.Add') }}</button>
                &nbsp;
                {{-- <button class="btn btn-outline-secondary" onclick="hide()"
                    id="hide">{{ __('requests.Hide') }}</button> --}}
            </div>
        @empty
            <p>{{ __('requests.Empty members') }}!</p>
        @endforelse
        
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
