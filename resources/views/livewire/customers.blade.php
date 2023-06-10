
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
                    
                    </tbody>
                </table>
                
            </div>

            <!-- Modal -->
            <!--adding data Modal -->
        <div wire:ignore.self class="modal fade"  id="addingmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
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




