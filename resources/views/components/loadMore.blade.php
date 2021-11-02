@props(['id'])

@push('scripts')
    <script>
        var elId='{{ $id }}';

        if (elId == 'last_record_chat') {
            $('.msg_card_body').on('scroll', function() {
                if ($('.msg_card_body').scrollTop() == 0) {
                    dispatchLoadAmount();
                }
            });
        } else {
            dispatchLoadAmount();
        }

        function dispatchLoadAmount() {
            var lastRecord = document.getElementById(elId);
            var options = {
                root: null,
                threshold: 1,
                rootMargin: '0px'
            }
            var observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.loadMore();
                    }
                }, options);
            });

            if (lastRecord) {
                observer.observe(lastRecord);
            }
        }
    </script>
@endpush
