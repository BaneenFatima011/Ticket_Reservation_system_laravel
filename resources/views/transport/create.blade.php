@extends('layout2')
@section('content')
 
<div class="flex justify-center items-center h-full mt-6">
    <div class="max-w-md w-full space-y-8">
      <div style="background-color:#C19875"  class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl"> <!-- Adjusted max width -->
        <h2 class="text-center text-xl font-bold mb-6"><a href="/transport">Manage Transports</a> > Create</h2>
    </div>
        <form action="{{ url('transport') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf <!-- CSRF Protection -->

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

            <div class="mb-4">
                <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                <input type="text" name="model" id="model" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                <input type="text" name="capacity" id="capacity" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
            </div>
        </form>
    </div>
</div>
 
@stop
