<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend2.index');
    }

    public function contact_us()
    {
        return view('frontend2.contact');
    }
}
