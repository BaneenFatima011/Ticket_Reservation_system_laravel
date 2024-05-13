@extends('layout2')

@section('content')
    <div class="flex justify-center items-center h-screen">
        
        <div>
             
        <div>
            @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif
        
        @if (session('error_message'))
            <div class="alert alert-danger">
                {{ session('error_message') }}
            </div>
        @endif
        <div style="background-color:#C19875" class=" text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl"> <!-- Adjusted max width -->
            <h2 class="text-center text-xl font-bold mb-6">Manage Schedule</h2>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-4xl">
            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalCreateSched" class="bg-emerald-400 text-black hover:bg-emerald-800  font-bold py-2 px-4 rounded mb-6 inline-block">
                <i class="fa fa-plus mr-1" aria-hidden="true"></i> Add New Schedule
            </a>

            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Bus Id</th>
                            <th class="px-4 py-2">Origin</th>
                            <th class="px-4 py-2">Destination</th>
                            <th class="px-4 py-2">Distance</th>
                            <th class="px-4 py-2">Duration</th>
                           
                            <th class="px-4 py-2">Departure Time</th>
                            <th class="px-4 py-2">Arrival Time</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Action</th>

                          
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $item->bus_id }}</td>
                                <td class="border px-4 py-2">{{ $item->originCity->city_name  }}</td>
                                <td class="border px-4 py-2">{{ $item->destinationCity->city_name  }}</td>
                                <td class="border px-4 py-2">{{ $item->distance }}</td>
                                <td class="border px-4 py-2">{{ $item->duration }}</td>
                                <td class="border px-4 py-2">{{ $item->departure_time }}</td>
                                <td class="border px-4 py-2">{{ $item->arrival_time }}</td>
                                <td class="border px-4 py-2">{{ $item->price }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex">
                                        
                                        <a href="{{ url('/schedule/' . $item->route_id . '/edit') }}" style="background-color: #F2E3BC" class="hover:bg-yellow-900 font-bold py-1 px-2 rounded mr-2">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ url('/schedule/' . $item->route_id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" style="background-color: #618985"  class="hover:bg-red-900  font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this transport?')">
                                                <i class="bi bi-trash3-fill"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $routes->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
@include('schedule.modal.create')
