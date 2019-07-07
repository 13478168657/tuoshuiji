<?php

namespace App\Http\Controllers\Admin\Ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdSpace;
use App\Utils\ImageUpload;
class AdController extends Controller
{
    public function __construct(){
        
    }
    /*
     *广告列表
     */
    public function index(Request $request){
        $advertisement = new Advertisement();
        if($request->input('name')){
            $advertisement = $advertisement->where('name','like','%'.$request->input('name').'%');
        }
        $advertisements = $advertisement->paginate(15);
        return view('admin.ads.index',['advertisements'=>$advertisements,'request'=>$request]);
    }

    public function create(Request $request){
        $adSpaces = AdSpace::select('id','name')->get();
        return view('admin.ads.create',['adSpaces'=>$adSpaces]);
    }

    public function postCreate(Request $request){
        $advertisement  = new Advertisement();
        $advertisement->url = $request->input('url');
        $advertisement->start = $request->input('start');
        $advertisement->end = $request->input('end');
        $advertisement->desc = $request->input('desc');
        $advertisement->status = $request->input('status');
        $advertisement->position_id = $request->input('position_id');
        if($request->input('image')){
            $picResult = $this->upload($request);
            $advertisement->photo =  $picResult['imgurl'];
        }
        if($advertisement->save()){
            return redirect('/ad/list');
        }
    }

    public function edit(Request $request){
        $advertisement = Advertisement::where('id',$request->input('id'))->first();
        $adSpaces = AdSpace::select('id','name')->get();
        return view('admin.ads.edit',['advertisement'=>$advertisement,'adSpaces'=>$adSpaces]);
    }

    public function postEdit(Request $request){
        $advertisement = Advertisement::where('id',$request->input('id'))->first();
        $advertisement->url = $request->input('url');
        $advertisement->start = $request->input('start');
        $advertisement->end = $request->input('end');
        $advertisement->comment = $request->input('desc');
        $advertisement->status = $request->input('status');
        if($request->input('image')){
            $picResult = $this->upload($request);
            $advertisement->photo =  $picResult['imgurl'];
        }
        if($advertisement->save()){
            return redirect('/ad/list');
        }
    }
    
    public function delete(Request $request){
        $id = $request->input('id');
        $result = Advertisement::where('id',$id)->delete();
        if($result){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }

    /*
     *标题图上传
     */
    public function upload(Request $request)
    {
        $imageUpload = new ImageUpload();
        $result = $imageUpload->upload($request);
        return $result;
    }
}
