<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function list_products()
    {
        $data['results'] = categories::Has('activeProducts')->where('status',1)->get();

        return view('front.list_all',$data);
    }
}
