<?php
namespace App\Constants;

class UserStatus {

    public static function trans($status){
        switch ($status){
            case 1:
                return '不通过';
            case 2:
                return '待审核';
            case 3:
                return '通过';
            default:
                return '';
        }
    }
}