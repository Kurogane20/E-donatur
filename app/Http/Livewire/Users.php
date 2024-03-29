<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
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
    Public $email;
    public $idToUpdate;
    public $editMode = false; // Tambahkan variabel editMode dan inisialisasi nilainya dengan false
    public $modalTitle = "Tambah staff"; //
    public $isOpenDetail = false;
    public $userDetail;
    public $user;
    public$status;

    public function render()
    {
        $users = User::all();
        return view('livewire.users', compact('users'));
    }

    public function create(){
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
            'email' => 'required'            
        ]);

        $defaultPassword = '12345678';

        User::create([
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
            'email' => $this->email,
            'password' => bcrypt($defaultPassword) ,
            'status' => $this->status
        ]);

        session()->flash('message', 'Staff berhasil di tambah');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id){
        $this->idToUpdate = $id;
        $user = User::findOrFail($id);

        $this->editMode = true;
        $this->modalTitle = "Edit Staff";
        
        $this->id = $id;
        $this->full_name = $user->full_name;
        $this->nik = $user->nik;
        $this->tempat_tanggal_lahir = $user->tempat_tanggal_lahir;
        $this->alamat1 = $user->alamat1;
        $this->alamat2 = $user->alamat2;
        $this->kecamatan = $user->kecamatan;
        $this->kelurahan = $user->kelurahan;
        $this->kota = $user->kota;
        $this->kode_pos = $user->kode_pos;
        $this->nomor_ponsel = $user->nomor_ponsel;
        $this->nomor_telepon = $user->nomor_telepon;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->openModal();
    }

    public function update(){
        $this->validate([
            'full_name' => 'required',
            'nik' => 'required',
            'tempat_tanggal_lahir' =>'required',
            'alamat1' => 'required',            
            'nomor_ponsel' => 'required',
            'email' => 'required'            
        ]);
        
        $user = User::find($this->idToUpdate);

        $user->update([
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
            'email' => $this->email,
            'status' => $this->status
        ]);

        session()->flash('message', 'Staff berhasil updated ');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id){
        User::find($id)->delete();
        session()->flash('message', 'staff berhasil dihapus');
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
        $this->email = '';
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
        if ($this->isOpenDetail && $this->userDetail->id == $id) {
            $this->closeDetail();
        } else {
            // Otherwise, open the detail view for the clicked donation
            $this->userDetail = User::findOrFail($id);
            $this->isOpenDetail = true;
            $this->user = $this->userDetail;
        }
    }

    public function closeDetail()
    {
        $this->isOpenDetail = false;
    }
}
