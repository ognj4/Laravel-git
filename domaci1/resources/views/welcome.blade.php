@extends("layout")

@section('naslovStranice')
    Glavna strana
@endsection

@section("sadrzajStranice")
    <p>Trenutno vreme je {{ date('H:i:s') }}</p>
@endsection


