<?php

namespace App\Http\Controllers;

use App\Exports\moduleExport;
use App\Models\classe;
use App\Models\Departement;
use App\Models\Filier;
use App\Models\Module_filier;
use App\Models\Module_prof;
use App\Models\Score_validate;
use App\Models\TimeTable;
use App\Models\User;
use App\Services\ModuleServices;
use App\Services\ScoresServices;
use App\Services\TimeInterval;
use App\Services\TimeTableServices;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;


class Cordinateur_filierController extends Controller
{
    //



    public $message = '';
    public  $ModuleServices;
    public  function  __construct ( ModuleServices $ModuleServices )
    {
        $this->ModuleServices = $ModuleServices;
    }


    public function index_module (){


        $classes = classe::where('departement_id', Auth::user()->departement_id)->where('filier_id',Auth::user()->filier_id )->get();
        $profs = User::whereIn('role_id', ["2","3","4"])->where('departement_id',Auth::user()->departement_id)->get();

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



             $TimeTableSrvices =  new TimeTableServices();

             $timeTable = $TimeTableSrvices->getTimeTable($classe_id,Auth::user()->filier_id);
              $isTimeInInterval = new TimeInterval();

        return View('cordinnateur_filier.TimeTable.index'
            ,[
                'name'=>'cordinnateur_filier',
                'timeTable'=>$timeTable,
                'isTimeInInterval' => $isTimeInInterval,
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


        $isTimeInInterval = new TimeInterval();

    $data = [
        'timeTable'=>$timeTable,
        'isTimeInInterval' =>   $isTimeInInterval
    ];
    $pdf = Pdf::loadView('cordinnateur_filier.TimeTable.TimeTableView', $data);

    return $pdf->download('TimeTable.pdf');



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


public function filier_scores_index()
{

    $classes = classe::where('filier_id',Auth::user()->filier_id)->get();
    return View('cordinnateur_filier.filier_scores.index')
        ->with('classes',$classes)
        ->with('name','cordinnateur_filier');

}
public function filier_scores_modules($classe_id)
{




    $module_lists = DB::table('modules')
        ->join('module_filiers', "modules.id", '=', 'module_filiers.module_id')
        ->where('module_filiers.classe_id',$classe_id)
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
        )->get();


    foreach ($module_lists as $module){

       $stuatus = Score_validate::where('module_id',$module->id)->first();

       if(empty($stuatus)){
           $module->status = 0;

       }else
       $module->status = $stuatus->status;

    }



    if($module_lists->count() == 0) $this->message = 'no match found';





    return View('cordinnateur_filier.filier_scores.validate_module')->with('name','cordinnateur_filier')
        ->with("module_lists", $module_lists)

        ->with('filier_id',Auth::user()->filier_id)
        ->with('message', $this->message);
}

   public function filier_scores($module_id)
   {
       $scores_table = DB::table('score_validates')->where('score_validates.module_id' , $module_id)
           ->select('score_validates.student_id','score_validates.score_ds','score_validates.score_final','score_validates.status as status');

       $students = DB::table('modules')->where('modules.id',$module_id)
           ->join('module_filiers', 'module_filiers.module_id', 'modules.id')
           ->join('users', 'users.filier_id', 'module_filiers.filier_id')
           ->leftJoinSub( $scores_table, 'score_validates', function ($join) {
               $join->on('score_validates.student_id', '=', 'users.id');
           })
           ->select(
               'users.id as id',
               'users.name as name',
               'users.avatar as avatar',
               'score_validates.score_ds as score_ds',
               'score_validates.score_final as score_final',
               'score_validates.status as status'

           )->where('users.role_id', '1')
           ->get();

       return View('cordinnateur_filier.filier_scores.scores')->with('name','cordinnateur_filier')
           ->with("students", $students)
           ->with('module_id',$module_id);


   }

   public function filier_scores_send($module_id, Request $request){

       $scores = $request->all();

       $scores = array_slice($scores, 1, -1, true);
       $ScoresServicese = new ScoresServices();
       $ScoresServicese->send($scores,$module_id);

       return back();


   }

}

