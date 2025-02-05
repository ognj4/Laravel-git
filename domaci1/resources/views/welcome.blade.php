@extends("layout")

@section('naslovStranice')
    Glavna strana
@endsection



@section("sadrzajStranice")

    @if($sat >= 0 && $sat <= 12)
        <p>Dobar jutro</p>
    @else
        <p>Dobarn dan</p>
    @endif

    <p>Trenutno sati: {{$sat}}</p>
    <p>Trenutno vreme je {{ $trenutnoVreme }}</p>
@endsection


