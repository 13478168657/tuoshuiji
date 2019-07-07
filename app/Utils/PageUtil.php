<?php
namespace App\Utils;

class PageUtil{

    public static function getPage($currentPage,$totalNum,$pageSize,$id,$type){
        $html = '';
        $totalPage = ceil($totalNum/$pageSize);//总页数
        if($totalPage <=1){
            return $html = "<span class='pagination-curr'>首页</span>";
        }
        $html .= "<a href='/index{$id}{$type}1.html'>首页</a>";
        if($totalPage > 8){
            $length = 8;
        }else{
            $length = $totalPage;
        }
        if($totalPage <= 8){
            for($i = 1;$i<=$totalPage;$i++){
                if($i == $currentPage){
                    $html .= "<span class='pagination-curr'>{$i}</span>";
                }else{
                    $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                }
            }
        }elseif($totalPage > 8){
            if($currentPage <= 4){
                for($i=1;$i < $currentPage;$i++){
                    $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                }
                $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                for($i = $totalPage-$currentPage;$i<=$totalPage;$i++){
                    $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                }
            }else{
                if(($totalPage - $currentPage) >=4){
                    for($i=$currentPage-3;$i < $currentPage;$i++){
                         $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                    }
                    $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                    for($i = $totalPage-3;$i<=$totalPage;$i++){
                        $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                    }
                }else{
                    for($i=$currentPage-(8-($totalPage-$currentPage-1));$i < $currentPage;$i++){
                         $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                    }
                    $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                    for($i = $totalPage-$currentPage-1;$i<=$totalPage;$i++){
                        $html .= "<a href='/index{$id}{$type}{$i}.html'>{$i}</a>";
                    }
                }
            }
        }
        $html .= "<a href='/index{$id}{$type}{$totalPage}.html' class='pagination-last' title='尾页'>尾页</a>";
        $nextPage = $currentPage+1;
        if($currentPage+1 < $totalPage){
            $html .= "<a href='/index{$id}{$type}{$nextPage}.html' class='pagination-next'>下一页</a>";
        }
        return $html;
        // <span class="pagination-curr">1</span>
        //         <a href="">2</a>
        //         <a href="">3</a>
        //         <a href="">4</a>
        //         <a href="">5</a>
        //         <span>…</span>
        //         <a href="" class="pagination-last" title="尾页">249</a>
    }

    public static function getSearchPage($currentPage,$totalNum,$pageSize,$wd){
        $html = '';
        $totalPage = ceil($totalNum/$pageSize);//总页数
        if($totalPage <=1){
            return $html = "";
        }
        $html .= "<a href='/search.html?wd=".$wd."'>首页</a>";
        if($totalPage > 8){
            $length = 8;
        }else{
            $length = $totalPage;
        }
        if($totalPage <= 8){
            for($i = 1;$i<=$totalPage;$i++){
                if($i == $currentPage){
                    $html .= "<span class='pagination-curr'>{$i}</span>";
                }else{
                    $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                }
            }
        }elseif($totalPage > 8){
            if($currentPage <= 4){
                for($i=1;$i < $currentPage;$i++){
                    $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                }
                $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                for($i = $totalPage-$currentPage;$i<=$totalPage;$i++){
                    $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                }
            }else{
                if(($totalPage - $currentPage) >=4){
                    for($i=$currentPage-3;$i < $currentPage;$i++){
                        $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                    }
                    $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                    for($i = $totalPage-3;$i<=$totalPage;$i++){
                        $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                    }
                }else{
                    for($i=$currentPage-(8-($totalPage-$currentPage-1));$i < $currentPage;$i++){
                        $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                    }
                    $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                    for($i = $totalPage-$currentPage-1;$i<=$totalPage;$i++){
                        $html .= "<a href='/search.html?wd=".$wd."&page=".$i."'>{$i}</a>";
                    }
                }
            }
        }
        $html .= "<a class='pagination-last' href='/search.html?wd=".$wd."&page=".$totalPage."'>尾页</a>";
        $nextPage = $currentPage+1;
        if($currentPage+1 < $totalPage){
            $html .= "<a class='pagination-next' href='/search.html?wd=".$wd."&page=".$nextPage."'>下一页</a>";
        }
        return $html;
        // <span class="pagination-curr">1</span>
        //         <a href="">2</a>
        //         <a href="">3</a>
        //         <a href="">4</a>
        //         <a href="">5</a>
        //         <span>…</span>
        //         <a href="" class="pagination-last" title="尾页">249</a>
    }
    public static function gethPage($currentPage,$totalNum,$pageSize,$id,$type){
        $html = '';
        $totalPage = ceil($totalNum/$pageSize);//总页数
        if($totalPage <=1){
            return $html = "<span class='pagination-curr'>首页</span>";
        }
        $html .= "<a href='/index{$id}{$type}1.html'>首页</a>";
        if($currentPage >= 2){
            $prePage = $currentPage-1;
            $html .= "<a href='/index{$id}{$type}{$prePage}.html'>上一页</a>";
        }
        $nextPage = $currentPage+1;
        if($currentPage+1 <= $totalPage){
            $html .= "<a href='/index{$id}{$type}{$nextPage}.html' class='pagination-next'>下一页</a>";
        }
        $html .= "<a href='/index{$id}{$type}{$totalPage}.html' class='pagination-last' title='尾页'>尾页</a>";

        return $html;
        // <span class="pagination-curr">1</span>
        //         <a href="">2</a>
        //         <a href="">3</a>
        //         <a href="">4</a>
        //         <a href="">5</a>
        //         <span>…</span>
        //         <a href="" class="pagination-last" title="尾页">249</a>
    }
}