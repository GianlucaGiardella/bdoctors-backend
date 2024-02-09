<section>
    <header>
        <h2 class="text-lg">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-2 row">
            <label class="col-md-6" for="name">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="name" id="name" autocomplete="name"
                    value="{{ old('name', $user->name) }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->get('name') }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-2 row">
            <label class="col-md-6" for="surname">{{ __('Surname') }}</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="surname" id="surname" autocomplete="surname"
                    value="{{ old('surname', $user->surname) }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->get('surname') }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-2 row">
            <label class="col-md-6" for="email">{{ __('Email') }}</label>
            <div class="col-md-6">
                <input id="email" name="email" type="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required autocomplete="username" />

                @error('email')
                    <span class="alert alert-danger mt-2" role="alert">
                        <strong>{{ $errors->get('email') }}</strong>
                    </span>
                @enderror
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="row align-items-center gap-4">
            <div class="col-md-6 offset-md-6">
                <button class="w-100 btn btn-primary" type="submit">{{ __('Save') }}</button>
            </div>
            @if (session('status') === 'profile-updated')
                <script>
                    const show = true;
                    setTimeout(() => show = false, 2000)
                    const el = document.getElementById('profile-status')
                    if (show) {
                        el.style.display = 'block';
                    }
                </script>
                <p id='profile-status' class="fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
