<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Food;
use App\Models\Tourism;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourismListController extends Controller
{
    public function destinationsList()
    {
        $destinations = Tourism::all();
        return view('frontend.tourism.destinations', compact('destinations'));
    }

    public function info($id)
    {   
        $destinations = Tourism::findorfail($id);
        return view('frontend.tourism.info', compact('destinations'));
    }

    public function food()
    {   
        $foods = Food::orderBy('created_at', 'DESC')->get();
        return view('frontend.tourism.food', compact('foods'));
    }

    public function food_info($id)
    {   
        $food_info = Food::findorfail($id);
        return view('frontend.tourism.food-info', compact('food_info'));
    }

    public function tradition()
    {   
        return view('frontend.tourism.tradition');
    }
}
