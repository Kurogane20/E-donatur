<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\keluarga_penerima_donasi;
use App\Models\penerima_donasi;
use Livewire\WithPagination;

class KeluargaPenerimaDOnasiController extends Component
{
    public $isOpen;    
    public $full_name;
    public $nik;
    public $tempat_tanggal_lahir;
    public $alamat1;
    public $alamat2;
    public $kecamatan;
    public $kelurahan;
    public $kota;
    public $kode_pos;
    public $nomor_ponsel;
    public $nomor_telepon;
    public $pendidikan_terakhir;
    public $status_pekerjaan;
    public $pekerjaan_terakhir;
    public $status;
    public $id_pdon;
    public $idToUpdate;
    public $selectedPdonName;
    public $editMode = false; 
    public $modalTitle = "Tambah Keluarga Penerima Donasi";
    public $search = '';
    public $SelectedPdon = null;
    public $keluarga;
    public $isOpenDetail = false;
    public $keluargaDetail;
    use WithPagination;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        $keluargas = keluarga_penerima_donasi::where('full_name', 'like', '%'.$this->search.'%')
                           ->orWhere('nik', 'like', '%'.$this->search.'%')
                           ->orWhere('alamat1', 'like', '%'.$this->search.'%')
                           ->orWhere('nomor_ponsel', 'like', '%'.$this->search.'%')
                           ->paginate(10); // Change the value according to your preference

        return view('livewire.kpndonasi', ['keluargas' => $keluargas ]);
    }

     public function create()
    {
         $this->editMode = false; // Atur editMode menjadi true saat melakukan edit
        $this->modalTitle = "Tambah Penerima Donasi"; // Ganti judul modal menjadi "Edit Doansi"
        $this->resetInputFields();
        $this->openModal();
    }

     public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'id_pdon' => 'required',
            'nik' => 'required',
            'tempat_tanggal_lahir' =>'required',
            'alamat1' => 'required',            
            'nomor_ponsel' => 'required',            
        ]);
        
        keluarga_penerima_donasi::create([
            'full_name' => $this->full_name,
            'nik' => $this->nik,
            'tempat_tanggal_lahir' => $this->tempat_tanggal_lahir,
            'alamat1' => $this->alamat1,
            'alamat2' => $this->alamat2,
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'kota' => $this->kota,
            'kode_pos' => $this->kode_pos,
            'nomor_ponsel'=> $this->nomor_ponsel,
            'nomor_telepon'=> $this->nomor_telepon,
            'pendidikan_terakhir'=> $this->pendidikan_terakhir,
            'status_pekerjaan'=> $this->status_pekerjaan,
            'pekerjaan_terakhir'=> $this->pekerjaan_terakhir,
            'id_pdon'=> $this->id_pdon,            
            'status'=> $this->status,            
        ]);

        session()->flash('message', 'Keluarga Penerima donatur telah dtambahkan');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->idToUpdate = $id;
        $keluarga = keluarga_penerima_donasi::findOrFail($id);
        $this->editMode = true; // Atur editMode menjadi true saat melakukan edit
        $this->modalTitle = "Edit Penerima Donasi"; // Ganti judul modal menjadi "Edit Doansi"
        $this->id = $id;
        $this->full_name = $keluarga->full_name;
        $this->nik = $keluarga->nik;
        $this->tempat_tanggal_lahir = $keluarga->tempat_tanggal_lahir;
        $this->alamat1 = $keluarga->alamat1;
        $this->alamat2 = $keluarga->alamat2;
        $this->kecamatan = $keluarga->kecamatan;
        $this->kelurahan = $keluarga->kelurahan;
        $this->kota = $keluarga->kota;
        $this->kode_pos = $keluarga->kode_pos;
        $this->nomor_ponsel = $keluarga->nomor_ponsel;
        $this->nomor_telepon = $keluarga->nomor_telepon;
        $this->pendidikan_terakhir = $keluarga->pendidikan_terakhir;
        $this->status_pekerjaan = $keluarga->status_pekerjaan;
        $this->pekerjaan_terakhir = $keluarga->pekerjaan_terakhir;
        $this->id_pdon = $keluarga->id_pdon;
        $this->status = $keluarga->status;
        $this->selectedPdonName = $keluarga->penerima_donasi->full_name;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'full_name' => 'required',
            'nik' => 'required',
            'tempat_tanggal_lahir' =>'required',
            'alamat1' => 'required',            
            'nomor_ponsel' => 'required',            
        ]);

        $keluarga = keluarga_penerima_donasi::find($this->idToUpdate);
        $keluarga->update([
            'full_name' => $this->full_name,
            'nik' => $this->nik,
            'tempat_tanggal_lahir' => $this->tempat_tanggal_lahir,
            'alamat1' => $this->alamat1,
            'alamat2' => $this->alamat2,
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'kota' => $this->kota,
            'kode_pos' => $this->kode_pos,
            'nomor_ponsel'=> $this->nomor_ponsel,
            'nomor_telepon'=> $this->nomor_telepon,
            'pendidikan_terakhir'=> $this->pendidikan_terakhir,
            'status_pekerjaan'=> $this->status_pekerjaan,
            'pekerjaan_terakhir'=> $this->pekerjaan_terakhir,
            'id_pdon'=> $this->id_pdon,            
            'status'=> $this->status,
        ]);

        session()->flash('message', 'Keluarga Penerima Donasi Telah di Perbarui');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        keluarga_penerima_donasi::find($id)->delete;
        session()->flash('message', 'Keluarga Penerima Donasi Berhasi Dihapus');
    }

    public function resetInputFields()
    {
        $this->full_name = '';
        $this->nik = '';
        $this->tempat_tanggal_lahir = '';
        $this->alamat1 = '';
        $this->alamat2 = '';
        $this->kecamatan = '';
        $this->kelurahan ='';
        $this->kota = '';
        $this->kode_pos = '';
        $this->nomor_ponsel = '';
        $this->nomor_telepon = '';
        $this->pendidikan_terakhir = '';
        $this->status_pekerjaan = '';
        $this->pekerjaan_terakhir = '';
        $this->id_pdon = '';        
        $this->status = '';
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function updatingSelectedPdon($value)
    {
        $this->id_pdon = $value;
    }

    public function getPdonOptions($query)
    {
        return penerima_donasi::where('full_name', 'like', '%' . $query . '%')->get();
    }

    public function showDetail($id)
    {
        // If detail view is already open for the clicked donation, close it
        if ($this->isOpenDetail && $this->keluargaDetail->id == $id) {
            $this->closeDetail();
        } else {
            // Otherwise, open the detail view for the clicked donation
            $this->keluargaDetail = keluarga_penerima_donasi::findOrFail($id);
            $this->isOpenDetail = true;
            $this->keluarga = $this->keluargaDetail;
        }
    }

    public function closeDetail()
    {
        $this->isOpenDetail = false;
    }

}
