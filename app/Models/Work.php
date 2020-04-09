<?php
/**
 * Created by PhpStorm.
 * User: jishuai
 * Date: 2020-04-07
 * Time: 22:13
 */

namespace App\Models;


class Work extends Model
{
    const STATUS_ON = 1;
    const STATUS_OFF = 2;

    protected $table = "work";

//    protected $hidden = [
//        'id','created_at','updated_at','sort','status'
//    ];

    public function getEndAtAttribute($value){
        if (empty($value)) {
            return "Present";
        }
        return $value;
    }
}