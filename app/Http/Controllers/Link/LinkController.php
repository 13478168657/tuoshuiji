<?php

namespace App\Http\Controllers\Link;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
class LinkController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){
        $link = new Link();

        return view('links.index',['links'=>$links,'request'=>$request]);
    }
    public function delete(Request $request){

    }
}
