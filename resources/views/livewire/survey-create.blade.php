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
                        <label for="tanggal_survey" class="form-label">Tanggal Survey</label>
                        <input type="date" class="form-control" id="tanggal_survey" wire:model.defer="tanggal_survey">
                        @error('tanggal_survey') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        @if($editMode)
                            <div class="mb-3">
                                <label for="nama_staff" class="form-label">Nama Staff</label>
                                <input type="text" class="form-control" id="nama_staff" wire:model.defer="SelectedStaffName" readonly>
                                @error('SelectedStaffName') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_pdon" class="form-label">Nama Penerima Donasi</label>
                                <input type="text" class="form-control" id="nama_pdon" wire:model.defer="SelectedPdonName" readonly>
                                @error('SelectedPdonName') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="nama_staff" class="form-label">Nama Staff</label>
                                <select wire:model="selectedstaff" class="form-control" id="staffSelect">
                                    <option value="">Select Staff</option>
                                    @foreach ($this->getStaffOption($search) as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pdon" class="form-label">Nama Penerima Donasi</label>
                                <select wire:model="selectedpdon" class="form-control" id="pdonselect">
                                    <option value="">Select Penerima Donasi</option>
                                    @foreach ($this->getPdonOption($search) as $pdon)
                                        <option value="{{ $pdon->id }}">{{ $pdon->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>                    
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" rows="3" wire:model.defer="catatan"  @if($editMode) readonly @endif></textarea>
                        @error('catatan') <span class="text-danger">{{ $message }}</span> @enderror
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
            $('#staffSelect').select2({
                placeholder: "Select a Staff",
                ajax: {
                    url: '{{ route('fetch.staff.options') }}',
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

        $(document).ready(function() {
            $('#pdonSelect').select2({
                placeholder: "Select a Penerima Donasi",
                ajax: {
                    url: '{{ route('fetch.surveypdon.options') }}',
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
