<?php
/**
 * Created by PhpStorm.
 * User: jishuai
 * Date: 2020-04-07
 * Time: 22:13
 */

namespace App\Models;


class Experience extends Model
{
    const STATUS_ON = 1;
    const STATUS_OFF = 2;

    protected $table = "experience";

//    protected $hidden = [
//        'id','created_at','updated_at','sort','status'
//    ];

    public function getEndAtAttribute($value){
        if (empty($value)) {
            return "Present";
        }
        return $value;
    }

    public function getImageAttribute($value){
        return json_decode($value,true);
    }

    public function setImageAttribute($value){
        if (is_array($value)) {
            $this->attributes['image'] = json_encode($value);
        }
    }
}