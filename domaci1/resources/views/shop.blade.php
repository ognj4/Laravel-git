@extends("layout")

@section('naslovStranice')
    Prodavnica
@endsection

@section('sadrzajStranice')


    @foreach( $products as $product)

            <p>{{$product->name}}</p>
            <p>{{$product->description}}</p>

    @endforeach

@endsection
