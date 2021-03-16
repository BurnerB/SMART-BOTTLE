<?php

namespace App\Http\Controllers\user;
use App\Model\user\beer;
use App\Model\user\beer_category;
use App\Model\user\extra;
use App\Model\user\extra_category;
use App\Model\user\spirit_category;
use App\Model\user\spirit;
use App\Model\user\wine;
use App\Model\user\wine_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Model\admin\service;
use App\Model\user\category;
use App\Model\user\tag;
use App\banner;
use App\Model\user\post;
use App\offer;

use App\settings;
use App\Admin\seo;




class HomeController extends Controller
{
    //
    public function __construct()
    {
        View::share('logo_light', settings::where('name','logo_light')->first());
        View::share('logo_dark', settings::where('name','logo_dark')->first());
        View::share('favicon', settings::where('name','favicon')->first());
        View::share('email', settings::where('name','email')->first());
        View::share('mobile', settings::where('name','mobile')->first());
        View::share('whatsapp', settings::where('name','whatsapp')->first());
        View::share('facebook', settings::where('name','facebook')->first());
        View::share('linkedin', settings::where('name','linkedin')->first());
        View::share('github', settings::where('name','github')->first());
        View::share('custom_css', settings::where('name','custom_css')->first());
        View::share('address', settings::where('name','address')->first());
        View::share('footer_text', settings::where('name','footer_text')->first());
        View::share('map', settings::where('name','map')->first());
        View::share('wine_categories', wine_category::all());
        View::share('beer_categories', beer_category::all());
        View::share('spirit_categories', spirit_category::all());
        View::share('extra_categories', extra_category::all());
        View::share('seo',seo::where('page','home')->first());

    }


    public function home()
    {

        $offers = offer::where('status','1')->get();
        $banners = banner::where('status',1)->get();
        $services = service::where('status',1)->get();
        $beers = beer::where('featured',1)->get();
        $wines = wine::where('featured',1)->get();
        $spirits = spirit::where('featured',1)->get();
        $extras = extra::where('featured',1)->get();
        return view('user.home',compact('banners','offers','services','beers','wines','spirits','extras'));
    }

    public function contact(){
        return view('user.contact');
    }

    public function beers(){
        $beers = beer::where('status',1)->paginate(8);
        $categories = beer_category::all();
        $seo_optimization = seo::where('page','Beers')->first();
        return view('user.beers',compact('beers','categories','seo_optimization'));
    }

    public function beer(beer $beer){

        return view('user.beer',compact('beer'));
    }

    public function beer_category(beer_category $beer_category){

        $beers = $beer_category->beers();
        $categories = beer_category::all();
        $seo_optimization = seo::where('page','Beers')->first();
        return view('user.beer_category',compact('beers','categories','seo_optimization'));
    }

    public function wines(){
        $wines = wine::where('status',1)->paginate(16);
        $categories = wine_category::all();
        $seo_optimization = seo::where('page','Wines')->first();
        return view('user.wines',compact('wines','categories','seo_optimization'));
    }

    public function wine(wine $wine){

        return view('user.wine',compact('wine'));
    }

    public function wine_category(wine_category $wine_category){

        $wines = $wine_category->wines();
        $categories = wine_category::all();
        $seo_optimization = seo::where('page','Wines')->first();
        return view('user.wine_category',compact('wines','categories','seo_optimization'));
    }

    public function spirits(){
        $spirits = spirit::where('status',1)->paginate(8);
        $categories = spirit_category::all();
        $seo_optimization = seo::where('page','Spirits')->first();
        return view('user.spirits',compact('spirits','categories','seo_optimization'));
    }

    public function spirit(spirit $spirit){

        return view('user.spirit',compact('spirit'));
    }

    public function spirit_category(spirit_category $spirit_category){

        $spirits = $spirit_category->spirits();
        $categories = spirit_category::all();
        $seo_optimization = seo::where('page','Spirits')->first();
        return view('user.spirit_category',compact('spirits','categories','seo_optimization'));
    }

    public function extras(){
        $extras = extra::where('status',1)->paginate(16);
        $categories = extra_category::all();
        $seo_optimization = seo::where('page','Extras')->first();
        return view('user.extras',compact('extras','categories','seo_optimization'));
    }

    public function extra(extra $extra){

        return view('user.extra',compact('extra'));
    }

    public function extra_category(extra_category $extra_category){

        $extras = $extra_category->extras();
        $categories = extra_category::all();
        $seo_optimization = seo::where('page','Extras')->first();
        return view('user.extra_category',compact('extras','categories','seo_optimization'));
    }




    public function search(Request $request){
        $keywords = $request->keywords;
        $beers = beer::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->get();
        $spirits = spirit::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->get();
        $wines = wine::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->get();
        $extras = extra::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->get();
        return view('user.search',compact('beers','spirits','wines','extras','keywords'));
    }

    public function error_404(){
        return view('user.404');
    }

}
