<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{

    public function index(Request $request){
        $base_id = $request->input('base_id');
        $categories = Category::where('base_id',$base_id)->get();
        return view('admin.category.index',['categories'=>$categories,'base_id'=>$base_id]);
    }

    /*
     *添加分类
     *
     */
    public function create(Request $request){
        $base_id = $request->input('base_id');
        return view('admin.category.create',['base_id'=>$base_id]);
    }
    /*
     * 生成分类
     */
    public function postCreate(Request $request){
        $base_id = $request->input('base_id');
        $category = new Category();
        $category->base_id = $base_id;
        $category->number = intval($request->input('number'));
        $category->name = $request->input('name');
        $category->english_name = $request->input('english_name');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keyword = $request->input('meta_keyword');
        if($category->save()){
            $category->category_num = $this->generateNumber($base_id,$category->id);
            $category->save();
            return redirect('category/list?base_id='.$base_id);
        }
    }
    /*
     * 修改分类
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',['category'=>$category]);
    }

    /*
     * 生成分类
     */
    public function postEdit(Request $request){
        $id = $request->input('id');
        $category = Category::where('id',$id)->first();
        $category->number = intval($request->input('number'));
        $category->name = $request->input('name');
        $category->english_name = $request->input('english_name');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keyword = $request->input('meta_keyword');
        if($category->save()){
            $category->category_num = $this->generateNumber($category->base_id,$category->id);
            $category->save();
            return redirect('category/list?base_id='.$category->base_id);
        }
    }
    public function del(Request $request){
        $id = $request->input('id');
        $result = Category::where('id',$id)->delete();
        if($result){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }
    /*
     * 生成numberid
     */
    private function generateNumber($base_id,$id){
        $size =6;
        $len = strlen($base_id.$id);
        if($len < 6){
            $str  = $base_id.str_repeat('0',$size-$len).$id;
        }else{
            $str = $base_id.$id;
        }
        return $str;
    }
}
