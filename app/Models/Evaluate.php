<?php
/**
 * Created by PhpStorm.
 * User: jishuai
 * Date: 2020-04-07
 * Time: 22:13
 */

namespace App\Models;


class Evaluate extends Model
{
    const STATUS_ON = 1;
    const STATUS_OFF = 2;

    protected $table = "evaluate";

//    protected $hidden = [
//        'id','created_at','updated_at','sort','status'
//    ];
}