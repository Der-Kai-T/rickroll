<?php

namespace App\Livewire\App\Test;

use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Toast extends Component
{
    public function render()
    {
        return view('livewire.app.test.toast');
    }

    public function toast()
    {
        Toaster::success("Toast working");
    }
}
