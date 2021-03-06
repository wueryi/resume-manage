<?php
/**
 * Created by PhpStorm.
 * User: jishuai
 * Date: 2020-04-07
 * Time: 22:14
 */

namespace App\Http\Controllers;


use App\Models\Evaluate;
use App\Models\Experience;
use App\Models\Info;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    const SECOND = 3600*24;
    public function getSkill()
    {
        $Skill = Cache::remember("skill",self::SECOND,function (){
            return Skill::query()
                ->where('status', Skill::STATUS_ON)
                ->orderBy("sort", "ASC")->orderBy("created_at", "DESC")
                ->select(["brief", "content", "keyword"])
                ->get();
        });
        return $this->respondWithSuccess($Skill);
    }

    public function getWork()
    {
        $Work = Cache::remember("work",self::SECOND,function (){
            return $Work = Work::query()
                ->where('status', Work::STATUS_ON)
                ->orderBy("sort", "ASC")->orderBy("created_at", "DESC")
                ->select(["company", "position", "responsibility", "begin_at", "end_at"])
                ->get();
        });
        return $this->respondWithSuccess($Work);
    }

    public function getExperience()
    {
        $Experience = Cache::remember("experience", self::SECOND, function (){
            return Experience::query()
                ->where('status', Experience::STATUS_ON)
                ->orderBy("sort", "ASC")->orderBy("created_at", "DESC")
                ->select(["name", "brief", "skill", "responsibility", "difficulty", "achievement", "begin_at", "end_at", "image"])
                ->get();
        });
        return $this->respondWithSuccess($Experience);
    }

    public function getEvaluate()
    {

        $Evaluate = Cache::remember("evaluate", self::SECOND, function (){
            return Evaluate::query()
                ->where('status', Evaluate::STATUS_ON)
                ->orderBy("sort", "ASC")->orderBy("created_at", "DESC")
                ->select(["content"])
                ->get();
        });
        return $this->respondWithSuccess($Evaluate);
    }

    public function getInfo(){
        $data = Cache::remember("info", self::SECOND, function (){
            $Info = Info::query()
                ->where('status', Evaluate::STATUS_ON)
                ->orderBy("sort", "ASC")->orderBy("created_at", "DESC")->select(["name", "key", "value"])->get()->toArray();
            $data = [];
            foreach($Info as $key => $value){
                $data[$value['key']] = $value;
            }
            return $data;
        });

        return $this->respondWithSuccess($data);
    }
}