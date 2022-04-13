<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Award;
use App\Models\Video;
use App\Models\Events;
use App\Models\Slider;
use App\Models\Tourism;
use App\Models\Barangay;
use App\Models\NewsUpdate;
use App\Models\CityCouncil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $news = NewsUpdate::count();
        $events = Events::count();
        $videos = Video::count();
        $sliders = Slider::count();
        $awards = Award::count();
        $barangays = Barangay::count();
        $tourism = Tourism::count();
        $lgo = CityCouncil::count();
        
        return view('admin.index', compact( 'news', 'events', 'videos', 'sliders', 'awards', 'barangays', 'tourism', 'lgo'));
    }

    public function profile($id)
    {
        $profiles = User::findorfail($id);
        return view('admin.profile', compact('profiles'));
    }

    public function admin_list()
    {
        $admin_list = User::orderBy('created_at', 'DESC')->get();
        return view('admin.admin-list', compact('admin_list'));
    }

    public function add_admin()
    {
        return view('admin.add-admin');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $admin = new User();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->role_as = $request->input('type');
        $admin->super_admin = $request->input('super_admin');
        $admin->password = Hash::make(($request->password));
        $admin->save();
        return redirect()->back()->with('status',"new admin created!");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $profile = User::findorfail($id);
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->update();
        return redirect()->back()->with('status',"Your Profile Updated Successfullly!");
    }

    public function destroy($id)
    {
        $admin = User::findorfail($id); 
        $admin->delete();
        return redirect()->back()->with('status',"Deleted Successfullly");
    }

    public function restoreAdmin()
    {
        $restores = User::onlyTrashed()->get();
        return view('admin.restore-admin', compact('restores'))->with('status','New Deleted File have been inserted successfully');
    }

    public function postRestore($id = null)
    {
        if ($id!==null) {
            User::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('status','Successfully Restored');
        }
    }

}
