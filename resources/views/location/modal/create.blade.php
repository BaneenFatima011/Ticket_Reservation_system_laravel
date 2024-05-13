<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New City</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">
                @csrf <!-- CSRF Protection -->
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>
                        <select name="country_id" id="country_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach($countries as $item)
                                <option value="{{ $item->country_id }}">{{ $item->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="city_name" class="block text-sm font-medium text-gray-700">City Name</label>
                        <input type="text" name="city_name" id="city_name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
