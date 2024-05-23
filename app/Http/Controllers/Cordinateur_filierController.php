<?php

namespace App\Http\Controllers;

use App\Exports\moduleExport;
use App\Models\classe;
use App\Models\Module;
use App\Models\Module_filier;
use App\Models\Module_prof;
use App\Models\TimeTable;
use App\Models\User;
use App\Services\ModuleServices;
use Barryvdh\DomPDF\Facade\Pdf;
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



    public  function index_TimeTable($classe_id = ''){

        $classes = classe::where('filier_id', Auth::user()->filier_id)->get();
        $modules =DB::table('modules')->join('module_filiers','module_filiers.module_id','modules.id')
            ->select('modules.id as id',
                              'modules.name as name'
            )->where('module_filiers.filier_id',Auth::user()->filier_id)
            ->where('module_filiers.classe_id',$classe_id)->get();






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
            ->where("classes.id",$classe_id)
            ->get();





        return View('cordinnateur_filier.TimeTable.index'
            ,[
                'name'=>'cordinnateur_filier',
                'timeTable'=>$timeTable,
                'isTimeInInterval' => [$this, 'isTimeInInterval'],
                "classes"=>$classes,
                'classe_id'=>$classe_id,
                'modules' =>$modules
             ]);
    }

    public  function download_TimeTable($classe_id = ''){

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
            ->where("classes.id",$classe_id)
            ->get();



    $data = [
        'timeTable'=>$timeTable,
        'isTimeInInterval' => [$this, 'isTimeInInterval']
    ];
    $pdf = Pdf::loadView('cordinnateur_filier.TimeTable.TimeTableView', $data);

    return $pdf->download('document.pdf');



    }

    public function edit_TimeTable( Request $request ,$classe){

        $request->validate([
            'module_id' =>'required',
            'type' =>'required',
            'start_at' =>'required',
            'end_at' =>'required',
            'day' => 'required',
        ]);



        $module_filier = Module_filier::where('module_id',$request->module_id)->where('classe_id',$classe)->get();


        $Extimetable = TimeTable::where('classe_id',$classe)->get();

        foreach ($Extimetable as $time){
            if(($time->start_time == $request->start_at  ||$time->end_time == $request->end_at) && $time->day == $request->day  && $time->module_filier_id != $module_filier[0]->id ){
                return redirect()->back()->with('error', 'session is taken.');
            }
        }

        $TimeTable = TimeTable::where('classe_id',$classe)->where('module_filier_id',$module_filier[0]->id)->get();


        if($TimeTable->count()  && $TimeTable[0]->title == $request->type ){
            $TimeTable[0]->update([
                'title' =>$request->type,
                'start_time' =>$request->start_at,
                'end_time' =>$request->end_at,
                 'day' => $request->day,
            ]);
        }
        else{
            $newtime= TimeTable::create([
                'title' =>$request->type,
                'start_time' =>$request->start_at,
                'end_time' =>$request->end_at,
                'day' => $request->day,
                'module_filier_id'=>$module_filier[0]->id,
                'filier_id'=>Auth::user()->filier_id,
                'classe_id'=>$classe,
            ]);


        }
        return redirect()->back();


    }
public function delete_TimeTable($timetable_id)
{
   $time = TimeTable::find($timetable_id);

   $time->delete();
    return redirect()->back();



}
}

