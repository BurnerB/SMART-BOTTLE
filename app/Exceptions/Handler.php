<?php

namespace App\Exceptions;

use App\Http\Controllers\user\HomeController;
use App\settings;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\View;
use Throwable;


class Handler extends ExceptionHandler
{

//    public function __construct()
//    {
//        View::share('logo_light', settings::where('name','logo_light')->first());
//        View::share('logo_dark', settings::where('name','logo_dark')->first());
//        View::share('favicon', settings::where('name','favicon')->first());
//        View::share('email', settings::where('name','email')->first());
//        View::share('mobile', settings::where('name','mobile')->first());
//        View::share('whatsapp', settings::where('name','whatsapp')->first());
//        View::share('facebook', settings::where('name','facebook')->first());
//        View::share('linkedin', settings::where('name','linkedin')->first());
//        View::share('github', settings::where('name','github')->first());
//        View::share('custom_css', settings::where('name','custom_css')->first());
//        View::share('address', settings::where('name','address')->first());
//        View::share('footer_text', settings::where('name','footer_text')->first());
//    }

    protected $dontReport = [
        //
    ];


    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    public function report(Throwable $exception)
    {
        parent::report($exception);
    }


    public function render($request, Throwable $exception)
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

        if($this->isHttpException($exception)){
            $code = $exception->getStatusCode();
            if($code == '404' ){

                return response()->view('user.404');

            }
        }

        return parent::render($request, $exception);
    }


}
