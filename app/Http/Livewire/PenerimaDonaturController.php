<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\penerima_donasi;
use Livewire\WithPagination;

class PenerimaDonaturController extends Component
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
    public $tni;
    public $pangkat_satuan_terakhir;
    public $status;
    public $idToUpdate;
    public $editMode = false; 
    public $modalTitle = "Tambah Penerima Donasi";
    public $isOpenDetail = false;
    public $pdonDetail;
    public $pdon;
    use WithPagination;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public $search = '';

    public function render()
    {
        $penerimas = penerima_donasi::where('full_name', 'like', '%'.$this->search.'%')
                    ->orWhere('nik', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat1', 'like', '%'.$this->search.'%')
                    ->orWhere('nomor_ponsel', 'like', '%'.$this->search.'%')
                    ->paginate(10); // Change the value according to your preference
        return view('livewire.pnmdonasi',['penerimas' => $penerimas]);
    }

    public function create()
    {
        $this->editMode = false;
         $this->modalTitle = "Tambah Penerima Donasi";
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
        
        penerima_donasi::create([
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
            'tni'=> $this->tni,
            'pangkat_satuan_terakhir'=> $this->pangkat_satuan_terakhir,
            'status'=> $this->status,            
        ]);

        session()->flash('message', 'Penerima donatur telah dtambahkan');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->idToUpdate = $id;
        $penerima = penerima_donasi::findOrFail($id);
        $this->editMode = true; // Atur editMode menjadi true saat melakukan edit
        $this->modalTitle = "Edit Penerima Donasi"; // Ganti judul modal menjadi "Edit Doansi"
        $this->id = $id;
        $this->full_name = $penerima->full_name;
        $this->nik = $penerima->nik;
        $this->tempat_tanggal_lahir = $penerima->tempat_tanggal_lahir;
        $this->alamat1 = $penerima->alamat1;
        $this->alamat2 = $penerima->alamat2;
        $this->kecamatan = $penerima->kecamatan;
        $this->kelurahan = $penerima->kelurahan;
        $this->kota = $penerima->kota;
        $this->kode_pos = $penerima->kode_pos;
        $this->nomor_ponsel = $penerima->nomor_ponsel;
        $this->nomor_telepon = $penerima->nomor_telepon;
        $this->pendidikan_terakhir = $penerima->pendidikan_terakhir;
        $this->status_pekerjaan = $penerima->status_pekerjaan;
        $this->pekerjaan_terakhir = $penerima->pekerjaan_terakhir;
        $this->tni = $penerima->tni;
        $this->pangkat_satuan_terakhir = $penerima->pangkat_satuan_terakhir;
        $this->status = $penerima->status;
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

        $penerima = penerima_donasi::find($this->idToUpdate);
        $penerima->update([
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
            'tni'=> $this->tni,
            'pangkat_satuan_terakhir'=> $this->pangkat_satuan_terakhir,
            'status'=> $this->status,
        ]);

        session()->flash('message', 'Penerima Donasi Telah di Perbarui');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        penerima_donasi::find($id)->delete();
        session()->flash('message', 'Penerima Donasi Berhasi Dihapus');
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
        $this->tni = '';
        $this->pangkat_satuan_terakhir = '';
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

    public function showDetail($id)
    {
        if ($this->isOpenDetail && $this->pdonDetail->id == $id){
            $this->closeDetail();
        } else{
            $this->pdonDetail = penerima_donasi::findOrFail($id);
            $this->isOpenDetail = true;
            $this->pdon = $this->pdonDetail;
        }
    }

    public function closeDetail()
    {
        $this->isOpenDetail = false;
    }
}
