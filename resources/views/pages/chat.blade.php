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
                });

                $("#type_msg").on("keypress", (e) => {
                    if (event.which === 13) {
                        event.target.form.dispatchEvent(new Event("submit", {
                            cancelable: true
                        }));
                        event.preventDefault();
                    }
                });

                $('.msg_card_body').scroll(() => {
                    let getTop = $('.msg_card_body')[0].scrollTop;

                    if (getTop == 0) {
                        Livewire.emit('loadMore');
                        $('.msg_card_body')[0].scrollTop += 10;
                    }
                });

                //     livewire.on('load', (data) => {
                //         console.log('im here loaded');
                //         console.log(data);
                //     });
            });
        </script>
    @endpush
</x-app-layout>
