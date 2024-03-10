<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\staff;

class StaffController extends Component
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
    public $idToUpdate;
    public $editMode = false; // Tambahkan variabel editMode dan inisialisasi nilainya dengan false
    public $modalTitle = "Tambah staff"; // Tambahkan variabel modalTitle dan inisialisasi judul modal dengan "Create New Doansi"

    public function render()
    {
        $staffs = staff::all();
        return view('livewire.staff-controller', compact('staffs'));
    }

    public function create()
    {
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

        staff::create([
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

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;  
    }
}
