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
                        <label for="nomor_ponsel" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="nomor_ponsel" wire:model.defer="nomor_ponsel">
                        @error('nomor_ponsel') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" wire:model.defer="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" wire:model.defer="status">
                            <option value="pembina">Pembina</option>
                            <option value="admin">Admin</option>
                            <option value="pengurus">Pengurus</option>
                            <option value="pengawas">Pengawas</option>
                            <option value="relawan">Relawan</option>
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
