<x-app-layout>
    @if (session('error'))
        <div class="container container_settings col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
            <div style="margin: auto 0; padding: 8rem 0;">
                <div style="padding-bottom: 4rem" class="alert alert-danger">
                    <p class="text-danger text-center mt-4">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
