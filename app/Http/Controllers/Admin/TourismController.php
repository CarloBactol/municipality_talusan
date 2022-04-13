<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tourism;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TourismController extends Controller
{
    public function destinations()
    {
        $destinations = Tourism::all();
        return view('admin.tourism.destinations', compact('destinations'));
    }

    public function add()
    {
        return view('admin.tourism.add-destinations');
    }

    public function insert(Request $request)
    {
        $destinations = new Tourism();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/tourisms',$filename);
            $destinations->image = $filename;
        }

        $destinations->name = $request->input('name');
        $destinations->description = $request->input('description');
        $destinations->address = $request->input('address');
        $destinations->save();
        return redirect('/destinations')->with('status',"Added Successfullly");
    }

    public function edit($id)
    {
        $destinations = Tourism::findorfail($id);
        return view('admin.tourism.edit-destinations', compact('destinations'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $destinations = Tourism::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/tourisms/".$destinations->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/tourisms',$filename);
            $destinations->image = $filename;
            
        }

        $destinations->name = $request->input('name');
        $destinations->description = $request->input('description');
        $destinations->address = $request->input('address');
        $destinations->update();
        return redirect('/destinations')->with('status',"Updated Successfullly");
    }

    public function destroy($id)
    {
        $destinations = Tourism::findorfail($id); 
        if ($destinations->image) {
            $path = '/assets/uploads/tourisms'.$destinations->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $destinations->delete();
        return redirect()->back()->with('status',"Deleted Successfullly");
    }

    
    public function restoreDestinations()
    {
        $destinations = Tourism::onlyTrashed()->get();
        return view('admin.tourism.restore-destinations', compact('destinations'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Tourism::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }

}
