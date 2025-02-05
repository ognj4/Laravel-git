@extends("layout")

@section('naslovStranice')
    Glavna strana
@endsection



@section("sadrzajStranice")


    @foreach($products as $product)
        <p>
            {{$product->name}}
        </p>
    @endforeach


    <p>Trenutno sati: {{$sat}}</p>
    <p>Trenutno vreme je {{ $trenutnoVreme }}</p>
@endsection


