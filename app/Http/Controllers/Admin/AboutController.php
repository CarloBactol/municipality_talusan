<?php

namespace App\Http\Controllers\Admin;

use App\Models\Map;
use App\Models\CityCouncil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function city_council_list()
    {
        $city_council = CityCouncil::all();
        return view('admin.about.city-council-list', compact('city_council'));
    }

   

    public function add()
    {
        return view('admin.about.add-city-council');
    }


    public function insert(Request $request)
    {
        $city_council = new CityCouncil();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/cityCouncil',$filename);
            $city_council->image = $filename;
        }

        $city_council->name = $request->input('name');
        $city_council->age = $request->input('age');
        $city_council->sex = $request->input('sex');
        $city_council->status = $request->input('status');
        $city_council->religion = $request->input('religion');
        $city_council->address = $request->input('address');
        $city_council->contact = $request->input('contact');
        $city_council->education = $request->input('education');
        $city_council->date_elected= $request->input('date-elected');
        $city_council->type= $request->input('type');
        $city_council->description = $request->input('description');
        $city_council->save();
        return redirect('/city-council-list')->with('status',"New City Council was created successfully");
    }

    public function edit($id)
    {
        $city_council = CityCouncil::findorfail($id);
        return view('admin.about.edit-city-council', compact('city_council'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
            'image' => '|image|mimes:jpg,jpeg,png,gif,svg|',
        ]);

        $city_council = CityCouncil::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/cityCouncil/".$city_council->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/cityCouncil',$filename);
            $city_council->image = $filename;
            
        }
        $city_council->name = $request->input('name');
        $city_council->age = $request->input('age');
        $city_council->sex = $request->input('sex');
        $city_council->status = $request->input('status');
        $city_council->religion = $request->input('religion');
        $city_council->address = $request->input('address');
        $city_council->contact = $request->input('contact');
        $city_council->education = $request->input('education');
        $city_council->date_elected= $request->input('date-elected');
        $city_council->type= $request->input('type');
        $city_council->description = $request->input('description');
        $city_council->update();
        return redirect('/city-council-list')->with('status',"City Council Updated Successfullly");
    }

    public function destroy($id)
    {
        $city_council = CityCouncil::findorfail($id); 
        if ($city_council->image) {
            $path = '/assets/uploads/cityCouncil'.$city_council->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $city_council->delete();
        return redirect()->back()->with('status',"CityCouncil Deleted Successfullly");
    }

    public function restore_city_council()
    {
        $city_councils = CityCouncil::onlyTrashed()->paginate(5);
        return view('admin.about.restore-city-council', compact('city_councils'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            CityCouncil::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }

}
