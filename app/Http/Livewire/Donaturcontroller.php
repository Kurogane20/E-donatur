<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\donatur;
use Livewire\WithPagination;

class Donaturcontroller extends Component
{
    public $isOpen;
    public $isOpenDetail = false;
    public $donatur;
    public $donaturDetail;    
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
    public $status_donasi;
    public $idToUpdate;
    public $editMode = false; // Tambahkan variabel editMode dan inisialisasi nilainya dengan false
    public $modalTitle = "Tambah Donatur"; // Tambahkan variabel modalTitle dan inisialisasi judul modal dengan "Create New Doansi"
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshComponent' => '$refresh'];
    public $search = '';

    public function render()
    {
        $donaturs = donatur::where('full_name', 'like', '%'.$this->search.'%')
                           ->orWhere('nik', 'like', '%'.$this->search.'%')
                           ->orWhere('alamat1', 'like', '%'.$this->search.'%')
                           ->orWhere('nomor_ponsel', 'like', '%'.$this->search.'%')
                           ->paginate(10); // Change the value according to your preference

        return view('livewire.donatur', ['donaturs' => $donaturs ]);
    }

    public function create()
    {
        $this->editMode = false;
        $this->modalTitle = "Tambah Donatur";
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'nik' => 'required',
            'tempat_tanggal_lahir' =>'required',
            'alamat1' => 'required',            
            'nomor_ponsel' => 'required',            
        ]);

        donatur::create([
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
        ]);

        session()->flash('message', 'Donatur created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->idToUpdate = $id;
        $donatur = donatur::findOrFail($id);
        $this->editMode = true; // Atur editMode menjadi true saat melakukan edit
        $this->modalTitle = "Edit Donatur"; // Ganti judul modal menjadi "Edit Doansi"
        $this->id = $id;
        $this->full_name = $donatur->full_name;
        $this->nik = $donatur->nik;
        $this->tempat_tanggal_lahir = $donatur->tempat_tanggal_lahir;
        $this->alamat1 = $donatur->alamat1;
        $this->alamat2 = $donatur->alamat2;
        $this->kecamatan = $donatur->kecamatan;
        $this->kelurahan = $donatur->kelurahan;
        $this->kota = $donatur->kota;
        $this->kode_pos = $donatur->kode_pos;
        $this->nomor_ponsel = $donatur->nomor_ponsel;
        $this->nomor_telepon = $donatur->nomor_telepon;
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

        $donatur = donatur::find($this->idToUpdate);

        $donatur->update([
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
            'status_donasi' => $this->status_donasi
        ]);

        session()->flash('message', 'Donatur updated successfully.');
        $this->closeModal();
        $this->resetInputFields();

    }

    public function delete($id)
    {
        donatur::find($id)->delete();
        session()->flash('message', 'Donatur Deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->id = '';
        $this->full_name = '';
        $this->nik = '';
        $this->tempat_tanggal_lahir = '';
        $this->alamat1 = '';
        $this->alamat2 = '';
        $this->kecamatan = '';
        $this->kelurahan = '';
        $this->kota = '';
        $this->kode_pos = '';
        $this->nomor_ponsel = '';
        $this->nomor_telepon = '';
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function showDetail($id)
    {
        // If detail view is already open for the clicked donation, close it
        if ($this->isOpenDetail && $this->donaturDetail->id == $id) {
            $this->closeDetail();
        } else {
            // Otherwise, open the detail view for the clicked donation
            $this->donaturDetail = donatur::findOrFail($id);
            $this->isOpenDetail = true;
            $this->donatur = $this->donaturDetail;
        }
    }

    public function closeDetail()
    {
        $this->isOpenDetail = false;
    }

    
}
