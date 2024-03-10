<!-- resources/views/livewire/doansi-create.blade.php -->
<div class="modal fade show" tabindex="-1" style="display:block; background:rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="full_name" wire:model.defer="full_name">
                        @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tempat_tanggal_lahir" class="form-label">Tanggal lahir</label>
                        <input type="date" class="form-control" id="tempat_tanggal_lahir" wire:model.defer="tempat_tanggal_lahir">
                        @error('tempat_tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" wire:model.defer="nik">
                        @error('nik') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat1" wire:model.defer="alamat1">
                        @error('alamat1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" wire:model.defer="kecamatan">
                        @error('kecamatan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" wire:model.defer="kelurahan">
                        @error('kelurahan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" wire:model.defer="kota">
                        @error('kota') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nomor_ponsel" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomor_ponsel" wire:model.defer="nomor_ponsel">
                        @error('nomor_ponsel') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" wire:model.defer="nomor_telepon">
                        @error('nomor_telepon') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @if($editMode)
                        <div class="mb-3">
                            <label for="status_donasi" class="form-label">Status Donasi</label>
                            <input type="text" class="form-control" id="status_donasi" wire:model.defer="status_donasi">
                            @error('status_donasi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    @endif
                    
                    
                    <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
