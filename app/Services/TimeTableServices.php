<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeTableServices
{
    public function getTimeTable( $classe_id , $filier_id){

        $timeTable = DB::table('time_tables')
            ->join('module_filiers','module_filiers.id','time_tables.module_filier_id')
            ->join('module_profs','module_filiers.module_id','module_profs.module_id')
            ->join('modules','modules.id','module_filiers.module_id')
            ->join('users','users.id','module_profs.prof_id')
            ->join('classes','classes.id','module_filiers.classe_id')
            ->select(
                'time_tables.id as id',
                'modules.name as name',
                'users.name as prof',
                'time_tables.start_time as start_time',
                'time_tables.day as day',
                'time_tables.title as title',
                'time_tables.end_time as end_time',

            )->where('module_filiers.filier_id',$filier_id)
            ->where("classes.id",$classe_id)
            ->get();


        return $timeTable;

    }
}
