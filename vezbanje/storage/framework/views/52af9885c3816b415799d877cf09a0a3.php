<?php $__currentLoopData = $ocene; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ucenikovaOcena): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($ucenikovaOcena->predmet); ?> (<?php echo e($ucenikovaOcena->ocena); ?>) Profesor: <?php echo e($ucenikovaOcena->profesor); ?></p>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Laravel\Laravel-git\Pomoc\vezbanje\resources\views/welcome.blade.php ENDPATH**/ ?>