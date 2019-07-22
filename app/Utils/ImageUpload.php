<?php
namespace App\Utils;

class ImageUpload{
    
    public function upload($request){
        $file =$request->input('image');
        $seg = explode(";",$file);
        if(sizeof($seg)!=2){
            return $this->resError(400,"wrong paramater" );
        }
        $segments = explode(",",$seg[1]);
        if(sizeof($segments)!=2){
            return $this->resError(400,"wrong paramter");
        }
        $data = $segments[1];
        $encoding = $segments[0];

        $header = explode(":",$seg[0]);
        if(sizeof($header)!=2){
            return $this->resError(400,"wrong paramter");
        }

        $mime = explode("/",$header[1]);
        if(sizeof($header)!=2){
            return $this->resError(400,"wrong paramter");
        }
        $extName =  strtolower($mime[1]);
        if(!in_array($extName,array("jpg","bmp","gif","png","jpeg"))) {
            return $this->resError(403,"bad extension name of the file");
        }
        try{
            $real_data = base64_decode($data);
        }catch(Exception $e){
            return $this->resError(402,"parse data failed");
        }
        $y= date("Ym");
        $subDirectory = date("Ymd/");
        $destDirectory = $this->getUploadDirectory() . $subDirectory;
        if (!file_exists($destDirectory)) {
            mkdir($destDirectory, 0777, true);
        }
        $extension = $extName;
        $mime = $header[1];
        $filename = $this->buildPasteFileName($extension);
        file_put_contents($destDirectory.$filename,$real_data);
        $clientSize = filesize($destDirectory.$filename);
        return  ['status'=>0,'imgurl'=>$subDirectory . $filename];
    }

    public function  fileUpload(){
        //图片文件的生成
        $savename = date('YmdHis',time()).mt_rand(0,9999).'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式
        //生成文件夹
        $imgdirs = public_path()."/uploads/".date('Y-m-d',time()).'/';
        $this->mkdirs($imgdirs);
        //获取图片文件的名字
        $fileName = $_FILES["file"]["name"];
        //图片保存的路径
        $saveFile = '/uploads/'.date('Y-m-d' ,time()).'/'.$savename;
        $savepath = public_path().$saveFile;
        //生成一个URL获取图片的地址
        $url = env('WEB_IMG_URL') . $saveFile;
        //返回数据。wangeditor3 需要用到的数据 json格式的
        $data["errno"] = 0;
        $data["data"] = $saveFile;
        $data['url'] = "{$url}";
        //可有可无的一段，也就是图片文件移动。
        move_uploaded_file($_FILES["file"]["tmp_name"],$savepath);
        //返回数据
        echo json_encode($data);
    }
    //创建文件夹 权限问题
    private function mkdirs($dir, $mode = 0777){
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!mkdir(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    }
    private function buildPasteFileName($extension){
        $fi = microtime(true).rand(0,99999);
        return $fi.'.'.$extension;
    }
    private function getUploadDirectory(){
        return public_path().'/uploads/thumb/';
    }
    private function resError($code ,$res){
        return json_encode(['code'=>$code,'msg'=>$res]);
    }
}
