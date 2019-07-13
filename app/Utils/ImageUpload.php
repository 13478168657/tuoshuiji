<?php
namespace App\Utils;

class ImageUpload{
    
    public function upload($request){
        $file =$request->input('image');
        $seg = explode(";",$file);
        if(sizeof($seg)!=2){
            return resError(400,"wrong paramater" );
        }
        $segments = explode(",",$seg[1]);
        if(sizeof($segments)!=2){
            return resError(400,"wrong paramter");
        }
        $data = $segments[1];
        $encoding = $segments[0];

        $header = explode(":",$seg[0]);
        if(sizeof($header)!=2){
            return resError(400,"wrong paramter");
        }

        $mime = explode("/",$header[1]);
        if(sizeof($header)!=2){
            return resError(400,"wrong paramter");
        }
        $extName =  strtolower($mime[1]);
        if(!in_array($extName,array("jpg","bmp","gif","png","jpeg"))) {
            return resError(403,"bad extension name of the file");
        }
        try{
            $real_data = base64_decode($data);
        }catch(Exception $e){
            return resError(402,"parse data failed");
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
    
    private function buildPasteFileName($extension){
        $fi = microtime(true).rand(0,99999);
        return $fi.'.'.$extension;
    }
    private function getUploadDirectory(){
        return public_path().'/uploads/thumb/';
    }
}
