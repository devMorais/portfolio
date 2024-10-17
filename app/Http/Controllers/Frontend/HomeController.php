<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Service;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $header = Header::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        return view('frontend.home', compact('header', 'typerTitles', 'services'));
    }
}
