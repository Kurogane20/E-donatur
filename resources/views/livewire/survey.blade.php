{{-- <title>Volt Laravel Dashboard - User management</title> --}}
<div>
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Volt</a></li>
                <li class="breadcrumb-item active" aria-current="page">Survey</li>
            </ol>
        </nav>
        <h2 class="h4">Daftar Survey</h2>
        {{-- <p class="mb-0">Your web analytics dashboard template.</p> --}}
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    
    <div class="btn-toolbar mb-2 mb-md-0">
        <button wire:click="create" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" type="button">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Tambah Donasi
        </button>        
    </div>
    

    @if($isOpen)
        @include('livewire.survey-create')
    @endif
    {{-- @if($isOpenDetail)
        @include('livewire.donasi-detail')
    @endif --}}

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>                            
                            <th>Tanggal Survey</th>
                            <th>Nama Staff</th>
                            <th>Nama Penerima Donasi</th>
                            <th>Catatan</th>                                                        
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($surveys as $survey)
                            <tr>                               
                                <td>{{ $survey->tanggal_survey }}</td>
                                <td>{{ $survey->staff->full_name }}</td>
                                <td>{{ $survey->pdon->full_name }}</td>
                                <td>{{ $survey->catatan }}</td>                                                                
                                <td>
                                    <button wire:click="edit({{ $survey->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                    <button wire:click="delete({{ $survey->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    {{-- <button wire:click="showDetail({{ $survey->id }})" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>