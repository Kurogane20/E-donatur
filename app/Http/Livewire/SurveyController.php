<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\survey;
use App\Models\User;
use App\Models\penerima_donasi;

class SurveyController extends Component
{

    public $isOpen;
    public $tanggal_survey;
    public $id_staff;
    public $id_pdon;
    public $catatan;
    public $SelectedStaffName;    
    public $SelectedPdonName; 
    public $selectedstaff = null;   
    public $selectedpdon = null;
    public $editMode = false;
    public $modalTitle = "Tambah survey";
    public $idToUpdate;
    public $search = '';
    
    public function render()
    {
        $surveys = survey::all();
        return view('livewire.survey', compact('surveys'));
    }

    public function create()
    {
        $this->editMode = false;
        // $this->modalTitle = 'Tam';
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'tanggal_survey' => 'required',
            'id_staff' => 'required',
            'id_pdon' => 'required',
            'catatan' => 'required'
        ]);

        survey::create([
            'tanggal_survey' => $this->tanggal_survey,
            'id_staff' => $this->id_staff,
            'id_pdon' => $this->id_pdon,
            'catatan' => $this->catatan
        ]);

        session()->flash('message', 'Survey berhasil dibuat');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {        
        $this->idToUpdate = $id;
        $survey = survey::findOrFail($id);

        $this->editMode = true;
        $this->modalTitle = 'Edit survey';
        $this->id = $id;
        $this->tanggal_survey = $survey->tanggal_survey;
        $this->id_staff = $survey->id_staff;
        $this->id_pdon = $survey->id_pdon;
        $this->catatan = $survey->catatan;
        $this->SelectedStaffName = $survey->staff->full_name;
        $this->SelectedPdonName = $survey->pdon->full_name;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'tanggal_survey' => 'required',
            'id_staff' => 'required',
            'id_pdon' => 'required',
            'catatan' => 'required'
        ]);

        $survey = survey::find($this->idToUpdate);

        $survey->update([
            'tanggal_survey' => $this->tanggal_survey,
            'id_staff' => $this->id_staff,
            'id_pdon' => $this->id_pdon,
            'catatan' => $this->catatan
        ]);

        session()->flash('message', 'Survey berhasi diperbarui');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id){
        survey::find($id)->delete();
        session()->flash('message', 'Survey berhasil dihapus');
    }

    public function resetInputFields()
    {
        $this->tanggal_survey = '';
        $this->id_staff = '';
        $this->id_pdon = '';
        $this->catatan = '';
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function updatingSelectedStaff($value){
        $this->id_staff = $value;
    }

    public function updatingSelectedPdon($value){
        $this->id_pdon = $value;
    }

    public function getStaffOption($query){
        return User::where('full_name', 'like', '%' . $query . '%')->get();
    }

    public function getPdonOption($query){
        return penerima_donasi::where('full_name', 'like', '%' . $query . '%')->get();
    }
}
