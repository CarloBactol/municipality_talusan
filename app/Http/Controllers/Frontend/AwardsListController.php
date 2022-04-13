<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AwardsListController extends Controller
{
    public function awards()
    {   
        $awards = Award::get();
        return view('frontend.awards.index', compact('awards'));
    }
}
