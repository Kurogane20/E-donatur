<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\doansi;
use App\Models\Donatur;
use Livewire\WithPagination;


class Donasi extends Component
{
    public $tanggal;
    public $id_donatur;
    public $jenis_donasi;
    public $jumlah;
    public $keterangan;
    public $isOpen;
    public $editMode = false; // Tambahkan variabel editMode dan inisialisasi nilainya dengan false
    public $modalTitle = "Create New Doansi"; // Tambahkan variabel modalTitle dan inisialisasi judul modal dengan "Create New Doansi"
    public $idToUpdate;
    public $selectedDonatur = null;
    public $search = '';
    public $selectedDonaturName;
    public $isOpenDetail = false;
    public $donasiDetail;
    public $donasi;
    use WithPagination;
    protected $listeners = ['refreshComponent' => '$refresh'];



    public function render()
    {
        $donasis = doansi::whereHas('donatur', function ($query) {
        $query->where('full_name', 'like', '%' . $this->search . '%');
        })
        ->orWhere('jenis_donasi', 'like', '%' . $this->search . '%')
        ->paginate(10);
        return view('livewire.donasi', ['donasis' => $donasis]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
        // dd('hai');
    }

    public function store()
    {
        $this->validate([
            'tanggal' => 'required',
            'id_donatur' => 'required',
            'jenis_donasi' => 'required',
            'jumlah' => 'required',
        ]);

        Doansi::create([
            'tanggal' => $this->tanggal,
            'id_donatur' => $this->id_donatur,
            'jenis_donasi' => $this->jenis_donasi,
            'jumlah' => $this->jumlah,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Doansi created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id)
     {
        // dd($id);
        $this->idToUpdate = $id;
        $donasi = Doansi::findOrFail($id);
        
        $this->editMode = true; // Atur editMode menjadi true saat melakukan edit
        $this->modalTitle = "Edit Donatur"; // Ganti judul modal menjadi "Edit Doansi"
        $this->id = $id;
        $this->tanggal = $donasi->tanggal;
        $this->id_donatur = $donasi->id_donatur;
        $this->selectedDonaturName = $donasi->donatur->full_name;
        $this->jenis_donasi = $donasi->jenis_donasi;
        $this->jumlah = $donasi->jumlah;
        $this->keterangan = $donasi->keterangan;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'tanggal' => 'required',
            'id_donatur' => 'required',
            'jenis_donasi' => 'required',
            'jumlah' => 'required',
        ]);
        
        
        $donasi = Doansi::find($this->idToUpdate);
        // dd($donasi);
    
        $donasi->update([
            'tanggal' => $this->tanggal,
            'id_donatur' => $this->id_donatur,
            'jenis_donasi' => $this->jenis_donasi,
            'jumlah' => $this->jumlah,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Donasi Update Succesfully');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Doansi::find($id)->delete();
        session()->flash('message', 'Donasi deleted succesfully');
    }

    public function resetInputFields()
    {
        $this->tanggal = '';
        $this->id_donatur = '';
        $this->jenis_donasi = '';
        $this->jumlah = '';
        $this->keterangan = '';
        $this->editMode = false; // Atur editMode kembali ke false setelah reset input fields
        $this->modalTitle = "Create New Doansi";
    }
    

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;  
    }
    
    public function updatingSelectedDonatur($value)
    {
        $this->id_donatur = $value;
    }

    public function getDonaturOptions($query)
    {
        return Donatur::where('full_name', 'like', '%' . $query . '%')->get();
    }

    public function showDetail($id)
    {
        // If detail view is already open for the clicked donation, close it
        if ($this->isOpenDetail && $this->donasiDetail->id == $id) {
            $this->closeDetail();
        } else {
            // Otherwise, open the detail view for the clicked donation
            $this->donasiDetail = Doansi::findOrFail($id);
            $this->isOpenDetail = true;
            $this->donasi = $this->donasiDetail;
        }
    }

    public function closeDetail()
    {
        $this->isOpenDetail = false;
    }


}
