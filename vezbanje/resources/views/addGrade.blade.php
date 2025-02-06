<form method="POST" action="/add-user-grade">
    @csrf
    <input required name="predmet" type="text" placeholder="Naziv predmeta">
    <input required name="ocena" type="text" placeholder="Ocena">
    <input required name="profesor" type="text" placeholder="Ime profesora">
    <button>Dodaj</button>
</form>
