<x-app-layout>
    @if (session('error'))
        <div style="padding-bottom: 4rem" class="alert alert-danger">
            <p class="text-danger text-center mt-4">{{ session('error') }}</p>
        </div>
    @endif
</x-app-layout>
