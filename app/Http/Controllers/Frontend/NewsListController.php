<?php

namespace App\Http\Controllers\Frontend;

use App\Models\NewsUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsListController extends Controller
{
    public function index($id)
    {
        $news = NewsUpdate::findorfail($id);
        return view('frontend.news.index', compact('news'));
    }

    public function january(Request $request)
   {
       // from form
        $query = $request->input('query'); 
        $res = (int)$query;

        $january = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '1')
        ->get();
        return view('frontend.news.january', compact('january'));
    
   }

   public function february(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $february = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '2')
        ->get();
        return view('frontend.news.february', compact('february'));
   }

   public function march(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $march = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '3')
        ->get();
        return view('frontend.news.march', compact('march'))->with('status', 'Congrats new record found');
   }

   public function april(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $april = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '4')
        ->get();
        return view('frontend.news.april', compact('april'))->with('status', 'Congrats new record found');
   }

   public function may(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $may = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '5')
        ->get();
        return view('frontend.news.may', compact('may'))->with('status', 'Congrats new record found');
   }


   public function june(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $june = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '6')
        ->get();
        return view('frontend.news.june', compact('june'))->with('status', 'Congrats new record found');
   }

   public function july(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $july = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '7')
        ->get();
        return view('frontend.news.july', compact('july'))->with('status', 'Congrats new record found');
   }


   public function august(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $august = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '8')
        ->get();
        return view('frontend.news.august', compact('august'))->with('status', 'Congrats new record found');
   }

   public function september(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $september = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '9')
        ->get();
        return view('frontend.news.september', compact('september'))->with('status', 'Congrats new record found');
   }

   public function october(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $october = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '10')
        ->get();
        return view('frontend.news.october', compact('october'))->with('status', 'Congrats new record found');
   }


   public function november(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $november = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '11')
        ->get();
        return view('frontend.news.november', compact('november'))->with('status', 'Congrats new record found');
   }

   public function december(Request $request)
   {
        $query = $request->input('query'); 
        $res = (int)$query;

        $december = NewsUpdate::whereYear('created_at', 'Like', $res)
        ->whereMonth('created_at', '12')
        ->get();
        return view('frontend.news.december', compact('december'))->with('status', 'Congrats new record found');
   }
    
}
