@php use Illuminate\Support\Facades\Session; @endphp
@extends('layout')


@section('content')

    @foreach($userFavourites as $userFavourite)
         <p class="text-white"> {{ $userFavourite->city->name }} {{ $userFavourite->city->todaysForecast->temperature }}</p>
    @endforeach

    <form method="GET" action="{{ route('forecast.search') }}"
          class="d-flex justify-content-center align-items-center vh-100">

        <div class="container" style="color: white">
            <h1 class="mb-4" style="color: white">Pronadji grad</h1>

            @if(Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
            @endif

            <div class="mb-3">
                <input type="text" name="city" class="form-control" placeholder="Unesite ime grad">
            </div>
            <button type="submit" class="btn btn-primary w-100">Pronadji</button>
        </div>

    </form>

@endsection
