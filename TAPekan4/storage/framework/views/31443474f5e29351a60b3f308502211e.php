
<?php $__env->startSection('title', 'Daftar Laporan Banjir'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Daftar Laporan Banjir</h2>
    <div class="laporan-grid">
    <?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.laporan-card', [
            'laporan' => $item
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PABW\TAPekan4\resources\views/laporan.blade.php ENDPATH**/ ?>