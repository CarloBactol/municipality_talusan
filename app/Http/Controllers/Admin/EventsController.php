<?php

namespace App\Http\Controllers\Admin;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function events()
    {
        $events = Events::all();
        return view('admin.events.index', compact('events'));
    }

    
    public function add()
    {
        return view('admin.events.add-events');
    }

    public function insert(Request $request)
    {
        $events = new Events();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/events',$filename);
            $events->image = $filename;
        }
        $events->author = $request->input('author');
        $events->title = $request->input('title');
        $events->start = $request->input('start');
        $events->end = $request->input('end');
        $events->description = $request->input('description');
        $events->type = $request->input('type');
        $events->save();
        return redirect('/events')->with('status'," Added Successfullly");
    }

    public function edit($id)
    {
        $events = Events::findorfail($id);
        return view('admin.events.edit-events', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $events = Events::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/slider/".$events->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/events',$filename);
            $events->image = $filename;
            
        }

        $events->author = $request->input('author');
        $events->title = $request->input('title');
        $events->start = $request->input('start');
        $events->end = $request->input('end');
        $events->description = $request->input('description');
        $events->type = $request->input('type');
        $events->update();
        return redirect('/events')->with('status',"Events Updated Successfullly");
    }

    public function destroy($id)
    {
        $events = Events::findorfail($id); 
        if ($events->image) {
            $path = '/assets/uploads/events'.$events->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $events->delete();
        return redirect('/events')->with('status',"Events Deleted Successfullly");
    }

    public function restoreEvents()
    {
        $events = Events::onlyTrashed()->get();
        return view('admin.events.restore-events', compact('events'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            Events::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }   
    }



}
