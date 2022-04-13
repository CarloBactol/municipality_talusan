<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NewsUpdateController extends Controller
{
    public function news()
    {
        $news = NewsUpdate::orderBy('created_at', 'desc')->get();
       return view('admin.news.index', compact('news'));
    }

    public function add()
    {
       return view('admin.news.add-news');
    }

    public function insert(Request $request)
    {
        $news = new NewsUpdate();
      
        if($request->hasFile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/news',$filename);
            $news->image = $filename;
        }

        $news->author = $request->input('author');
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->type = $request->input('type');
        $news->save();
        return redirect('/news')->with('status'," Added Successfullly");
    }

    public function edit($id)
    {
        $news = NewsUpdate::findorfail($id);
        return view('admin.news.edit-news', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $news = NewsUpdate::findorfail($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/slider/".$news->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/news',$filename);
            $news->image = $filename;
            
        }

        $news->author = $request->input('author');
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->type = $request->input('type');
        $news->update();
        return redirect('/news')->with('status',"News Updated Successfullly");
    }


    public function destroy($id)
    {
        $news = NewsUpdate::findorfail($id); 
        if ($news->image) {
            $path = '/assets/uploads/news'.$news->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $news->delete();
        return redirect('/news')->with('status',"News Deleted Successfullly");
    }

    public function restoreNews()
    {
        $news = NewsUpdate::onlyTrashed()->get();
        return view('admin.news.restore-news', compact('news'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            NewsUpdate::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }
}
