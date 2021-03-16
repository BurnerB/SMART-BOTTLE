<?php

namespace App\Http\Controllers;
use App\Model\user\beer;
use App\Model\user\extra;
use App\Model\user\post;
use App\Model\admin\service;
use App\Model\user\spirit;
use App\Model\user\wine;
use App\offer;


use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index() {
        $beers = beer::all()->first();
        $spirits = spirit::all()->first();
        $extras = extra::all()->first();
        $wines = wine::all()->first();

        return response()->view('sitemap.index', [
            'wine' => $wines,
            'spirit' => $spirits,
            'beer' => $beers,
            'extra' => $extras
        ])->header('Content-Type', 'text/xml');
    }

    public function beers() {
        $beer = beer::latest()->get();
        return response()->view('sitemap.beer', [
            'beer' => $beer,
        ])->header('Content-Type', 'text/xml');
    }

    public function spirits() {
        $spirit = spirit::latest()->get();
        return response()->view('sitemap.spirit', [
            'spirit' => $spirit,
        ])->header('Content-Type', 'text/xml');
    }

    public function wines() {
        $wine = wine::latest()->get();
        return response()->view('sitemap.wine', [
            'wine' => $wine,
        ])->header('Content-Type', 'text/xml');
    }

    public function extras() {
        $extra = extra::latest()->get();
        return response()->view('sitemap.extra', [
            'extra' => $extra,
        ])->header('Content-Type', 'text/xml');
    }

}
