<x-app-layout>
    @push('head')
        <meta name="theme-color" content="#5f023a" />
        <meta name="msapplication-navbutton-color" content="#5f023a" />
        <meta name="apple-mobile-web-app-status-bar-style" content="#5f023a" />
    @endpush
    @push('styles')
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    @endpush
    <br><br>
    @livewire('users-filter-component')
    <br><br>
    <br><br>
    @push('scripts')
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    @endpush
</x-app-layout>
