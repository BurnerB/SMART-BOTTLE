<?php

namespace App\Http\Controllers\admin;

use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Model\user\beer;
use App\Model\user\post;
use App\Model\user\spirit;
use App\Model\user\wine;
use App\User;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $beers = beer::all();
        $wines = wine::all();
        $spirits = spirit::all();
        $users = User::all();
        $mails = Enquiry::all();
        return view('admin.home',compact('wines','beers','users','mails','spirits'));
    }

    public function unauthorised()
    {
        return view('admin.unauthorised');
    }

}
