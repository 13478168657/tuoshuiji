<?php

namespace App\Http\Controllers\Instruction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instruction;
use App\Models\Category;
use App\Models\BaseConfig;
class InstructionController extends Controller
{
    public function index(Request $request){
        $instruction = Instruction::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        $baseConfig = BaseConfig::first();
        return view('instruction.index',['instruction'=>$instruction,'categories'=>$categories,'baseConfig'=>$baseConfig]);
    }
}
