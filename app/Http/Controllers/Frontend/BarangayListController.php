<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Barangay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangayListController extends Controller
{
    public function index()
    {   
        $barangayList = Barangay::all();
        return view('frontend.barangay.index', compact('barangayList'));
    }

    public function info($id)
    {   
        $barangays = Barangay::findorfail($id);
        return view('frontend.barangay.info', compact('barangays'));
    }
}
