<?php

namespace App\Http\Controllers\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Utils\VerifyImage;
class HomeController extends Controller
{

    public function index(Request $request){
//        dd(3);
    	// $verify = new VerifyImage();
    	// return $verify->createImage();
        return view('admin.home.index');
    }
}
