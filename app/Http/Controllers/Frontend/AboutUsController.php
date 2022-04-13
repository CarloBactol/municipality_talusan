<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Map;
use App\Models\CityCouncil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function about()
    {   
        return view('frontend.about.index');
    }

    public function city_mayor()
    {
        $city_mayors = CityCouncil::where('type', '=' ,'Mayor')->get();
        return view('frontend.about.city-mayor', compact('city_mayors'));
    }

    public function city_council()
    {
        $city_councils = CityCouncil::where('type','ViceMayor')->orWhere('type','Councilor')->get();
        return view('frontend.about.city-council', compact('city_councils'));
    }
    
    public function how_to_get_there()
    {
        // $maps = Map::all();
        // return view('frontend.about.how-to-get-there', compact('maps'));
        return view('frontend.about.how-to-get-there');
    }

    public function profile($id)
    {
        $profile = CityCouncil::findorfail($id);
        return view('frontend.about.profile', compact('profile'));
    }

    
    public function profile_city_council($id)
    {
        $profile_city_council = CityCouncil::findorfail($id);
        return view('frontend.about.profile-city-council', compact('profile_city_council'));
    }
}
