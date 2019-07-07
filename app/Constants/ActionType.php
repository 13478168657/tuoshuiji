<?php
namespace App\Constants;

class ActionType {

    public static function trans($type){
        switch ($type){
            case 1:
                return 'get';
            case 2:
                return 'post';
        }
    }
}