@php use App\Http\ForecastsHelper;use App\Models\CitiesModel;use App\Models\ForecastsModel; @endphp

<form method="POST" action="{{ route('forecasts.create') }}">
    @csrf
    <select name="city_id">
        @foreach( CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
    <input type="text" name="temperature" placeholder="Unesite temperaturu">

    <select name="weather_type">
        @foreach( ForecastsModel::WEATHERS as $weather)
            <option>{{$weather}}</option>
        @endforeach
    </select>
    <input type="text" name="probability" placeholder="Unesite procenat padavina">
    <input type="date" name="forecast_date">
    <button>Snimi</button>
</form>

@foreach(CitiesModel::all() as $city)

    <p>{{$city->name}}</p>
    <ul>
        @foreach($city->forecasts as $forecast)

            @php $boja = ForecastsHelper::getColorByTemperature($forecast->temperature) @endphp

            <li>{{ $forecast->forecast_date }} - <span style="color: {{$boja}}"> {{ $forecast->temperature }} </span>
            </li>

        @endforeach
    </ul>

@endforeach
