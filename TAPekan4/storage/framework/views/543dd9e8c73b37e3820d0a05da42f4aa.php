
<?php $__env->startSection('title', 'Lapor Banjir'); ?>
<?php $__env->startSection('content'); ?>
<div class="form-card">
    <h2>Lapor Banjir</h2>
    <p class="form-subtitle">BPBD Kabupaten Bandung</p>
    <form action="<?php echo e(route('lapor.simpan')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="nama_pelapor">Nama Pelapor:</label>
            <input
                type="text"
                id="nama_pelapor"
                name="nama_pelapor"
                placeholder="Masukkan nama lengkap"
                required
            >
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi Kejadian (Kecamatan/Desa):</label>
            <input
                type="text"
                id="lokasi"
                name="lokasi"
                placeholder="Contoh: Bojongsoang"
                required
            >
        </div>
        <div class="form-group">
            <label for="tinggi_genangan">Tinggi Genangan Air (cm):</label>
            <input
                type="number"
                id="tinggi_genangan"
                name="tinggi_genangan"
                placeholder="Contoh: 50"
                required
            >
        </div>
        <div class="form-group">
            <label for="tanggal_kejadian">Tanggal Kejadian:</label>
            <input
                type="date"
                id="tanggal_kejadian"
                name="tanggal_kejadian"
                required
            >
        </div>

        <button type="submit">
            Kirim Laporan
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PABW\TAPekan4\resources\views/form.blade.php ENDPATH**/ ?>