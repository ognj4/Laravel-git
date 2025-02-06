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

    <form method="POST" action="/send-contact">
        {{--  ako postoji bilo koja greska ispisi prvu --}}
        @if($errors->any())
            <p>Greska: {{$errors->first()}} </p>
        @endif

        {{--        @csrf--}}
        {{csrf_field()}}
        <input type="email" name="email" placeholder="Unesi email">
        <input type="text" name="subject" placeholder="Unesi naslov poruke">
        <textarea name="description" placeholder="Opis"></textarea>
        <button>Posalji poruku</button>
    </form>


    <p>Trenutno sati: {{$sat}}</p>
    <p>Trenutno vreme je {{ $trenutnoVreme }}</p>
@endsection


