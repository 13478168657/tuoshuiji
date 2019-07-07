<?php
namespace App\Utils;

class ClassifyUtil{
    protected static $tree;
    public static function getTree($arr,$pid,$step){
        foreach($arr as $key=>$val) {
            if($val->pid == $pid) {
                $flg = str_repeat('|_',$step);
                $val->name = $flg.$val->name;
                self::$tree[] = $val;
                self::getTree($arr , $val->id ,$step+1);
            }
        }
        return self::$tree;
    }
}