<?php

namespace App\Http\Controllers\Admin;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AwardsController extends Controller
{
    public function index()
    {
        $awards = Award::all();
        return view('admin.awards.index', compact('awards'));
    }

    public function add()
    {
        return view('admin.awards.add-awards');
    }

    public function insert(Request $request)
    {
        $awards = new Award();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'image|mimes:jpg,jpeg,png,gif,svg|',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/awards',$filename);
            $awards->image = $filename;
        }

        $awards->name = $request->input('name');
        $awards->description = $request->input('description');
        $awards->save();
        return redirect('/awards')->with('status',"Added Successfullly");
    }

    public function edit($id)
    {
        $awards = Award::findorfail($id);
        return view('admin.awards.edit-awards', compact('awards'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => '|image|mimes:jpg,jpeg,png,gif,svg|',
        ]);

        $awards = Award::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/awards/".$awards->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/awards',$filename);
            $awards->image = $filename;
            
        }
        $awards->name = $request->input('name');
        $awards->description = $request->input('description');
        $awards->update();
        return redirect('/awards')->with('status',"Updated Successfullly");
    }

    public function destroy($id)
    {
        $awrds = Award::findorfail($id); 
        if ($awrds->image) {
            $path = '/assets/uploads/awards'.$awrds->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $awrds->delete();
        return redirect('/awards')->with('status',"Deleted Successfullly");
    }

    public function restoreAwards()
    {
        $awards = Award::onlyTrashed()->get();
        return view('admin.awards.restore-awards', compact('awards'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Award::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }


}
