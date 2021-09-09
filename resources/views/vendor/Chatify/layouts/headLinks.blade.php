@push('head')

    {{-- Meta tags --}}
    <meta name="route" content="{{ $route }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('') . '/' . config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
    <script src="{{ asset('js/chatify/autosize.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
    {{-- styles --}}
    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />
    <link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chatify/' . $dark_mode . '.mode.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('css/theme/chat-style.css') }}">
    {{-- Messenger Color Style --}}
    @include('Chatify::layouts.messengerColor')
@endpush
