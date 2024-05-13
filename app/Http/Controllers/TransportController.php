<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use Illuminate\View\View;

use App\Models\Transport;
use App\Models\TransportType;
use App\Models\Company;
use App\Models\seat;
use Illuminate\Support\Facades\Session;

class TransportController extends Controller
{
    public function index()
    {
        // Eager load the transportType and company relationships
        if (Session::get('role') == 0 && Session::has('loginId') ) {
            
        $transports = Transport::with('transportType', 'company')->paginate(5);        
        // Pass the data to the view
        return view('transport.index', [
            'transports' => $transports,
        ]);}
    
else{
  
    return redirect('/login');
}
}
    public function create(): View
    {
        // Fetch all transport types and companies to populate dropdowns in the create form
        $transportTypes = TransportType::all();
        $companies = Company::all();
        
        return view('transport.create', [
            'transportTypes' => $transportTypes,
            'companies' => $companies,
        ]);}
        

        
    
  
    public function store(Request $request): RedirectResponse
    {
        // Retrieve all input data from the request
        $input = $request->all();
    
       
        $transport = new Transport();
      
        $transport->transport_type = $input['transport_type'];
        $transport->capacity = $input['capacity'];
        $transport->model = $input['model'];
        $transport->company_id = $input['company_id'];

    
        
        // Save the new transport instance to the database
        $transport->save();
    
        // Redirect to the transport index page with a flash message
        return redirect('transport')->with('flash_message', 'Transport Added!');
    }
    
  
 

   
    public function show(string $id): View
    {
        //shows specific record based on id
        $transport = Transport::find($id);
        return view('transport')->with('transport', $transport);
    }
    
    public function edit(string $id): View
    {
        //retreives record of student with the sepcified id to change details
        $transport = Transport::find($id);
        return view('transport.edit')->with('transport', $transport);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
{
    // Validate the request data
    $rules = [
        'transport_type' => 'required',
        'capacity' => 'required|numeric',
        'model' => 'required',
        'company_id' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the transport record
    $transport = Transport::find($id);

    if (!$transport) {
        return redirect()->back()->with('error_message', 'Transport not found!');
    }

    // Update the transport record
    $transport->update($request->all());

    // Update or create seats based on the transport capacity
    

    return redirect('transport')->with('flash_message', 'Transport Updated!');
}

    public function destroy(string $id): RedirectResponse
    {
        transport::destroy($id);
        
        return redirect('transport')->with('flash_message', 'transport deleted!'); 
    }
}

