
<div>

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
        {{ session('message') }}
        </div>
    @endif
            <div class="row justify-content-between">
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <div class="col-auto">
                    
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addingmodal">
                            <i class="fas fa-plus"></i> {{ __('Add Customer') }}
                        </button>
                    </div>
                
                
                
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Telephone</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($customers->count()>0)

                        @foreach ( $customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->surname }}</td>
                            <td>{{ $customer->tel }}</td>
                            <td>{{ $customer->birth_date }}</td>
                            <td>{{ $customer->address }}</td>
                         
                            <td>
                            <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $customer->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="delete({{ $customer->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                            @else
                            <tr>
                                <td colspan="4" style="text-align: center">No Records...</td>

                            </tr>
                        @endif
                    
                    </tbody>
                </table>
                <div class="mt-4">{{ $customers->links() }} </div>
            </div>

            <!-- Modal -->
            <!--adding data Modal -->
        <div wire:ignore.self class="modal fade"  id="addingmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                             <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                <div class="modal-body">
            
                        <form wire:submit.prevent="saveCustomer" >
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Name" wire:model="name">
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Surname</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="surname" placeholder="Enter your surname">
                                @error('surname') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Telephone</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="tel" placeholder="Enter your telephone number">
                                @error('tel') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Date of Birth</label>
                                <input type="date" class="form-control" id="exampleFormControlInput2" wire:model="birth_date" >
                                @error('birth_date') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Address</label>
                                <textarea class="form-control" wire:model="address" id="address" rows="3" placeholder="Enter your address"></textarea>
                                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>

                            
                        </form> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal" wire:click="closeModal">Close</button>
                        <button type="button" wire:click="saveCustomer"  class="btn btn-primary close-modal">
                            Save changes
                        </button>

                
                    </div>
                </div>
            </div>
        </div>


                        <!-- Update Modal -->
                <div wire:ignore.self class="modal fade" data-backdrop="static" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Name" wire:model="edit_name">
                                        @error('edit_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Surname</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="edit_surname" placeholder="Enter your surname">
                                        @error('edit_surname') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Telephone</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="edit_tel" placeholder="Enter your telephone number">
                                        @error('edit_tel') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Date of Birth</label>
                                        <input type="date" class="form-control" id="exampleFormControlInput2" wire:model="edit_birth_date" >
                                        @error('edit_birth_date') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Address</label>
                                        <textarea class="form-control" wire:model="edit_address" id="address" rows="3" placeholder="Enter your address"></textarea>
                                        @error('edit_address') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" wire:click.prevent="updateCustomer()" class="btn btn-primary" >Save changes</button>
                            </div>
                    </div>
                    </div>
                </div>

</div>

@push('scripts')
<script>
  window.addEventListener('close-modal', event =>{
          $('#addingmodal').modal('hide');

      });

      window.addEventListener('show-addingmodal', event =>{
          $('#addingmodal').modal('show');
      });

</script>

  @endpush




