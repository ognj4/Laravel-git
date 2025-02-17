@php use App\Http\ForecastsHelper;use App\Models\CitiesModel;use App\Models\ForecastsModel; @endphp

@extends("admin.layout")

@section("content")
    <form method="POST" action="{{ route('forecasts.create') }}" class="d-flex flex-wrap col-md-6" style="gap: 10px">

        <h3>Kreiranje novog forecasta</h3>
        @csrf
        <div class="mb-3 col-md-5">
            <select name="city_id" class="form-select">
                @foreach( CitiesModel::all() as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-5">
            <input class="form-control" type="text" name="temperature" placeholder="Unesite temperaturu">
        </div>

        <div class="mb-3 col-md-5">
            <select name="weather_type" class="form-select">
                @foreach( ForecastsModel::WEATHERS as $weather)
                    <option>{{$weather}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-5">
            <input class="form-control" type="text" name="probability" placeholder="Unesite procenat padavina">
        </div>

        <div class="mb-3 col-md-5">
            <input class="form-control" type="date" name="forecast_date">
        </div>

        <div class="col-md-5">
            <button class="btn btn-outline-primary col-12">Snimi</button>
        </div>
    </form>

    <div class="d-flex flex-wrap" style="gap:10px">
        @foreach(CitiesModel::all() as $city)

            <div>
                <p class="mb-1">{{$city->name}}</p>
                <ul class="list-group mb-4">
                    @foreach($city->forecasts as $forecast)

                        @php
                            $boja = ForecastsHelper::getColorByTemperature($forecast->temperature);
                            $ikonica = ForecastsHelper::getIconByWeatherType($forecast->weather_type);
                        @endphp

                        <li class="list-group-item">{{ $forecast->forecast_date }} -
                            <i class="fa-solid {{$ikonica}}"></i>
                            <span style="color: {{$boja}}"> {{ $forecast->temperature }} </span>
                        </li>

                    @endforeach
                </ul>
            </div>


        @endforeach
    </div>


@endsection



