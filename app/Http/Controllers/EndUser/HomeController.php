<?php

namespace App\Http\Controllers\EndUser;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return view('index', compact('sliders'));
    }
}
