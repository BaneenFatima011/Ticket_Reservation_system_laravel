<div class="modal fade text-left" id="ModalCreate2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New City</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('countries.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf <!-- CSRF Protection -->
                    <div class="mb-4">
                        <label for="country_name" class="block text-sm font-medium text-gray-700">Country Name</label>
                        <input type="text" name="country_name" id="country_name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
