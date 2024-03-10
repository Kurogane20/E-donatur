<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Detail Donatur</h5>
            <dl class="row">                

                <dt class="col-sm-3">Nama Lengkap</dt>
                <dd class="col-sm-9">{{ $donatur->full_name }}</dd>
                
                <dt class="col-sm-3">NIK</dt>
                <dd class="col-sm-9">{{ $donatur->nik }}</dd>

                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9">{{ $donatur->alamat1 }}</dd>

                <dt class="col-sm-3">Kelurahan</dt>
                <dd class="col-sm-9">{{ $donatur->kelurahan }}</dd>

                <dt class="col-sm-3">kecamatan</dt>
                <dd class="col-sm-9">{{ $donatur->kecamatan }}</dd>

                <dt class="col-sm-3">Kota</dt>
                <dd class="col-sm-9">{{ $donatur->kota }}</dd>

                <dt class="col-sm-3">Kode POS</dt>
                <dd class="col-sm-9">{{ $donatur->kode_pos }}</dd>

                <dt class="col-sm-3">No HP</dt>
                <dd class="col-sm-9">{{ $donatur->nomor_ponsel }}</dd>
                
                <dt class="col-sm-3">No Telepon</dt>
                <dd class="col-sm-9">{{ $donatur->nomor_telepon }}</dd>
                
            </dl>
        </div>
    </div>
</div>
