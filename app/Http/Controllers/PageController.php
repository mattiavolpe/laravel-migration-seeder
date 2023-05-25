<?php

namespace App\Http\Controllers;
use App\Models\Train;

class PageController extends Controller
{
    public function index() {
        $trains = Train::where('id', '>=', 1)->orderBy('departure_time', 'desc')->get();
        return view("home", compact("trains"));
    }
}
