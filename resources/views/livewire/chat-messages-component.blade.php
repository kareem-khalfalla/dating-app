<div class="card">
    <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
            <div class="img_cont">
                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                <span class="online_icon {{ $isOnline ? '' : 'offline' }}"></span>
            </div>
            <div class="user_info">
                <span>{{ $user['name'] }}</span>
                <p>{{ $messagesCount }} Messages</p>
            </div>

        </div>
        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
        <div class="action_menu">
            <ul>
                <li><a href="{{ route('profile', $user['username']) }}"><i class="fas fa-user-circle"></i> View
                        profile</a></li>
                {{-- <li><i class="fas fa-users"></i> Add to close friends</li> --}}
                {{-- <li><i class="fas fa-plus"></i> Add to group</li> --}}
                <li><i class="fas fa-ban"></i> Block</li>
            </ul>
        </div>
    </div>
    <div class="card-body msg_card_body">

        @forelse ($messages as $message)
            @if ($message['from'] == Auth::id())

                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle user_img_msg">
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
            @if ($message['from'] == $user['id'])

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


        <div class="card-footer">
            <form wire:submit.prevent="addMessage">

                <div class="input-group">
                    <div class="input-group-append">
                        <span onclick="document.getElementById('file').click()" class="input-group-text attach_btn"><i
                                class="fas fa-paperclip"></i></span>
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

@push('scripts')

    <script>
        window.Echo.channel('messages').listen('MessageEvent', (e) => {
            Livewire.emit('done', e)
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            window.Livewire.on('scrollToBottom', () => {
                document.getElementById('type_msg').focus();
                setTimeout(() => {
                    let msgBody = document.querySelector('.msg_card_body');
                    msgBody.scrollTop = msgBody.scrollHeight
                }, 1000);
            });

            function submitOnEnter(event) {
                if (event.which === 13) {
                    event.target.form.dispatchEvent(new Event("submit", {
                        cancelable: true
                    }));
                    event
                        .preventDefault();
                }
            }

            document.getElementById("type_msg").addEventListener("keypress", submitOnEnter);
        });
    </script>
@endpush
