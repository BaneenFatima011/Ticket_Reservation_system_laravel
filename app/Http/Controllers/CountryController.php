<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Country;
use App\Models\City;
use App\Http\Controllers\CredentialController;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller
{public function index()
    {
      
        if (Session::get('role') == 0 && Session::has('loginId') ) {
            // User is logged in as admin, continue fetching data
            $countries = Country::all();
            $cities = City::with('country')->paginate(5);
    
            // Pass the paginated data to the view
            return view('location.index', [
                'countries' => $countries,
                'cities' => $cities,
            ]);
        } else {
            // User is not logged in or does not have admin role, redirect to login or show error
            
            return redirect('/login');
        }
    }
    

    public function create(): View
    {
        
        $countries = Country::all();
        
        return view('Location.create', ['countries' => $countries]);
    }
    public function create2(): View
    {
        return view('Location.create');
    }


    public function store(Request $request): RedirectResponse
{
    $input = $request->all();
    
    
    if ($request->has('country_name')) {
        $input = $request->all();
        $countries = new Country();
        $countries->country_name= $input['country_name'];
        $countries->save();
        return redirect('location')->with('flash_message', 'Country Added!');
    }

   
    if ($request->has('city_name')) {
        $input = $request->all();
        $cities = new City();
        $cities->country_id = $input['country_id'];
        $cities->city_name = $input['city_name'];
        $cities->save();
        return redirect('location')->with('flash_message', 'City Added!');
    }

    
    return redirect('location')->with('error_message', 'Invalid Form Submission!');
}


    public function show(string $id): View
    {
        $country = Country::find($id);
        return view('Location.show')->with('country', $country);
    }

    
    public function edit(string $id): View
    {
        //retreives record of student with the sepcified id to change details
        $city = City::findOrFail($id);
        $countries = Country::all();
   
           // Pass the paginated data to the view
           return view('location.edit', [
            'countries' => $countries,
            'city'=> $city,
        ]);
    }
    
   
    

    public function update(Request $request, $id): RedirectResponse
    {
        // Find the city by its ID
        $city = City::find($id);
    
        // If the city with the given ID does not exist, return with an error message
        if (!$city) {
            return redirect('/location')->with('error_message', 'City not found!');
        }
    
        // Update the city's attributes with the new values from the form
        $city->country_id = $request->input('country_id');
        $city->city_name = $request->input('city_name');
        $city->save();
    
        // Redirect back to the location page with a success message
        return redirect('/location')->with('success_message', 'Updated successfully!');
    }
    

    public function destroy(string $id): RedirectResponse
    {
        City::destroy($id);
        return redirect('Location')->with('flash_message', 'Country deleted!');
    }
}
