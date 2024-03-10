<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Detail Donasi</h5>
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $pdon->id }}</dd>

                <dt class="col-sm-3">Nama Lengkap</dt>
                <dd class="col-sm-9">{{ $pdon->full_name }}</dd>

                <dt class="col-sm-3">NIK</dt>
                <dd class="col-sm-9">{{ $pdon->nik }}</dd>

                <dt class="col-sm-3">Tanggal Lahir</dt>
                <dd class="col-sm-9">{{ $pdon->tempat_tanggal_lahir }}</dd>

                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9">{{ $pdon->alamat1 }}</dd>

                <dt class="col-sm-3">Kelurahan</dt>
                <dd class="col-sm-9">{{ $pdon->kelurahan }}</dd>

                <dt class="col-sm-3">Kecamatan</dt>
                <dd class="col-sm-9">{{ $pdon->kecamatan }}</dd>

                <dt class="col-sm-3">Kota</dt>
                <dd class="col-sm-9">{{ $pdon->kota }}</dd>

                <dt class="col-sm-3">Kode POS</dt>
                <dd class="col-sm-9">{{ $pdon->kode_pos }}</dd>

                <dt class="col-sm-3">No HP</dt>
                <dd class="col-sm-9">{{ $pdon->nomor_ponsel }}</dd>

                <dt class="col-sm-3">Nomor Telepon</dt>
                <dd class="col-sm-9">{{ $pdon->nomor_telepon }}</dd>

                <dt class="col-sm-3">Pendidikan Terakhir</dt>
                <dd class="col-sm-9">{{ $pdon->pendidikan_terakhir }}</dd>

                <dt class="col-sm-3">Status Pekerjaan</dt>
                <dd class="col-sm-9">{{ $pdon->status_pekerjaan }}</dd>

                <dt class="col-sm-3">TNI</dt>
                <dd class="col-sm-9">{{ $pdon->tni }}</dd>

                <dt class="col-sm-3">Pangkat Satuan Terakhir</dt>
                <dd class="col-sm-9">{{ $pdon->pangkat_satuan_terakhir }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ $pdon->status }}</dd>


                @foreach($pdon->keluarga_penerima_donasi as $index => $keluarga)
                    <dt class="col-sm-3">Anggota Keluarga {{ $index + 1 }}</dt>
                    <dd class="col-sm-9">{{ $keluarga->full_name }}</dd>
                @endforeach
            </dl>
        </div>
    </div>
</div>
