<div class="container-fluid h-100 pt-5">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header search_box">
                    <div class="input-group">
                        <input wire:model="search" type="text" placeholder="{{ __('chat.Search') }}..."
                            class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        @foreach ($users as $user)
                            <li wire:click="userSelected({{ $user }})"
                                class="{{ $user->id == $selectedUser['id'] ? 'active' : '' }}"
                                id="li-{{ $user->id }}">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="{{ asset('storage/' . $user->avatar) }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon {{ $user->isOnline() ? '' : 'offline' }}"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>{{ $user->username }}</span>
                                        <p>{{ $user->isOnline() ? __('chat.online') : __('chat.offline') }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xl-6 chat">
            <div class="card">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="{{ asset('storage/' . $selectedUser['avatar']) }}"
                                class="rounded-circle user_img">
                            <span class="online_icon {{ $isOnline ? '' : 'offline' }}"></span>
                        </div>
                        <div class="user_info">
                            <span>{{ $selectedUser['username'] }}</span>
                            <p>{{ $messagesCount }} {{ __('chat.Messages') }}</p>
                        </div>
                    </div>
                    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                    @if (!$isBlockedUser)
                        <div class="action_menu">
                            <ul>
                                <li><a href="{{ route('profile', $selectedUser['id']) }}"><i
                                            class="fas fa-user-circle"></i>
                                        {{ __('chat.View') }}
                                        {{ __('chat.profile') }}</a></li>
                                <li>
                                    <a href="" wire:click.prevent="confirm({{ $selectedUser['id'] }})"><i
                                            class="fas fa-ban"></i>
                                        {{ __('chat.Block') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body msg_card_body">
                    @forelse ($messages as $message)
                        <div id="{{ $loop->iteration == $loadAmount - $loadAmount + 1 ? 'last_record' : '' }}"
                            class="d-flex justify-content-{{ $message['from'] == $userId ? 'start' : 'end' }} mb-4">
                            @if ($message['from'] == Auth::id() || $isAdmin)
                                <div class="img_cont_msg">
                                    <img src="{{ asset('storage/' . \App\Models\User::find($message['from'])->avatar) }}"
                                        class="rounded-circle user_img_msg">
                                </div>
                            @endif
                            <div class="{{ $message['from'] == Auth::id() ? 'msg_cotainer' : 'msg_cotainer_send' }}">
                                @if ($message['url'])
                                    <img width="200" height="200" src="{{ asset('storage/' . $message['url']) }}">
                                @else
                                    {{ $message['content'] }}
                                @endif
                                <span class="msg_time">{{ $message['created_at'] }}</span>
                            </div>
                        </div>
                    @empty
                        <p>{{ __('chat.Say HI') }}!</p>
                    @endforelse
                </div>
                @if (!$isBlockedUser && !$isAdmin)
                    <div class="card-footer">
                        <form wire:submit.prevent="addMessage">
                            <div class="input-group" style="direction: ltr!important;">
                                <div class="input-group-append">
                                    <span onclick="document.getElementById('file').click()"
                                        class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <input wire:model="file" id="file" type="file" style="opacity: 0; display: none">
                                <textarea autofocus wire:model.defer="message" id="type_msg"
                                    class="form-control type_msg"
                                    placeholder="{{ __('chat.Type your message') }}..."></textarea>
                                @if (!is_null($file))
                                    <div class="input-group-append">
                                        <img wire:mode="file" style="width: 160px; height: 160px"
                                            src="{{ $file->temporaryUrl() }}">
                                    </div>
                                @endif
                                <div class="input-group-append">
                                    <span wire:click="addMessage" class="input-group-text send_btn"><i
                                            class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('.msg_card_body').on('scroll', function() {
            if ($('.msg_card_body').scrollTop() == 0) {
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
                    });
                });
                if (lastRecord) {
                    observer.observe(lastRecord);
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('li').click();
        });
    </script>
@endpush
