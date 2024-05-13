@extends('layout') <!-- extending the navbar sidebar off canvas-->

@section('content')<!-- original content of the page-->
<h1 class="text-3xl font-bold my-8  ">Dashboard</h1>
    
       
<div class="container mx-auto p-4">
  
    <div style="background-color:#C19875" class=" rounded-lg shadow-md">
            
        <h2 class="text-xl font-bold p-3 text-black">Passenger Information</h2>
    </div>  
    <div class=" p-6 rounded-lg shadow-md">
      
        <div class="flex flex-wrap justify-between">
        

            <div class="w-full sm:w-1/2 mb-4">
                <p><strong>Role:</strong> {{ $data->role == 1 ? 'Passenger' : 'Admin' }}</p>
                <p><strong>Email:</strong> {{ $data->name }}</p>
                <p><strong>ID:</strong> {{ $data->id }}</p>
            </div>
            <div class="w-full sm:w-1/2 mb-4">
                <p><strong>Age:</strong> {{ $data2->age }}</p>
                <p><strong>Name:</strong> {{ $data2->name }}</p>
                <p><strong>Phone:</strong> {{ $data2->phone }}</p>
            </div>
        </div>
    </div>
    <br>
    <div  style="background-color:#C19875" class=" rounded-lg shadow-md">
            
        
    </div>  
   
   
</div>

            
        </table>
    </div>
@endsection
