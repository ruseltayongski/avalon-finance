<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function services($category) {
        return services::where("category","like","%".$category."%")->get();
    }
}
