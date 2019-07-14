<?php

namespace App\Http\Controllers\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProjectModel;
// use App\Utils\VerifyImage;
class HomeController extends Controller
{
    public function __construct(){
        $this->template = ProjectModel::first()->type;
    }

    public function index(Request $request){
        if($this->template){
//            dd(3);
            return view('admin.en.home.index');
        }else{
            return view('admin.home.index');
        }
    }
}