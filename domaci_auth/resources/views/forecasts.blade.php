@foreach($city->forecasts as $prognoza)

    <p>Sunrise u {{ $sunrise }}</p>
    <p>Sunset u {{ $sunset }}</p>

    <p>Datum: {{ $prognoza->forecast_date }} - Temperatura: {{ $prognoza->temperature }}</p>
@endforeach
