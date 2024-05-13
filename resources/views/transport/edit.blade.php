@extends('layout2')
@section('content')
@php
use App\Models\TransportType;
use App\Models\Company;
$transportTypes=TransportType::all();
$companies=Company::all();

    
@endphp
<div class="flex justify-center items-center h-screen">
    <div class="max-w-md w-full space-y-8">
        <div style="background-color:#C19875"  class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl">
            <h2 class="text-center text-xl font-bold mb-6"><a href="/transport">Manage Transport </a>> Edit</h2>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-4xl">
            <form action="{{ url('transport/' .$transport->bus_id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                
            <div class="mb-4">
                <label for="transport_type" class="block text-sm font-medium text-gray-700">Transport Type</label>
                <select name="transport_type" id="transport_type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($transportTypes as $item)
                        <option value="{{ $item->transport_id }}">{{ $item->transport_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
              <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
              <select name="company_id" id="company_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach($companies as $company)
                      <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
                  @endforeach
              </select>
          </div>
                <input type="hidden" name="id" id="id" value="{{$transport->bus_id}}" />
                <input type="hidden" name="company_id" id="company_id" value="{{$transport->company_id}}" />

                <label for="transport_type" class="block text-sm font-medium text-gray-700 mb-1">Transport Type:</label>
                <input type="text" name="transport_type" id="transport_type" value="{{$transport->transport_type}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                
                <label for="model" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Model:</label>
                <input type="text" name="model" id="model" value="{{$transport->model}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                
                <label for="capacity" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Capacity:</label>
                <input type="text" name="capacity" id="capacity" value="{{$transport->capacity}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 w-full mt-4">Update</button>
            </form>
        </div>
    </div>
</div>
@stop
