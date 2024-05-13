<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\credential; // Import the Credential model
use App\Models\Passenger; 
use App\Models\Reservation; 
use App\Models\transport; 
use App\Models\Company; 
class CredentialController extends Controller
{
    /**
     * Show the login form.
     */
   
    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        return View("login");
    }
    public function registration(){
        return View("register");
    }
    public function loginUser(Request $request)
    {
        // Validate input fields
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);
    
        // Retrieve user by ID
        $user = Credential::where('id', $request->id)->first();

        if ($user) {
            //checks hashed password from request as well as table
            if (Hash::check($request->password,$user->password)) {
                $request->session()->put('loginId',$user->id);
                $request->session()->put('role',$user->role);
                return redirect('dashboard');
               
            } else {
                return back()->with('failure', 'Invalid credentials');
            }
        } else {
            return back()->with('failure', 'User not found');
        }}
        
        
        public function dashboard(Request $request)
        {
            if (Session::has('loginId')) {
                $data = Credential::where('id', Session::get('loginId'))->first();
              
              
                if ($data->role == 0) {
                    // If the user is an admin, include the pie chart data
                    $transportCounts = Transport::join('transport_types', 'Transports.transport_type', '=', 'Transport_types.transport_id')
                    ->select('Transport_Types.transport_name as transport_name', DB::raw('COUNT(*) as count'))
                    ->groupBy('Transport_types.transport_name')
                    ->get();
                    $companyCounts = Company::join('transports', 'companies.company_id', '=', 'transports.company_id')
                    ->select('companies.company_name', DB::raw('COUNT(*) as count'))
                    ->groupBy('companies.company_name')
                    ->get();
                
                
                
                // Prepare data for the pie chart
                $labels = $transportCounts->pluck('transport_name');
                $data1 = $transportCounts->pluck('count');
               
                
                // Prepare data for reservations count
                $companyLabels = $companyCounts->pluck('company_name');
                $companyData = $companyCounts->pluck('count');
                
        
                    return view('dashboardadmin', compact('data', 'labels','data1','companyLabels','companyData'));
                } 
                else {
                    $cnic = $data->id; // Assuming ID is the CNIC
                    $data2 = Passenger::where('cnic', $cnic)->first();
                   
                    $data3 = Reservation::where('passenger_id', $cnic)->first();

                    $passengerId = $data->id; // Assuming you have the passenger ID stored in your Credential model
                  
                    // Store both session ID and passenger ID in session data
                    $request->session()->put('session_id', session()->getId());
                    $request->session()->put('passenger_id', $data2->passenger_id);
                    $request->session()->put('role',1);
                    $request->session()->put('passenger_name', $data2->name);
                    
                   
                    return view('dashboard', compact('data2', 'data', 'data3'));
                }
            } else {
                // If the session is not active, redirect to the login page
                return redirect('login');
            }
        }
        
        public function logout(){
            //if the session has loginId pull it and then redirect to login page
            if (Session::has('loginId')) {
                Session::pull('loginId');
                return redirect('login');
            }



        }
      

    }


        