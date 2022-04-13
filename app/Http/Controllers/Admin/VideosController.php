<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    public function add()
    {
        return view('admin.videos.add-videos');
    }

    public function insert(Request $request)
    {
        $videos = new Video();

        $videos->name = $request->input('name');
        $videos->widget= $request->input('widget');
        $videos->save();
        return redirect('videos')->with('status',"created successfully");
    }

    public function edit($id)
    {
        $videos = Video::findorfail($id);
        return view('admin.videos.edit-videos', compact('videos'));
    }

    
    public function update(Request $request, $id)
    {
       
        $videos = Video::findorfail($id);
        $videos->name = $request->input('name');
        $videos->widget = $request->input('widget');
        $videos->update();
        return redirect('videos')->with('status'," Updated Successfullly");
    }

    public function destroy($id)
    {
        $videos = Video::findorfail($id); 
        $videos->delete();
        return redirect('/videos')->with('status',"Deleted Successfullly");
    }

    public function restoreVideos()
    {
        $videos = Video::onlyTrashed()->get();
        return view('admin.videos.restore-videos', compact('videos'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Video::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }   
    }


}
