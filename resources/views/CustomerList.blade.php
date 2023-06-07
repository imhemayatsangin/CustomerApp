<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Customer APP</title>
        @livewireStyles
 
        <style>

        </style>
    </head>
    <body >
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Customer List</h2>
                        </div>
                        <div class="card-body">
                       
                            @livewire('customers')  {{-- calling the render function which is in Http.Livewire.Customer and then it displays the view  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
       


        @livewireScripts
    </body>
</html>
