@extends('layout')


@section('content')


    <form method="GET" action="{{ route('forecast.search') }}" class="d-flex justify-content-center align-items-center vh-100">

        <div class="container">
            <h1 class="mb-4" style="color: white">Pronadji grad</h1>


            <div class="mb-3">
                <input type="text" name="city" class="form-control" placeholder="Unesite ime grada" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Pronadji</button>
        </div>

    </form>

@endsection
