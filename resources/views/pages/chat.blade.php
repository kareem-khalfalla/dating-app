<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/theme/chat-style.css') }}">
    @endpush

    <div class="container-fluid h-100 pt-5">

        @livewire('chat-component')

    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.active').click();

                Echo.channel('messages').listen('MessageEvent', (e) => {
                    Livewire.emit('received', e)
                });

                livewire.on('scrollToBottom', () => {
                    $('#type_msg').focus();
                    $('.msg_card_body').animate({
                        scrollTop: $('.msg_card_body')[0].scrollHeight
                    }, 'slow');
                    livewire.emit('load');
                });

                $("#type_msg").on("keypress", (e) => {
                    if (event.which === 13) {
                        event.target.form.dispatchEvent(new Event("submit", {
                            cancelable: true
                        }));
                        event.preventDefault();
                        $("#type_msg").val('')
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
