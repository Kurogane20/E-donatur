<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\donatur;
use App\Models\User;
use App\Models\penerima_donasi;


class Dashboard extends Component
{
    public $totalDonatur;
    public $totalUser;
    public $totalPenerimaDonasi;
    public $topDonatur;

    public function mount()
    {
        $this->totalDonatur = donatur::count();
        $this->totalUser = User::count();
        $this->totalPenerimaDonasi = penerima_donasi::count();
        $this->topDonatur = donatur::orderBy('created_at', 'desc')->take(10)->get();
    }

    public function render()
    {
        return view('dashboard');
    }
}
