<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Session;
class LocationController extends Controller
{
    public function showLocationForm(){
        $userId = Session::get('userId');
        $locations = Location::where('userid', $userId)->get();
        if(!$locations->isEmpty()){
            return view('dashboard', compact('locations'));
        }else{
            return view('locations');
        }
    }
    public function getLocation()
    {
        $userId = Session::get('userId');
        $locations = Location::where('userid', $userId)->get();
        return view('dashboard', compact('locations'));
    }

    public function storeLocation(Request $request)
    {
        $location = new Location;
        $location->state = $request->state;
        $location->city = $request->city;
        $location->pincode = $request->pincode;
        $location->userid = Session::get('userId');
        $location->save();
        return redirect()->route('dashboard')->with('success','Added Successfully');
    }

    public function getedit($id){
        $location = Location::findOrFail($id);
        return view('editlocation',compact('location'));
    }
     
    public function updateLocation(Request $request,$id){
        $location = Location::findOrFail($id);
        $location->state = $request->state;
        $location->city = $request->city;
        $location->pincode = $request->pincode;
        $location->save();
        return redirect()->route('dashboard')->with('success','Updated Successfully');
    }

    public function deleteLocation($id){
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect('/locations')->with('success','Deleted Successfully');
    }

}
