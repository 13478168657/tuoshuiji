<?php

namespace App\Http\Controllers\Ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
class AdController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request){
        $advertisement = new Advertisement();
        if($request->input('name')){
            $advertisement = $advertisement->where('name','like','%'.$request->input('name').'%');
        }
        $advertisement = $advertisement->paginate(15);
        return view('ad.index',['advertisement'=>$advertisement,'request'=>$request]);
    }

    public function create(Request $request){
        return view('ad.create');
    }

    public function postCreate(Request $request){
        $link  = new Link();
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        if($link->save()){
            return redirect('/ad/list');
        }
    }

    public function edit(Request $request){
        $advertisement = Advertisement::where('id',$request->input('id'))->first();
        return view('ad.edit',['advertisement'=>$advertisement]);
    }

    public function postEdit(Request $request){
        $advertisement = Advertisement::where('id',$request->input('id'))->first();
        $advertisement->name = $request->input('name');
        $advertisement->url = $request->input('url');
        if($advertisement->save()){
            return redirect('/ad/list');
        }
    }

    public function delete(Request $request){

    }
}
