<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/theme/chat-style.css') }}">
    @endpush
    <div class="container-fluid h-100 pt-5">
        <div class="row justify-content-center h-100">


            <div class="col-md-4 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">

                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            @foreach ($users as $user)

                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="{{ asset($user->avatar) }}" class="rounded-circle user_img">
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
                    <div class="card-footer"></div>
                </div>
            </div>

            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                                    class="rounded-circle user_img">
                                <span class="online_icon {{ $user->isOnline() ? '' : 'offline' }}"></span>
                            </div>
                            <div class="user_info">
                                <span>Chat with Khalid</span>
                                <p>1767 Messages</p>
                            </div>

                        </div>
                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                {{-- <li><a href="{{ route('profile', ) }}"><i class="fas fa-user-circle"></i> View profile</a></li> --}}
                                {{-- <li><i class="fas fa-users"></i> Add to close friends</li> --}}
                                {{-- <li><i class="fas fa-plus"></i> Add to group</li> --}}
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                                    class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Hi, how are you samim?
                                <span class="msg_time">8:40 AM, Today</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer_send">
                                Hi Khalid i am good tnx how about you?
                                <span class="msg_time_send">8:55 AM, Today</span>
                            </div>
                            <div class="img_cont_msg">
                                <img src="img/avatar.png" class="rounded-circle user_img_msg">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="" class="form-control type_msg"
                                    placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</x-app-layout>
