<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tradition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TraditionsController extends Controller
{
    public function index()
    {
        $traditions = Tradition::orderBy('id', 'DESC')->get();
        return view('admin.traditions.traditions-list', compact('traditions'));
    }

    public function add_traditions()
    {
        return view('admin.traditions.add-traditions');
    }

    public function insert(Request $request)
    {
        $traditions = new Tradition();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/traditions',$filename);
            $traditions->image = $filename;
        }

        $traditions->name = $request->input('name');
        $traditions->description = $request->input('description');
        $traditions->save();
        return redirect()->back()->with('status',"Added Successfullly");
    }

    public function edit($id)
    {
        $traditions = Tradition::findorfail($id);
        return view('admin.traditions.edit-traditions', compact('traditions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $traditions = Tradition::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/traditions/".$traditions->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/traditions',$filename);
            $traditions->image = $filename;
            
        }

        $traditions->name = $request->input('name');
        $traditions->description = $request->input('description');
        $traditions->update();
        return redirect('/traditions-list')->with('status',"Updated Successfullly");
    }

    public function destroy($id)
    {
        $traditions = Tradition::findorfail($id); 
        if ($traditions->image) {
            $path = '/assets/uploads/traditions'.$traditions->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $traditions->delete();
        return redirect()->back()->with('status',"Deleted Successfullly");
    }


    public function restoreTraditions()
    {
        $traditions = Tradition::onlyTrashed()->get();
        return view('admin.traditions.restore-traditions', compact('traditions'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Tradition::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }
}
