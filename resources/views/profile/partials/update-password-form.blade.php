<section>
    <header>
        <h2 class="text-lg">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-2 row">
            <label class="col-md-6" for="current_password">{{ __('Current Password') }}</label>
            <div class="col-md-6">
                <input class="mt-1 form-control" type="password" name="current_password" id="current_password"
                    autocomplete="current-password">
                @error('current_password')
                    <span class="invalid-feedback mt-2" role="alert">
                        <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-2 row">
            <label class="col-md-6" for="password">{{ __('New Password') }}</label>
            <div class="col-md-6">
                <input class="mt-1 form-control" type="password" name="password" id="password"
                    autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback mt-2" role="alert">
                        <strong>{{ $errors->updatePassword->get('password') }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-2 row">
            <label class="col-md-6" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
                <input class="mt-2 form-control" type="password" name="password_confirmation" id="password_confirmation"
                    autocomplete="new-password">
                @error('password_confirmation')
                    <span class="invalid-feedback mt-2" role="alert">
                        <strong>{{ $errors->updatePassword->get('password_confirmation') }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row align-items-center gap-4">
            <div class="col-md-6 offset-md-6">
                <button type="submit" class="w-100 btn btn-primary">{{ __('Save') }}</button>
            </div>

            @if (session('status') === 'password-updated')
                <script>
                    const show = true;
                    setTimeout(() => show = false, 2000)
                    const el = document.getElementById('status')
                    if (show) {
                        el.style.display = 'block';
                    }
                </script>
                <p id='status' class=" fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
