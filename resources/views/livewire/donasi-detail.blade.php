<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Detail Donasi</h5>
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $donasi->id }}</dd>

                <dt class="col-sm-3">Tanggal</dt>
                <dd class="col-sm-9">{{ $donasi->tanggal }}</dd>

                <dt class="col-sm-3">Nama Donatur</dt>
                <dd class="col-sm-9">{{ $donasi->donatur->full_name }}</dd>

                <dt class="col-sm-3">Jenis Donasi</dt>
                <dd class="col-sm-9">{{ $donasi->jenis_donasi }}</dd>

                <dt class="col-sm-3">Jumlah</dt>
                <dd class="col-sm-9">{{ $donasi->jumlah }}</dd>

                <dt class="col-sm-3">Keterangan</dt>
                <dd class="col-sm-9">{{ $donasi->keterangan }}</dd>
            </dl>
        </div>
    </div>
</div>
