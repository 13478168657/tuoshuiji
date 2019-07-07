<?php
namespace App\Utils;


class CurlUtil {

    public static function curlData($url,$type,$data = ''){
        $method = "POST";
        $ch = curl_init();//1.初始化
        curl_setopt($ch, CURLOPT_URL, $url); //2.请求地址
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);//3.请求方式
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        switch($method){
            case "POST":
                curl_setopt($ch,CURLOPT_POST,true);
                break;
            case "GET":
                curl_setopt($ch,CURLOPT_HTTPGET,true);
                break;
            case "DELETE":
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
                break;
            case "PUT":
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
                break;
        }
        if(!empty($data)){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        if(curl_errno($ch)){
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($content);
    }
}