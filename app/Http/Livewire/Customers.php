<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteConfirmation = false;
    public $customer_id;
    public $update_flag = false;
    public $name, $surname, $birth_date, $tel, $address;
    public $edit_name, $edit_surname, $edit_birth_date, $edit_tel, $edit_address;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];
    protected $rules = [
        'name' => 'required|min:2',
        'surname' => '',
        'birth_date' => 'required',
        'tel' => 'required',
        'address' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $customers = Customer::when($this->search, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('surname', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%')
                    ->orWhere('tel', 'like', '%' . $this->search . '%')
                    ->orWhere('birth_date', 'like', '%' . $this->search . '%');
            });
        })->paginate(10);
        return view('livewire.customers', ['customers' => $customers]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function refreshpage()
    {
        $this->search = '';
        $this->resetPage();
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
        $this->edit_name = '';
        $this->edit_surname = '';
        $this->edit_birth_date = '';
        $this->edit_tel = '';
        $this->edit_address = '';
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

    public function cancel()
    {
        $this->update_flag = false;
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $this->update_flag = true;
        $customer = Customer::where('id', $id)->first();

        $this->customer_id = $id;
        $this->edit_name = $customer->name;
        $this->edit_surname = $customer->surname;
        $this->edit_birth_date = $customer->birth_date;
        $this->edit_tel = $customer->tel;
        $this->edit_address = $customer->address;
    }

    public function updateCustomer()
    {
        $validatedData = $this->validate([
            'edit_name' => 'required|min:2',
            'edit_surname' => '',
            'edit_birth_date' => 'required',
            'edit_tel' => 'required',
            'edit_address' => 'required',
        ]);

        if ($this->customer_id) {
            $customer = Customer::find($this->customer_id);
            $customer->update($validatedData);

            $this->update_flag = false;
            session()->flash('message', 'Customer info Updated Successfully.');
            $this->resetInputFields();
        }
    }


    public function delete($id)
    {
        $customer = Customer::where('id', $id)->first();

        $this->customer_id = $customer->id;
    }


    public function deleteRecord($id)
    {
        if ($id) {
            Customer::where('id', $id)->delete();
            session()->flash('message', 'Customer info deleted successfully.');
        }
    }
}
