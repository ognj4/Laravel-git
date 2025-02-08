<form method="POST" action="/add-user-grade">
    <?php echo csrf_field(); ?>
    <input required name="predmet" type="text" placeholder="Naziv predmeta">
    <input required name="ocena" type="text" placeholder="Ocena">
    <input required name="profesor" type="text" placeholder="Ime profesora">
    <button>Dodaj</button>
</form>
<?php /**PATH D:\Laravel\Laravel-git\Pomoc\vezbanje\resources\views/addGrade.blade.php ENDPATH**/ ?>