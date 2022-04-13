<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Award;
use App\Models\Video;
use App\Models\Events;
use App\Models\Slider;
use App\Models\NewsUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    public function index()
    {   
        $news = NewsUpdate::orderBy('created_at', 'desc')
        ->take(1)
        ->whereDate('created_at', '=', Carbon::now()
        ->toDateString())
        // ->whereMonth('created_at', now()->month)
        ->get();
        

        $recents = NewsUpdate::orderBy('created_at', 'desc')
        ->skip(1)
        ->take(2)
        ->whereMonth('created_at', now()->month)
        ->get();

        $events = Events::orderBy('created_at', 'desc')
        ->whereMonth('created_at', now()->month)
        ->paginate(4);

        $videos = Video::orderBy('created_at', 'desc')
        ->paginate(2);

        $awards = Award::orderBy('created_at', 'desc')
        // ->whereMonth('created_at', now()->month)
        ->paginate(3);

        $sliderViews = Slider::orderBy('created_at', 'desc')
        ->take(3)
        ->get();
        return view('frontend.index', compact('sliderViews', 'news', 'events', 'videos','awards', 'recents'));     
    }
    
}
