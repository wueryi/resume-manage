<?php
/**
 * Created by PhpStorm.
 * User: jishuai
 * Date: 2020-04-07
 * Time: 22:13
 */

namespace App\Models;


class Info extends Model
{
    const STATUS_ON = 1;
    const STATUS_OFF = 2;

    protected $table = "info";

//    protected $hidden = [
//        'id','created_at','updated_at','sort','status'
//    ];
}