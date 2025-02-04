@extends("layout")

@section('naslovStranice')
    Kontakt strana
@endsection

@section("sadrzajStranice")
    <p>Ovo je kontakt strana</p>
    <form>
        <input type="email" placeholder="Unesi email">
        <input type="text" placeholder="Subject">
        <input type="text" placeholder="Poruka">
        <button>Submit</button>
    </form>
@endsection


