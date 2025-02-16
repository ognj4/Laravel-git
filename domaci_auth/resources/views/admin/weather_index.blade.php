<form>
    <input type="text" name="temperature" placeholder="Unesite temperaturu">
    <input type="text" name="city_id" placeholder="Unesite ID grada">
    <button>Snimi</button>
</form>

<div>

    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p>
            {{ $weather->city->name }} - {{$weather->temperature}}
        </p>

    @endforeach

</div>
