<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vendor;


class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        /* Controller level Role checking */
        //$this->middleware('rolecheck:ADMIN');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $vendors = Vendor::paginate(10);

        return view('admin.vendor.list',['vendors' => $vendors]);
    }

    public function approve(Request $request)
    {
        $vendor = Vendor::where('user_id', $request->input('hdnVendorId'))->first();
        if ($vendor != NULL)
        {
            $vendor->is_approved = true;
            $vendor->save();

            $request->session()->flash('op_status',"Vendor $vendor->name was approved!");
        }

        return redirect()->route('adminListVendors');
    }

    public function changeStatus(Request $request)
    {
        $vendor = Vendor::where('user_id', $request->input('hdnVendorId1'))->first();
        if ($vendor != NULL)
        {
            $action = $request->input('hdnActionCode');
            $vendor->is_blocked = ($action == 'UB' ? false : true);
            $vendor->save();

            $request->session()->flash('op_status',"Vendor $vendor->name was blocked!");
        }

        return redirect()->route('adminListVendors');
    }

    public function displayVendor($id)
    {
        $vendor = Vendor::where('user_id', $id)->first();
        if ($vendor != null){
            
            return view('admin.vendor.show', ['vendor' => $vendor]);
        }

        abort(404); 
    }

    public function editVendor($id)
    {
        $vendor = Vendor::where('user_id', $id)->first();
        if ($vendor != null){
            return view('admin.vendor.edit', ['vendor' => $vendor]);
        }

        abort(404); 
    }

    public function saveVendor(Request $request)
    {
        //Validate the request
        $request->validate([
            'address_line1' => 'required|max:45',
            'address_line2' => 'required|max:45',
            'city' => 'required|max:45',
            'state' => 'required|max:45',
            'contact_number' => 'required|digits_between:10,11',
        ]);

        //Find the vendor & update
        $vendor = Vendor::find($request->input('user_id'));
        if ($vendor != null)
        {
            $vendor->address_line1 = $request->input('address_line1');
            $vendor->address_line2 = $request->input('address_line2');
            $vendor->city = $request->input('city');
            $vendor->state = $request->input('state');
            $vendor->contact_number = $request->input('contact_number');

            $vendor->save();

            $request->session()->flash('op_status',"Vendor $vendor->name was updated succesfully!");
            return redirect()->route('adminListVendors');
        }

        // If validation failed then show the previour form with errors.
        return back()->withInput();   
        //abort(404);
    }
}
