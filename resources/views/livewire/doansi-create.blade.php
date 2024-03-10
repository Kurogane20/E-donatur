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
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" wire:model.defer="tanggal">
                        @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        @if($editMode)
                            <div class="mb-3">
                                <label for="nama_donatur" class="form-label">Nama Donatur</label>
                                <input type="text" class="form-control" id="nama_donatur" wire:model.defer="selectedDonaturName" readonly>
                                @error('selectedDonaturName') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="nama_donatur" class="form-label">Nama Donatur</label>
                                <select wire:model="selectedDonatur" class="form-control" id="donaturSelect">
                                    <option value="">Select Donatur</option>
                                    @foreach ($this->getDonaturOptions($search) as $donatur)
                                        <option value="{{ $donatur->id }}">{{ $donatur->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="jenis_donasi" class="form-label">Jenis Donasi</label>
                        <input type="text" class="form-control" id="jenis_donasi" wire:model.defer="jenis_donasi">
                        @error('jenis_donasi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" wire:model.defer="jumlah">
                        @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" wire:model.defer="keterangan"  @if($editMode) readonly @endif></textarea>
                        @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#donaturSelect').select2({
                placeholder: "Select a Donatur",
                ajax: {
                    url: '{{ route('fetch.donatur.options') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
