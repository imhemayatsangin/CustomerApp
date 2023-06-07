<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Customers extends Component
{
    public function render()
    {
        //   $this->customers = Customer::all();
        return view('livewire.customers');
    }
}
