@extends("layout")

@section('naslovStranice')
    Prodavnica
@endsection

@section('sadrzajStranice')


    @foreach( $products as $product)

        @if( $product == "Iphone 14" || $product == "Iphone 15 pro")
            <p>{{$product}} - SUPER SNIZENJE</p>
        @else
            <p>{{$product}}</p>
        @endif


    @endforeach

@endsection
