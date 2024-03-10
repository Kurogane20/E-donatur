<div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Detail Staff</h5>
            <dl class="row"> 

                <dt class="col-sm-3">Nama Lengkap</dt>
                <dd class="col-sm-9">{{ $user->full_name }}</dd>

                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9">{{ $user->alamat1 }}</dd>

                <dt class="col-sm-3">NIK</dt>
                <dd class="col-sm-9">{{ $user->nik }}</dd>

                <dt class="col-sm-3">No HP</dt>
                <dd class="col-sm-9">{{ $user->nomor_ponsel }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">No HP</dt>
                <dd class="col-sm-9">{{ $user->status }}</dd>

                <dt class="col-sm-3">Password</dt>
                <dd class="col-sm-9">{{ $user->password }}</dd>
                
            </dl>
        </div>
    </div>
</div>
