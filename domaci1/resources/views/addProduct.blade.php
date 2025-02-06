@extends("layout")

@section("sadrzajStranice")

    <form method="post" action="/admin/add-product">

        @csrf
        <input name="name" type="text" placeholder="Product">
        <input name="description" type="text" placeholder="Description">
        <input name="amount" type="text" placeholder="Amount">
        <input name="price" type="text" placeholder="Price">
        <input name="image" type="text" placeholder="Image">
        <button>Add</button>
    </form>


@endsection
