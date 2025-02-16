@php use App\Models\CitiesModel;use App\Models\WeatherModel; @endphp

<form>
    <input type="text" name="temperature" placeholder="Unesite temperaturu">
    <select name="city_id">
        @foreach(CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
    <button>Snimi</button>
</form>

<div>

    @foreach(WeatherModel::all() as $weather)
        <p>
            {{ $weather->city->name }} - {{$weather->temperature}}
        </p>

    @endforeach

</div>
