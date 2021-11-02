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

            <div class="row col-12 p-1 row_request_user">
                <a href="{{ route('profile', $user) }}">
                    <img class="img_user" src="{{ asset('storage/' . $user->avatar) }}" alt="user image"
                        data-toggle="tooltip" data-placement="top" title="show profile">
                </a>
                
                 <div class="col-8">
            
                  <p class="row m-0"><strong>{{ __('requests.username') }} :&nbsp; </strong> <span>{{ $user->username }}</span></p>
                  <p class="row m-0"><strong>{{ __('requests.age') }} :&nbsp; </strong> <span>{{ $user->profile->getAge() }}</span></p>
                  <p class="row m-0"><strong>{{ __('requests.country') }} :&nbsp; </strong> <span>{{ $user->profile->countryOfOrigin ? $user->profile->countryOfOrigin->getCountryLocale() : 'N/A' }}</span></p>
                  <p class="row m-0"><strong>{{ __('requests.language') }} :&nbsp; </strong> <span>{{ $user->profile->nativeLanguage->nativeName ?? 'N/A' }}</span></p>

                  <button wire:click.prevent="add({{ $user->id }})" class="btn_round">{{ __('requests.Add') }}</button>
                 </div>
                
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
