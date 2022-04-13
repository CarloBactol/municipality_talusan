<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsListController extends Controller
{
   public function index($id)
   {
        $events = Events::findorfail($id);
        return view('frontend.events.index', compact('events'));
   }


   public function junuary(Request $request)
   {
       // from form
        $year = $request->input('year'); 
        $result_year = (int)$year;

        $january = Events::whereYear('created_at', 'Like', $result_year)
        ->whereMonth('created_at', '1')
        ->get();
        return view('frontend.events.january', compact('january'));
    
   }

   public function february(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $february = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '2')
        ->get();
        return view('frontend.events.february', compact('february'));
   }

   public function march(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $march = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '3')
        ->get();
        return view('frontend.events.march', compact('march'))->with('status', 'Congrats new record found');
   }

   public function april(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $april = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '4')
        ->get();
        return view('frontend.events.april', compact('april'))->with('status', 'Congrats new record found');
   }

   public function may(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $may = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '5')
        ->get();
        return view('frontend.events.may', compact('may'))->with('status', 'Congrats new record found');
   }


   public function june(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $june = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '6')
        ->get();
        return view('frontend.events.june', compact('june'))->with('status', 'Congrats new record found');
   }


   public function july(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $july = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '7')
        ->get();
        return view('frontend.events.july', compact('july'))->with('status', 'Congrats new record found');
   }

   public function august(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $august = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '8')
        ->get();
        return view('frontend.events.august', compact('august'))->with('status', 'Congrats new record found');
   }

   public function september(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $september = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '9')
        ->get();
        return view('frontend.events.september', compact('september'))->with('status', 'Congrats new record found');
   }

   public function october(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $october = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '10')
        ->get();
        return view('frontend.events.october', compact('october'))->with('status', 'Congrats new record found');
   }


   public function november(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $november = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '11')
        ->get();
        return view('frontend.events.november', compact('november'))->with('status', 'Congrats new record found');
   }


   public function december(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $december = Events::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '12')
        ->get();
        return view('frontend.events.december', compact('december'))->with('status', 'Congrats new record found');
   }







    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $search = Events::whereYear('created_at', 'Like', "%$query%")->get();
    //     return view('frontend.events.search', compact('search'));
    // }

}
