<div class="laporan-card">

    <h3>{{ $laporan['lokasi_kejadian'] }}</h3>

    <p>
        <strong>Nama Pelapor:</strong>
        {{ $laporan['nama_pelapor'] }}
    </p>

    <p>
        <strong>Tinggi Genangan:</strong>
        {{ $laporan['tinggi_genangan'] }} cm
    </p>

    @if ($laporan['tinggi_genangan'] < 30)
        <span class="status waspada">
            Waspada
        </span>
    @elseif ($laporan['tinggi_genangan'] <= 70)
        <span class="status siaga">
            Siaga
        </span>
    @else
        <span class="status awas">
            Awas
        </span>
    @endif

</div>