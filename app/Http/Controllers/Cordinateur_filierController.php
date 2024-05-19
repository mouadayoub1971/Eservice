<?php

namespace App\Http\Controllers;

use App\Exports\moduleExport;
use App\Models\classe;
use App\Models\Module_prof;
use App\Models\User;
use App\Services\ModuleServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class Cordinateur_filierController extends Controller
{
    //

    public function isTimeInInterval($startTime, $endTime, $checkTime)
    {
        // Parse the times using Carbon
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        $timeToCheck = Carbon::parse($checkTime);

        // Check if the time to check is within the interval
        if ($start->greaterThan($end)) {
            // Interval spans midnight
            return $timeToCheck->between($start, Carbon::parse('23:59:59')) ||
                $timeToCheck->between(Carbon::parse('00:00:00'), $end);
        }

        return $timeToCheck->between($start, $end);
    }

    public $message = '';
    public  $ModuleServices;
    public  function  __construct ( ModuleServices $ModuleServices )
    {
        $this->ModuleServices = $ModuleServices;
    }


    public function index_module (){


        $classes = classe::where('departement_id', Auth::user()->departement_id)->where('filier_id',Auth::user()->filier_id )->get();
        $profs = User::where('role_id', "2")->where('departement_id',Auth::user()->departement_id)->get();

        $module_lists = DB::table('modules')
            ->join('module_filiers', "modules.id", '=', 'module_filiers.module_id')
            ->join('module_profs', "modules.id", '=', "module_profs.module_id")
            ->leftJoin('users', "module_profs.prof_id", '=', 'users.id')
            ->join('classes', 'module_filiers.classe_id', '=', 'classes.id')
            ->select(
                'modules.id as id',
                'modules.name as module',
                'users.name as prof',
                'classes.name  as classe',
                'modules.created_at as created_at',
                'users.id as prof_id',
                'module_filiers.filier_id as filier_id',
                'module_profs.id as module_prof_id'
            );


        $module_lists=$this->ModuleServices->getmodules($module_lists ,Auth::user()->filier_id);

        if($module_lists->count() == 0) $this->message = 'no match found';

    /*    $module_lists = $module_lists->where('module_filiers.filier_id', Auth::user()->filier_id)->get();*/



        return View('cordinnateur_filier.modules.index')->with('name','cordinnateur_filier')
            ->with("module_lists", $module_lists)
            ->with("classes", $classes)
            ->with('filier_id',Auth::user()->filier_id)
            ->with('profs',$profs)->with('message', $this->message);
    }

    public  function  save_module(Request $request)
    {
        $data  = $request->all();



        foreach ($data as $module_prof_id => $prof_id){

            if( is_numeric($module_prof_id) && $prof_id != "default" ){

                $module_prof = Module_prof::find($module_prof_id);
                $module_prof->prof_id = $prof_id;
                $module_prof->save();

            }


        }
   return redirect()->back();

    }


    public function  download_module()
    {

        return Excel::download(new moduleExport(), 'Modules.xlsx');
    }



    public  function index_TimeTable($classe = ''){

        $classes = classe::where('filier_id', Auth::user()->filier_id)->get();

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

            )->where('module_filiers.filier_id',Auth::user()->filier_id)
            ->where("classes.id",$classe)
            ->get();





        return View('cordinnateur_filier.TimeTable.index')->with('name','cordinnateur_filier')
            ->with('timeTable',$timeTable)
            ->with('isTimeInInterval' , [$this, 'isTimeInInterval'])->with("classes",$classes);
    }
}
