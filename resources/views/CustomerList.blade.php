@extends('layouts.app')

@section('content')



    <div class="row justify-content-center" style="padding-top:100px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Customers Directory</h2>
                </div>
                <div class="card-body">
               
                    @livewire('customers')  {{-- calling the render function which is in Http.Livewire.Customer and then it displays the view  --}}

                </div>
            </div>
        </div>
    </div>



@endsection

    
