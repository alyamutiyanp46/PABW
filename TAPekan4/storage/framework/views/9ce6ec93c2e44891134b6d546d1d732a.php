<div class="laporan-card">
    <h3><?php echo e($laporan->lokasi); ?></h3>
    <p>
        <strong>Nama Pelapor:</strong>
        <?php echo e($laporan->nama_pelapor); ?>

    </p>
    <p>
        <strong>Tinggi Genangan:</strong>
        <?php echo e($laporan->tinggi_genangan); ?> cm
    </p>
    <p>
        <strong>Tanggal Kejadian:</strong>
        <?php echo e($laporan->tanggal_kejadian); ?>

    </p>
    <?php if($laporan->tinggi_genangan < 30): ?>
        <span class="status waspada">
            Waspada
        </span>
    <?php elseif($laporan->tinggi_genangan <= 70): ?>
        <span class="status siaga">
            Siaga
        </span>
    <?php else: ?>
        <span class="status awas">
            Awas
        </span>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\PABW\TAPekan4\resources\views/partials/laporan-card.blade.php ENDPATH**/ ?>