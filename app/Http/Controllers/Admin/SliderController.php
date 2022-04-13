<?php

namespace App\Http\Controllers\Admin;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        // soft delete
        /*
            Slider::where('id', 1)->restore();
            Slider::omlyTrashed()->get();
            Slider::withTrashed()->get();
        */
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function add(){
        return view('admin.slider.add-slider');
    }

    public function insert(Request $request)
    {
        $slider = new Slider();
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/slider',$filename);
            $slider->image = $filename;
        }

        $slider->name = $request->input('name');
        $slider->description = $request->input('description');
        $slider->save();
        return redirect('/slider')->with('status',"slider Added Successfullly");
    }

    public function edit($id)
    {
        $sliders = Slider::findorfail($id);
        return view('admin.slider.edit-slider', compact('sliders'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $sliders = Slider::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/slider/".$sliders->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/slider',$filename);
            $sliders->image = $filename;
            
        }
        $sliders->name = $request->input('name');
        $sliders->description = $request->input('description');
        $sliders->update();
        return redirect('/dashboard')->with('status',"slider Updated Successfullly");
    }

    public function destroy($id)
    {
        $sliders = Slider::findorfail($id); 
        if ($sliders->image) {
            $path = '/assets/uploads/slider'.$sliders->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $sliders->delete();
        return redirect('/slider')->with('status',"slider Deleted Successfullly");
    }


    public function restoreSlider()
    {
        $restores = Slider::onlyTrashed()->paginate(5);
        return view('admin.slider.restore-slider', compact('restores'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Slider::onlyTrashed()->where('id', $id)->restore();
            return redirect('/slider')->with('status','Successfully Restored');
        }
    }


}
