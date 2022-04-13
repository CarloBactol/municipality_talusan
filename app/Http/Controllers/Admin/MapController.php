<?php

namespace App\Http\Controllers\Admin;

use App\Models\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MapController extends Controller
{
    public function how_to_get_there()
    {
        $maps = Map::all();
        return view('admin.about.how-to-get-there-list', compact('maps'));
    }

    public function add_map()
    {
        return view('admin.about.add-how-to-get-there');
    }

    public function insert(Request $request)
    {
        $barangay = new Map();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/map',$filename);
            $barangay->image = $filename;
        }

        $barangay->name = $request->input('name');
        $barangay->description = $request->input('description');
        $barangay->save();
        return redirect('/how-to-get-there-list')->with('status',"New Map Added Successfullly");
    }

    public function edit($id)
    {
        $maps = Map::findorfail($id);
        return view('admin.about.edit-how-to-get-there', compact('maps'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
            'image' => '|image|mimes:jpg,jpeg,png,gif,svg|',
        ]);

        $maps = Map::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/cityCouncil/".$maps->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/map',$filename);
            $maps->image = $filename;
            
        }
        $maps->name = $request->input('name');
        $maps->description = $request->input('description');
        $maps->update();
        return redirect('/how-to-get-there-list')->with('status'," Updated Successfullly");
    }

    public function destroy($id)
    {
        $maps = Map::findorfail($id); 
        if ($maps->image) {
            $path = '/assets/uploads/news'.$maps->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $maps->delete();
        return redirect()->back()->with('status',"Map Deleted Successfullly");
    }

    public function  restoreMaps()
    {
        $maps = Map::onlyTrashed()->get();
        return view('admin.about.restore-maps', compact('maps'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Map::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }

}
