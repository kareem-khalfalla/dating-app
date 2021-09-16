<div class="row justify-content-center h-100">

    <div class="col-md-4 col-xl-3 chat">
        <div class="card mb-sm-3 mb-md-0 contacts_card">

            <div class="card-header">
                <div class="input-group">
                    <input wire:model="search" type="text" placeholder="Search..." name="" class="form-control search">
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
                                    <span>{{ $user->name }}</span>
                                    <p>{{ $user->isOnline() ? 'online' : 'offline' }}</p>
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
                        <img src="{{ asset('storage/' . $selectedUser['avatar']) }}" class="rounded-circle user_img">
                        <span class="online_icon {{ $isOnline ? '' : 'offline' }}"></span>
                    </div>
                    <div class="user_info">
                        <span>{{ $selectedUser['name'] }}</span>
                        <p>{{ $messagesCount }} Messages</p>
                    </div>

                </div>
                <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                <div class="action_menu">
                    <ul>
                        <li><a href="{{ route('profile', $selectedUser['username']) }}"><i
                                    class="fas fa-user-circle"></i>
                                View
                                profile</a></li>
                        {{-- <li><i class="fas fa-users"></i> Add to close friends</li> --}}
                        {{-- <li><i class="fas fa-plus"></i> Add to group</li> --}}
                        <li wire:click.prevent="block({{ $selectedUser['id'] }})"><i class="fas fa-ban"></i> Block</li>
                    </ul>
                </div>
            </div>

            <div class="card-body msg_card_body">

                @forelse (array_reverse($messages) as $message)
                    @if ($message['from'] == Auth::id())

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                    class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                @if ($message['url'])
                                    <img width="200" height="200" src="{{ asset('storage/' . $message['url']) }}">
                                @else
                                    {{ $message['content'] }}
                                @endif
                                <span class="msg_time">{{ $message['created_at'] }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($message['from'] == $selectedUser['id'])

                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer_send">
                                @if ($message['url'])
                                    <img width="200" height="200" src="{{ asset('storage/' . $message['url']) }}">
                                @else
                                    {{ $message['content'] }}
                                @endif
                                <span class="msg_time">{{ $message['created_at'] }}</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <p>Say HI!</p>
                @endforelse

            </div>

            <div class="card-footer">
                <form wire:submit.prevent="addMessage">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span onclick="document.getElementById('file').click()"
                                class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                        </div>
                        <input wire:model="file" id="file" type="file" style="opacity: 0; display: none">
                        <textarea autofocus wire:model.defer="message" id="type_msg" class="form-control type_msg"
                            placeholder="Type your message..."></textarea>
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
                </form>
            </div>
        </div>
    </div>
</div>