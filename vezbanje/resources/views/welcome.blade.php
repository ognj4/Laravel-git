@foreach($ocene as $ucenikovaOcena)
    <p>{{$ucenikovaOcena->predmet}} ({{$ucenikovaOcena->ocena}}) Profesor: {{$ucenikovaOcena->profesor}}</p>

@endforeach
