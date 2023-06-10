<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;


    public $name, $surname, $birth_date, $tel, $address;


    protected $rules = [
        'name' => 'required|min:2',
        'surname' => '',
        'birth_date' => 'required',
        'tel' => 'required',
        'address' => 'required',

    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function render()
    {
        $customers = Customer::all();
        return view('livewire.customers', ['customers' => $customers]);
    }

    public function addTypeModal()
    {
        $this->resetInputFields();
        $this->dispatchBrowserEvent('show-addingmodal');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->surname = '';
        $this->birth_date = '';
        $this->tel = '';
        $this->address = '';
    }
    public function closeModal()
    {

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function saveCustomer()
    {
        $this->validate();

        // dd($this->surname);
        Customer::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'birth_date' => $this->birth_date,
            'tel' => $this->tel,
            'address' => $this->address,

        ]);

        session()->flash('message', 'Customer registered Successfully.');
        $this->resetInputFields();

        $this->dispatchBrowserEvent('close-modal');
    }
}
