@foreach($prognoza as $weather)

    <p>Sada je {{ $weather->temperature}}° u gradu {{$weather->city->name}}</p>

@endforeach
