@foreach($prognoze as $prognoza)
    <p>Datum: {{ $prognoza->forecast_date }} - Temperatura: {{ $prognoza->temperature }}</p>
@endforeach
