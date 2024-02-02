@extends('layouts.app')
@section('title', $user_data['name'])
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				{{-- @dump($profile) --}}
				@if (isset($profile))

					{{-- Edit --}}
					<ul class="list-unstyled d-flex m-0 gap-1 justify-content-center">
						<li><a href="{{ route('admin.profile.edit', $profile) }}" class="btn btn-sm btn-warning">Modifica profilo dottore</a></li>
						<li>
							<form method="post" action="{{ route('admin.profile.destroy', $profile) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-sm btn-danger">
									{{ __('Delete Profile') }}
								</button>
							</form>
						</li>
					</ul>
					{{-- /Edit --}}

					<section class="card my-5">
						{{-- <img src="{{ $profile->getPictureUri() }}" class="card-img-top img-fluid" alt="profile image"> --}}
						<div class="card-body d-flex flex-column">
							<h5 class="card-title mb-3">{{ $user_data['name'] }} {{ $user_data['surname'] }}</h5>

							<p class="card-text">
								<strong> Servizi: </strong> {{ $profile->services }}
							</p>

							<p class="card-text">
								<strong> Photo: </strong> <img src="{{ $profile->photo }}" alt="">
							</p>

							
							<p class="card-text">
								<strong> Specializzazioni: </strong>
								@foreach ($profile->specializations as $specialization)
									{!! $specialization->name !!}
								@endforeach
							</p>

							<p class="card-text">
								<strong> Indirizzo: </strong> {{ $profile->address }}
							</p>

							<p class="card-text">
								<strong> CV: </strong> {{ $profile->curriculum }}
							</p>

							<p class="card-text">
								<strong> Email: </strong> {{ $user_data['email'] }}
							</p>

							{{-- <div class="d-flex justify-content-center gap-2">
							<a href="{{ route('dishes.index') }}" class="btn btn-primary w-50 align-self-center">Il mio Menù</a>
							<a href="{{ route('orders.index') }}" class="btn btn-secondary w-50 align-self-center">I mie Ordini</a>
						</div> --}}
						</div>
					</section>
				@else
				<div class="container">
					<div class="col-12">
						<h1 class="text-center">Non hai registrato il tuo profilo</h1>

					</div>
					<div class="col-12">
						<a href="{{ route('admin.profile.create') }}" class="btn btn-primary w-100">Registra Profilo</a>

					</div>

				</div>
				@endif

			</div>
		</div>
	@endsection
