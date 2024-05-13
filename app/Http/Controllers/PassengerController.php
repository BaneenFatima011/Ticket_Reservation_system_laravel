<?php

namespace App\Http\Controllers;
use App\Models\passenger;
use App\Models\credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class PassengerController extends Controller
{
   
    public function registerUser(Request $request){
        //input validation
        $request->validate([
            'passenger_id'=>'required|unique:passengers|min:2|max:5 ',
            'name'=>'required',
            'email'=>'required|email|unique:passengers',
            'password'=>'required|min:10|max:10',
            'age'=>'required',
            'cnic'=>'required|unique:passengers|min:13|max:13 | regex:/^[0-9]+$/ ',
            'phone'=>'required|min:11|max:11| regex:/^[0-9]+$/',
           

        ]);
       
        
        //database entries into passenger table
        $passenger=new Passenger();
        //hashing password
        $password=Hash::make($request->password);
        $passenger->passenger_id=$request->passenger_id;
        $passenger->name=$request->name;
        $passenger->cnic=$request->cnic;
        $passenger->age=$request->age;
        $passenger->phone  =$request->phone;
        $passenger->email=$request->email;
            //used already hashed password
        $passenger->password=$password;
        $res=$passenger->save();
         //database entries into credentials table
        $cred=new credential();
        $id=$request->cnic;
        $name=$request->email;
        $role="1";
        $cred->id=$id;
        $cred->name=$name;
        //used already hashed password
        $cred->password=$password;
        $cred->role=$role;
        $res2=$cred->save();
        //if both entries are true then succesfully registered message
        if($res && $res2 ){
            return back()->with('success','Succesfully Registered');
                    }
                    else{
                        return back()->with('failure','Not Registered');
             
            
                    }




    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
