@extends("layout")

@section('naslovStranice')
    Prodavnica
@endsection

@section('sadrzajStranice')


    @foreach( $products as $product)

            <p>{{$product->name}}</p>
            <p>{{$product->description}}</p>

    @endforeach

    <a href="admin/add-product">Dodaj produkt</a>

@endsection
