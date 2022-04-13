<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FoodsController extends Controller
{
    public function index()
    {
        $foods = Food::orderBy('id', 'DESC')->get();
        return view('admin.foods.foods-list', compact('foods'));
    }

    public function add_foods()
    {
        return view('admin.foods.add-foods');
    }

    public function insert(Request $request)
    {
        $destinations = new Food();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/foods',$filename);
            $destinations->image = $filename;
        }

        $destinations->name = $request->input('name');
        $destinations->description = $request->input('description');
        $destinations->save();
        return redirect()->back()->with('status',"Added Successfullly");
    }

    public function edit($id)
    {
        $foods = Food::findorfail($id);
        return view('admin.foods.edit-foods', compact('foods'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $foods = Food::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/tourisms/".$foods->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/foods',$filename);
            $foods->image = $filename;
            
        }

        $foods->name = $request->input('name');
        $foods->description = $request->input('description');
        $foods->update();
        return redirect('/foods-list')->with('status',"Updated Successfullly");
    }

    public function destroy($id)
    {
        $foods = food::findorfail($id); 
        if ($foods->image) {
            $path = '/assets/uploads/foods'.$foods->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $foods->delete();
        return redirect()->back()->with('status',"Deleted Successfullly");
    }

    public function restoreFoods()
    {
        $foods = Food::onlyTrashed()->get();
        return view('admin.foods.restore-foods', compact('foods'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Food::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }
}
