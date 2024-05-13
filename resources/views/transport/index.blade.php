@extends('layout2')

@section('content')

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
        <div style="background-color:#C19875"  class=" text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl"> <!-- Adjusted max width -->
            <h2 class="text-center text-xl font-bold mb-6">Manage Transports</h2>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-4xl">
            <a href="{{ url('/transport/create') }}" class="bg-emerald-400 hover:bg-emerald-700 text-black font-bold py-2 px-4 rounded mb-6 inline-block">
                <i class="fa fa-plus mr-1" aria-hidden="true"></i> Add New Transport
            </a> 

            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Company Name</th>
                            <th class="px-4 py-2">Transport Type</th>
                            <th class="px-4 py-2">Capacity</th>
                            <th class="px-4 py-2">Model</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transports as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $item->company->company_name  }}</td>
                                <td class="border px-4 py-2">{{ $item->transportType->transport_name  }}</td>
                                <td class="border px-4 py-2">{{ $item->capacity }}</td>
                                <td class="border px-4 py-2">{{ $item->model }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex">
                                        
                                        <a href="{{ url('/transport/' . $item->bus_id . '/edit') }}"style="background-color: #F2E3BC"  class="hover:bg-yellow-500 text-black font-bold py-1 px-2 rounded mr-2">
                                            <i class="bi bi-pencil-square"></i></i> Edit
                                        </a>
                                        <form method="POST" action="{{ url('/transport/' . $item->bus_id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" style="background-color: #618985"  class="text-black font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this transport?')">
                                                <i class="bi bi-trash3-fill"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $transports->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
