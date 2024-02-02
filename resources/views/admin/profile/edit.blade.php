@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Modifica Profilo Dottore: {{ $user_data['name'] }}</h2>

		{{-- validazione errori --}}
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		{{-- validazione errori --}}

		{{-- per inserire immagini mettiamo l'enctype enctype="multipart/form-data" --}}
		<form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data" class="form-input-image">
			@csrf
			@method('PUT')
			<div class="mb-3">
				<label for="services" class="form-label">Servizi</label>
				<textarea class="form-control" id="services" name="services">{{ old('services', $profile->services) }}</textarea>
			</div>

			<div class="mb-3">
				<label for="address" class="form-label">Indirizzo dottore:</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="Inserisci indirizzo dottore"
					required minlength="1" maxlength="100" value="{{ old('address', $profile->address) }}">
			</div>

			<div class="mb-3">
				<label for="curriculum" class="form-label">CV:</label>
				<input type="text" class="form-control" id="curriculum" name="curriculum" placeholder="Inserisci CV"
					required minlength="1" maxlength="100" value="{{ old('curriculum', $profile->curriculum) }}">
			</div>

            <div class="mb-3">
				<label for="phone" class="form-label">Numero di Telefono:</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Inserisci Numero di telefono"
					required minlength="1" maxlength="100" value="{{ old('phone', $profile->phone) }}">
			</div>

			<label for="visible" class="form-label">Pubblicato:</label>
			<input class="form-check-input" type="checkbox" id="visible" value="1" name="visible"
				@checked(old('visible', $profile->visible))>

			<button type="submit" class="btn btn-primary">Modifica</button>
		</form>

	</div>
@endsection
