
<?php

$transports = \App\Models\Transport::all();
$city = \App\Models\City::all();
?>
<div class="modal fade text-left" id="ModalCreateSched" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Scehdule</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('schedules.store') }}" method="post" enctype="multipart/form-data">
                    @csrf <!-- CSRF Protection -->
                <!-- New Fields -->
                <div class="mb-4">
                    <label for="bus_id" class="block text-sm font-medium text-gray-700">Bus Id</label>
                    <select for="bus_id" type="text" name="bus_id" id="bus_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        
                        @foreach($transports as $item)
                        <option value="{{ $item->bus_id }}">{{ $item->model }}</option>
                    @endforeach
                    </select>
                    @error('bus_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="origin" class="block text-sm font-medium text-gray-700">Origin</label>
                    <select for="origin" type="text" name="origin" id="origin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($city as $item)
                        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
                    @endforeach
                    </select>
                    @error('origin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                <div class="mb-4">
                    <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
                    <select type="text" name="destination" id="destination" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($city as $item)
                        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
                    @endforeach
                    </select>
                    @error('destination')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                <div class="mb-4">
                    <label for="distance" class="block text-sm font-medium text-gray-700">Distance</label>
                    <input type="text" name="distance" id="distance" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('distance')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="time" name="duration" id="duration" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('duration')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="departure_time" class="block text-sm font-medium text-gray-700">Departure Time</label>
                    <input type="datetime-local" name="departure_time" id="departure_time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('departure_time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="arrival_time" class="block text-sm font-medium text-gray-700">Arrival Time</label>
                    <input type="datetime-local" name="arrival_time" id="arrival_time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('arrival_time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" id="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
