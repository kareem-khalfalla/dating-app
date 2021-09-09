<x-app-layout>


    @include('Chatify::layouts.headLinks')
    <div class=" container-fluid h-100 pt-5">
        <div class="row justify-content-center h-100">

            {{-- ----------------------Users/Groups lists side---------------------- --}}
            <div class="col-md-4 col-xl-3 chat">
                <div class=" card mb-sm-3 mb-md-0 contacts_card">
                    {{-- Header and search bar --}}
                    <div class="m-header card-header">
                        <div class="input-group">
                            <input type="text" class="messenger-search form-control search" style="margin-right: 0px;" placeholder="Search" />
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    {{-- tabs and lists --}}
                    <div class="m-body card-body contacts_body">
                        {{-- Lists [Users/Group] --}}
                        {{-- ---------------- [ User Tab ] ---------------- --}}
                        <div class="@if ($route == 'user') show @endif messenger-tab app-scroll" data-view="users">

                            {{-- Favorites --}}
                            <div class="favorites-section">
                                <p class="messenger-title">Favorites</p>
                                <div class="messenger-favorites app-scroll-thin"></div>
                            </div>

                            {{-- Saved Messages --}}
                            {!! view('Chatify::layouts.listItem', ['get' => 'saved', 'id' => $id])->render() !!}

                            {{-- Contact --}}
                            <div class="listOfContacts contacts"
                                style="width: 100%;height: calc(100% - 200px);position: relative;">
                            </div>

                        </div>

                        {{-- ---------------- [ Search Tab ] ---------------- --}}
                        <div class="messenger-tab app-scroll" data-view="search">
                            {{-- items --}}
                            <p class="messenger-title">Search</p>
                            <div class="search-records">
                                <p class="message-hint center-el"><span>Type to search..</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ----------------------Messaging side---------------------- --}}
            <div class="col-md-8 col-xl-6 chat">
                <div class="messenger-messagingView card">


                    {{-- Internet connection --}}
                    <div class="internet-connection">
                        <span class="ic-connected">Connected</span>
                        <span class="ic-connecting">Connecting...</span>
                        <span class="ic-noInternet">No internet access</span>
                    </div>
                    {{-- Messaging area --}}
                    <div class="m-body app-scroll">
                        <div class="messages">
                            <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                        </div>
                        {{-- Typing indicator --}}
                        <div class="typing-indicator">
                            <div class="message-card typing">
                                <p>
                                    <span class="typing-dots">
                                        <span class="dot dot-1"></span>
                                        <span class="dot dot-2"></span>
                                        <span class="dot dot-3"></span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        {{-- Send Message Form --}}
                        @include('Chatify::layouts.sendForm')
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('Chatify::layouts.modals')
    @include('Chatify::layouts.footerLinks')
</x-app-layout>
