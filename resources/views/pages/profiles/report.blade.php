<x-app-layout>
    <div class="col-12 col-md-6 m-auto pt-3" style="margin-top: 6rem!important">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @else

            <div class="card">
                <div class="card-header">
                    <h3>Report</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.reportStore', $user) }}" method="post">
                        @csrf
                        <input type="text" class="form-control form-lg mb-2" readonly value="{{ $user->name }}">

                        <textarea name="reason" class="form-control @error('reason') is-invalid @enderror" cols="30"
                            rows="5"></textarea>
                        @error('reason')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                        <button class="btn btn-dark btn-block mt-3">{{ __('welcome.Send') }}</button>
                    </form>

                </div>
            </div>
        @endif
    </div>
</x-app-layout>
