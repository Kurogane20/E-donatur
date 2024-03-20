{{-- <title>Volt Laravel Dashboard - User management</title> --}}
<div>
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="/dashboard">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                {{-- <li class="breadcrumb-item"><a href="#">Volt</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Donatur</li>
            </ol>
        </nav>
        <h2 class="h4">Daftar Keluarga Penerima Donasi</h2>
        {{-- <p class="mb-0">Your web analytics dashboard template.</p> --}}
    </div>

    <div class="input-group mb-3">
        <input wire:model="search" type="text" class="form-control" placeholder="Cari...">
        {{-- <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button> --}}
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    
    <button wire:click="create()" class="btn btn-primary">Tambah Keluarga penerima donasi</button>
    

    @if($isOpen)
        @include('livewire.kpndonasi-create')
    @endif
    @if($isOpenDetail)
        @include('livewire.kpndonasi-detail')
    @endif

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>                                                      
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluargas as $keluarga)
                            <tr>
                                <td>{{ $keluarga->id }}</td>
                                <td>{{ $keluarga->full_name }}</td>
                                <td>{{ $keluarga->nik }}</td>
                                <td>{{ $keluarga->alamat1 }}</td>
                                <td>{{ $keluarga->nomor_ponsel }}</td>  
                                {{-- <td>{{ $keluarga->penerima_donasi->full_name }}</td>                                                               --}}
                                <td>
                                    <button wire:click="edit({{ $keluarga->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                    <button wire:click="delete({{ $keluarga->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    <button wire:click="showDetail({{ $keluarga->id }})" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>