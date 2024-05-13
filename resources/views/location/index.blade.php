@extends('layout2')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex justify-center items-center h-screen">
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
        <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl">
            <h2 class="text-center text-xl font-bold mb-6">Manage Locations</h2>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-4xl">
            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate2" class="bg-emerald-400 hover:bg-emerald-800  text-black font-bold py-2 px-4 rounded mb-6 inline-block">
                <i class="fa fa-plus mr-1" aria-hidden="true"></i> Add New Country
            </a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate" class="bg-emerald-400 hover:bg-emerald-800  font-bold py-2 px-4 rounded mb-6 inline-block">
                <i class="fa fa-plus mr-1" aria-hidden="true"></i> Add New City
            </a>
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Country Name</th>
                            <th class="px-4 py-2">City Id</th>
                            <th class="px-4 py-2">City Name</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td  class="country_name  border px-4 py-2">{{ $item->country->country_name }}</td>
                                <td  class="city_id border px-4 py-2">{{ $item->city_id }}</td>
                                <td class=" city_name border px-4 py-2">{{ $item->city_name }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex">
                                      
                                        <a href="{{ url('/location/' . $item->city_id . '/edit') }}" style="background-color: #F2E3BC" class=" hover:bg-yellow-900  font-bold py-1 px-2 rounded mr-2">
                                            <i class="bi bi-pencil-square"></i></i> Edit
                                        </a>
                                        <form class="delete-form" method="POST" action="{{ url('/location/' . $item->city_id) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #618985"  class=" hover:bg-red-900  font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this transport?')">
                                                <i class="bi bi-trash3-fill"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  
                </table>
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</div>



</script>

@include('location.modal.create')
@include('location.modal.create2')
@endsection
