<?php

namespace App\Http\Controllers;

use App\Services\TimeInterval;
use App\Services\TimeTableServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentController extends Controller
{
    //



    public  function index_TimeTable(){


            $classe_id = Auth::user()->classe_id;
            $filier_id = Auth::user()->filier_id;

        $TimeTableSrvices =  new TimeTableServices();
        $timeTable = $TimeTableSrvices->getTimeTable($classe_id,$filier_id);
        $isTimeInInterval = new TimeInterval();

        return  View('student.TimeTable.index')
            ->with('name','student')
            ->with('isTimeInInterval',$isTimeInInterval)
            ->with('timeTable',$timeTable)
            ->with("classe_id" , $classe_id)
            ->with('filier_id',$filier_id);

    }

    public function modules_index()
    {

        $classe_id = Auth::user()->classe_id;
        $filier_id = Auth::user()->filier_id;

        $module_lists = DB::table('modules')
            ->join("module_filiers",'module_filiers.module_id',"modules.id")
            ->join('module_profs','module_profs.module_id','modules.id')
            ->join('users',"users.id",'module_profs.prof_id')
            ->select(
                'modules.id as id',
                'modules.name as name',
                'users.name as prof',
            ) ->where('module_filiers.classe_id',$classe_id)->get();
        return View('student.modules.index')
            ->with('name',"student")
            ->with('module_lists',$module_lists);

    }

    public function scores_index(){


        $scores = DB::table('modules')
            ->join('score_validates','score_validates.module_id','modules.id')
            ->where('score_validates.student_id',Auth::user()->id)->where('score_validates.status',2)
            ->select(
                'modules.id as id',
                'modules.name as name',
                'score_validates.score_ds as score_ds',
                'score_validates.score_final as score_final'
            )->get();

        return View('student.scores.index')->with('name','student')
            ->with('scores',$scores);
    }
}
