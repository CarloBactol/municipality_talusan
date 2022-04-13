<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barangay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BarangayController extends Controller
{
    public function index()
    {
        $barangays = Barangay::all();
        return view('admin.barangay.index', compact('barangays'));
    }

    public function add()
    {
        return view('admin.barangay.add-barangay');
    }

    public function insert(Request $request)
    {
        $barangay = new Barangay();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                //max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/barangay',$filename);
            $barangay->image = $filename;
        }

        $barangay->name = $request->input('name');
        $barangay->brgy_captain_name = $request->input('brgy_captain_name');
        $barangay->contact= $request->input('contact');
        $barangay->address= $request->input('address');
        $barangay->description = $request->input('description');
        $barangay->map = $request->input('map');
        $barangay->save();
        return redirect('/barangay')->with('status',"New Barangay Added Successfullly");
    }

    public function edit($id)
    {
        $barangays = Barangay::findorfail($id);
        return view('admin.barangay.edit-barangay', compact('barangays'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
            'image' => '|image|mimes:jpg,jpeg,png,gif,svg|',
        ]);

        $barangays = Barangay::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/slider/".$barangays->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/barangay',$filename);
            $barangays->image = $filename;
            
        }
        $barangays->name = $request->input('name');
        $barangays->brgy_captain_name = $request->input('brgy_captain_name');
        $barangays->contact= $request->input('contact');
        $barangays->address= $request->input('address');
        $barangays->description = $request->input('description');
        $barangays->map = $request->input('map');
        $barangays->update();
        return redirect('/barangay')->with('status',"Barangay Updated Successfullly");
    }

    public function destroy($id)
    {
        $barangays = Barangay::findorfail($id); 
        if ($barangays->image) {
            $path = '/assets/uploads/barangay'.$barangays->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $barangays->delete();
        return redirect('/barangay')->with('status',"Barangay Deleted Successfullly");
    }

    public function restoreBarangay()
    {
        $barangays = Barangay::onlyTrashed()->paginate(5);
        return view('admin.barangay.restore-barangay', compact('barangays'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Barangay::onlyTrashed()->where('id', $id)->restore();
            return redirect('/barangay')->with('status','Successfully Restored');
        }
    }
}
