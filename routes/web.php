<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FoodsController;
use App\Http\Controllers\Admin\AwardsController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\TourismController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\NewsUpdateController;
use App\Http\Controllers\Admin\TraditionsController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\Frontend\NewsListController;
use App\Http\Controllers\Frontend\AwardsListController;
use App\Http\Controllers\Frontend\EventsListController;
use App\Http\Controllers\Frontend\TourismListController;
use App\Http\Controllers\Frontend\BarangayListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [frontendController::class, 'index'])->name('frontend.index');

Route::get('thanks', function ()
{
  return view('layouts.thanks');
});


// About Frontend
Route::get('/about-city', [AboutUsController::class, 'about'])->name('frontend.about.index');
Route::get('/about/how-to-get-there', [AboutUsController::class, 'how_to_get_there'])->name('frontend.about.how-to-get-there');
Route::get('/about/city-council', [AboutUsController::class, 'city_council'])->name('frontend.about.city-council');
Route::get('/about/city-mayor', [AboutUsController::class, 'city_mayor'])->name('frontend.about.city-mayor');
Route::get('/about/profile/{id}', [AboutUsController::class, 'profile'])->name('frontend.about.profile');
Route::get('/about/profile-city-council/{id}', [AboutUsController::class, 'profile_city_council'])->name('frontend.about.profile-city-council');


// BarangayList Frontend
Route::get('/barangay-list', [BarangayListController::class, 'index'])->name('frontend.barangay.index');
Route::get('/barangay-list/info/{id}', [BarangayListController::class, 'info'])->name('frontend.barangay.info');
Auth::routes();

// News Frontend
Route::get('/news-update/{id}', [NewsListController::class, 'index'])->name('frontend.news.index');
Route::get('/news-list/january', [NewsListController::class, 'january'])->name('frontend.news.junuary');
Route::get('/news-list/february', [NewsListController::class, 'february'])->name('frontend.news.february');
Route::get('/news-list/march', [NewsListController::class, 'march'])->name('frontend.news.march');
Route::get('/news-list/april', [NewsListController::class, 'april'])->name('frontend.news.april');
Route::get('/news-list/may', [NewsListController::class, 'may'])->name('frontend.news.may');
Route::get('/news-list/june', [NewsListController::class, 'june'])->name('frontend.news.june');
Route::get('/news-list/july', [NewsListController::class, 'july'])->name('frontend.news.july');
Route::get('/news-list/august', [NewsListController::class, 'august'])->name('frontend.news.august');
Route::get('/news-list/september', [NewsListController::class, 'september'])->name('frontend.news.september');
Route::get('/news-list/october', [NewsListController::class, 'october'])->name('frontend.news.october');
Route::get('/news-list/november', [NewsListController::class, 'november'])->name('frontend.news.november');
Route::get('/news-list/december', [NewsListController::class, 'december'])->name('frontend.news.december');

// Events Frontend
Route::get('/events-update/{id}', [EventsListController::class, 'index'])->name('frontend.events.index');
Route::get('/events-list/january', [EventsListController::class, 'junuary'])->name('frontend.events.junuary');
Route::get('/events-list/february', [EventsListController::class, 'february'])->name('frontend.events.february');
Route::get('/events-list/march', [EventsListController::class, 'march'])->name('frontend.events.march');
Route::get('/events-list/april', [EventsListController::class, 'april'])->name('frontend.events.april');
Route::get('/events-list/may', [EventsListController::class, 'may'])->name('frontend.events.may');
Route::get('/events-list/june', [EventsListController::class, 'june'])->name('frontend.events.june');
Route::get('/events-list/july', [EventsListController::class, 'july'])->name('frontend.events.july');
Route::get('/events-list/august', [EventsListController::class, 'august'])->name('frontend.events.august');
Route::get('/events-list/september', [EventsListController::class, 'september'])->name('frontend.events.september');
Route::get('/events-list/october', [EventsListController::class, 'october'])->name('frontend.events.october');
Route::get('/events-list/november', [EventsListController::class, 'november'])->name('frontend.events.november');
Route::get('/events-list/december', [EventsListController::class, 'december'])->name('frontend.events.december');



Route::get('/search', [EventsListController::class, 'search'])->name('frontend.events.search');


// Awards Frontend
Route::get('awards-list', [AwardsListController::class, 'awards'])->name('frontend.awards.index');

// Tourism Frontend
Route::get('destinations-list', [TourismListController::class, 'destinationsList'])->name('frontend.tourisms.destinations');
Route::get('destinations-list/info/{id}', [TourismListController::class, 'info'])->name('frontend.tourism.info');
Route::get('food', [TourismListController::class, 'food'])->name('frontend.tourism.food');
Route::get('food-info/{id}', [TourismListController::class, 'food_info'])->name('frontend.tourism.food-info');
Route::get('tradition', [TourismListController::class, 'tradition'])->name('frontend.tourism.tradition');

// Contact Frontend
Route::get('contact', [ContactController::class, 'contact'])->name('frontend.contact.index');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index']);

    // My Profile
    Route::get('profile/{id}', [AdminController::class, 'profile']);
    Route::put('update-profile/{id}', [AdminController::class, 'update']);

    // Admin List
    Route::get('admin-list', [AdminController::class, 'admin_list']);
    Route::get('add-admin', [AdminController::class, 'add_admin']);
    Route::post('create-admin', [AdminController::class, 'create']);
    Route::get('delete-admin/{id}', [AdminController::class, 'destroy']);
    Route::get('restore-admin', [AdminController::class, 'restoreAdmin'])->name('admin.restore-admin');
    Route::get('restore-admin/info/{id}', [AdminController::class, 'postRestore']);

    // SLIDER-PAGES
    Route::get('slider', 'Admin\SliderController@index');
    Route::get('add-slider', 'Admin\SliderController@add');
    Route::post('insert-slider', 'Admin\SliderController@insert');
    Route::get('edit-slider/{id}','Admin\SliderController@edit');
    Route::put('update-slider/{id}','Admin\SliderController@update');
    Route::get('delete-slider/{id}','Admin\SliderController@destroy');
    Route::get('restore-slider','Admin\SliderController@restoreSlider');
    Route::get('restore-slider/info/{id?}',[SliderController::class, 'postRestore'])->name('admin.slider.info');

     // News -PAGES
    Route::get('news', [NewsUpdateController::class, 'news'])->name('admin.news.index');
    Route::get('add-news', [NewsUpdateController::class, 'add'])->name('admin.news.add-news');
    Route::post('insert-news', [NewsUpdateController::class, 'insert']);
    Route::get('edit-news/{id}', [NewsUpdateController::class, 'edit']);
    Route::put('update-news/{id}', [NewsUpdateController::class, 'update']);
    Route::get('delete-news/{id}', [NewsUpdateController::class, 'destroy']);
    Route::get('restore-news', [NewsUpdateController::class, 'restoreNews']);
    Route::get('restore-news/info/{id}', [NewsUpdateController::class, 'postRestore'])->name('admin.news.info');


      // Events -PAGES
    Route::get('events', [EventsController::class, 'events'])->name('admin.events.index');
    Route::get('add-events', [EventsController::class, 'add'])->name('admin.events.add-events');
    Route::post('insert-events', [EventsController::class, 'insert']);
    Route::get('edit-events/{id}', [EventsController::class, 'edit']);
    Route::put('update-events/{id}', [EventsController::class, 'update']);
    Route::get('delete-events/{id}', [EventsController::class, 'destroy']);
    Route::get('restore-events', [EventsController::class, 'restoreEvents']);
    Route::get('restore-events/info/{id}', [EventsController::class, 'postRestore'])->name('admin.events.info');

    // Videos -PAGES
    Route::get('videos', [VideosController::class, 'index'])->name('admin.videos.index');
    Route::get('add-videos', [VideosController::class, 'add'])->name('admin.videos.add-videos');
    Route::post('insert-videos', [VideosController::class, 'insert'])->name('admin.videos.insert-videos');
    Route::get('edit-videos/{id}', [VideosController::class, 'edit'])->name('admin.videos.edit-videos');
    Route::put('update-videos/{id}', [VideosController::class, 'update']);
    Route::get('delete-videos/{id}', [VideosController::class, 'destroy']);
    Route::get('restore-videos', [VideosController::class, 'restoreVideos']);
    Route::get('restore-video/info/{id}', [VideosController::class, 'postRestore'])->name('admin.videos.info');

     // Awards -PAGES
     Route::get('awards', [AwardsController::class, 'index'])->name('admin.awards.index');
     Route::get('add-awards', [AwardsController::class, 'add'])->name('admin.awards.add-awards');
     Route::post('insert-awards', [AwardsController::class, 'insert']);
     Route::get('edit-awards/{id}', [AwardsController::class, 'edit']);
     Route::put('update-awards/{id}', [AwardsController::class, 'update']);
     Route::get('delete-awards/{id}', [AwardsController::class, 'destroy']);
     Route::get('restore-awards', [AwardsController::class, 'restoreAwards']);
     Route::get('restore-awards/info/{id}', [AwardsController::class, 'postRestore'])->name('admin.awards.info');


    //BARANGAY-PAGES
    Route::get('barangay', [BarangayController::class, 'index'])->name('admin.barangay.index');
    Route::get('add-barangay', [BarangayController::class, 'add'])->name('admin.barangay.add-barangay');
    Route::post('insert-barangay', [BarangayController::class, 'insert']);
    Route::get('edit-barangay/{id}', [BarangayController::class, 'edit']);
    Route::put('update-barangay/{id}',[BarangayController::class, 'update']);
    Route::get('delete-barangay/{id}',[BarangayController::class, 'destroy']);
    Route::get('restore-barangay',[BarangayController::class, 'restoreBarangay']);
    Route::get('restore-barangay/info/{id}',[BarangayController::class, 'postRestore'])->name('admin.barangay.info');


    // About -PAGES
    Route::get('/city-council-list', [AboutController::class, 'city_council_list'])->name('admin.about.city-council-list');
    Route::get('/add-city-council', [AboutController::class, 'add'])->name('admin.about.add-city-council');
    Route::post('/insert_city_council', [AboutController::class, 'insert']);
    Route::get('/edit-city-council/{id}', [AboutController::class, 'edit']);
    Route::put('/update-city-council/{id}', [AboutController::class, 'update']);
    Route::get('/delete-city-council/{id}', [AboutController::class, 'destroy']);
    Route::get('/restore-city-council', [AboutController::class, 'restore_city_council']); 
    Route::get('/restore-city-council/info/{id}', [AboutController::class, 'postRestore'])->name('admin.about.info'); 
   
    Route::get('/how-to-get-there-list', [MapController::class, 'how_to_get_there'])->name('admin.about.how-to-get-there-list');
    Route::get('/add-how-to-get-there', [MapController::class, 'add_map'])->name('admin.about.add-how-to-get-there');
    Route::post('/insert-how-to-get-there', [MapController::class, 'insert'])->name('admin.about.insert-how-to-get-there');
    Route::get('/edit-how-to-get-there/{id}', [MapController::class, 'edit'])->name('admin.about.edit-how-to-get-there');
    Route::put('/update-how-to-get-there/{id}', [MapController::class, 'update']);
    Route::get('/delete-how-to-get-there/{id}', [MapController::class, 'destroy']);
    Route::get('/restore-maps', [MapController::class, 'restoreMaps']); 
    Route::get('/restore-maps/post/{id}', [MapController::class, 'postRestore'])->name('admin.about.post'); 


   // Tourism -PAGES
    Route::get('destinations', [TourismController::class, 'destinations'])->name('admin.tourism.destinations');
    Route::get('add-destinations', [TourismController::class, 'add'])->name('admin.tourism.add-destinations');
    Route::post('insert-destinations', [TourismController::class, 'insert'])->name('admin.tourism.insert-destinations');
    Route::get('edit-destinations/{id}', [TourismController::class, 'edit'])->name('admin.tourism.edit-destinations');
    Route::put('update-destinations/{id}', [TourismController::class, 'update']);
    Route::get('delete-destinations/{id}', [TourismController::class, 'destroy']);
    Route::get('restore-destinations', [TourismController::class, 'restoreDestinations']);
    Route::get('restore-destinations/info/{id}', [TourismController::class, 'postRestore'])->name('admin.tourism.info');


    // Tourism - foods
    Route::get('foods-list', [FoodsController::class, 'index'])->name('admin.foods.foods-list');
    Route::get('add-foods', [FoodsController::class, 'add_foods'])->name('admin.foods.add-foods');
    Route::post('insert-foods', [FoodsController::class, 'insert'])->name('admin.foods.insert-foods');
    Route::get('edit-foods/{id}', [FoodsController::class, 'edit'])->name('admin.foods.edit-foods');
    Route::put('update-foods/{id}', [FoodsController::class, 'update'])->name('admin.foods.update-foods');
    Route::get('delete-foods/{id}', [FoodsController::class, 'destroy'])->name('admin.foods.delete-foods');
    Route::get('restore-foods', [FoodsController::class, 'restoreFoods'])->name('admin.foods.restore-foods');
    Route::get('restore-foods/info/{id}', [FoodsController::class, 'postRestore'])->name('admin.foods.info');

    // Tourism traditions
    Route::get('traditions-list', [TraditionsController::class, 'index'])->name('admin.foods.traditions-list');
    Route::get('add-traditions', [TraditionsController::class, 'add_traditions'])->name('admin.foods.add-traditions');
    Route::post('insert-traditions', [TraditionsController::class, 'insert'])->name('admin.foods.insert-traditions');
    Route::get('edit-traditions/{id}', [TraditionsController::class, 'edit'])->name('admin.foods.edit-traditions');
    Route::put('update-traditions/{id}', [TraditionsController::class, 'update'])->name('admin.foods.update-traditions');
    Route::get('delete-traditions/{id}', [TraditionsController::class, 'destroy'])->name('admin.foods.delete-traditions');
    Route::get('restore-traditions', [TraditionsController::class, 'restoreTraditions'])->name('admin.traditions.restore-traditions');
    Route::get('restore-traditions/info/{id}', [TraditionsController::class, 'postRestore'])->name('admin.traditions.info');
});
