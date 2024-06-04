<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Filier;
use App\Models\Module;
use App\Models\Module_filier;
use App\Models\Module_prof;
use App\Models\User;
use App\Services\ModuleServices;
use App\Services\TimeInterval;
use App\Services\TimeTableServices;
use Barryvdh\DomPDF\Facade\Pdf;
use Couchbase\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Models\Departement;
<<<<<<< HEAD
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
>>>>>>> db5ec1b (Prof feature is improved)
=======


>>>>>>> 906b2f1 (starte cordinateur_filier)

class chef_departemeneController extends Controller
{


    public  $ModuleServices;
    public  function  __construct ( ModuleServices $ModuleServices )
    {
        $this->ModuleServices = $ModuleServices;
    }
    public function index_filier()
    {

        if (!empty(FacadesRequest::get('id')) && empty(FacadesRequest::get('name'))) {

            $Filiers = Filier::where('departement_id', Auth::user()->departement_id)
                ->where('id', FacadesRequest::get('id'))->get();
        } else if (!empty(FacadesRequest::get('name')) && empty(FacadesRequest::get('id'))) {

            $Filiers = Filier::where('departement_id', Auth::user()->departement_id)
                ->where('name', FacadesRequest::get('name'))->get();
        } else if (!empty(FacadesRequest::get('name')) && !empty(FacadesRequest::get('id'))) {

            $Filiers = Filier::where('departement_id', Auth::user()->departement_id)
                ->where('id', FacadesRequest::get('id'))
                ->where('name', FacadesRequest::get('name'))->get();
        } else {
            $Filiers = Filier::where('departement_id', Auth::user()->departement_id)->get();
        };


        foreach ($Filiers as $filier){
            $new[] = ['id' => $filier->id , 'name'=>$filier->name , 'cordinnateur'=>User::find($filier->cordinateur_id)->name , 'created_at'=>$filier->created_at];
        }


        return View('chef_departement.filiers.index')->with("name", 'chef_departement')->with('filiers', $new);
    }

    public function create_module($filier_id)
    {
        $error='';
       $classes = classe::where("filier_id",$filier_id)->get();

       $profs = User::whereIn('role_id', ["2","3","4"])->where('departement_id',Auth::user()->departement_id)->get();

        return View('chef_departement.modules.create')->with("name", 'chef_departement')->with('classes',$classes)->with('profs',$profs);
    }

    public  function  store_module( Request $request,$filier_id)
    {
        $error='';

        $modules= Module::where('name',$request->module_name)->where('departement_id',Auth::user()->departement_id)->get();



        foreach ($modules as $key => $module){


            $Module_filier = Module_filier::where('module_id',$module->id)->where('filier_id',$filier_id)->get();

            if(($Module_filier->count())>0){

                $error = "module est deja  present";
                return $this->create_module($filier_id)->with('error', $error);

            }
        }




        $module = Module::create([
            'name' => $request->module_name,
            'departement_id'=>Auth::user()->departement_id,
        ]);

        $module_filier = Module_filier::create([
            'module_id'=> $module->id,
            'filier_id'=>$filier_id,
            'classe_id'=> $request->classe_id
        ]);

        if($request->prof_id != '') {

            $module_prof = Module_prof::create([
                'module_id' => $module->id,
                'prof_id' => $request->prof_id,
            ]);
        }else{

            $module_prof = Module_prof::create([
                'module_id' => $module->id,
                'prof_id' => null,
            ]);

        }

        return redirect("chef_departement/filiers/modules/$filier_id");
    }

    public  function  delete_module($filier_id,$module_id,$prof_id = '')
    {

        if($prof_id!='') DB::table('module_profs')->where('module_id', $module_id)->where("prof_id",$prof_id)->delete();
        else DB::table('module_profs')->where('module_id', $module_id)->delete();



        DB::table('module_filiers')->where('module_id', $module_id)->where("filier_id",$filier_id)->delete();
        DB::table('modules')->where('id', $module_id)->delete();



        return redirect()->back();


    }
    public function show_modules($id)
    {
        $classes = classe::where('departement_id', Auth::user()->departement_id)->where('filier_id', $id)->get();


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
                'module_filiers.filier_id as filier_id'
            );

        $module_lists =  $this->ModuleServices->getmodules($module_lists,$id);



        return View('chef_departement.modules.index')->with("name", 'chef_departement')->with("module_lists", $module_lists)->with("classes", $classes)
                ->with('filier_id',$id);
    }

    public function profIndex()
    {

        $AuthenticateCurrentUser = auth::user()->departement_id;
        $departement_name = Departement::find($AuthenticateCurrentUser)->name;
        $profs = User::where('departement_id', $AuthenticateCurrentUser)->whereIn('role_id', ["2","3","4"])->get();
        $profDoesntHaveDepartement = User::whereNull('departement_id')
        ->where('role_id', 2)->get();
        return View('chef_departement.profs.index', ['profs'=>$profs , 'departementName'=>$departement_name, 'otherProfs'=>$profDoesntHaveDepartement])->with("name", 'chef_departement');
    }
    public function profDestroy($profId){
            $prof = User::find($profId);
            if($prof){
            $prof->departement_id = null;
            $prof->save();
            }
            return redirect()->route('chef_departemenet.profs.index');
    }
    public function profStore() {
        $data = request()->all();
        //$profId = $data[chosenId];
        $profId = request()->chosenId;
        $departement = auth::user()->departement_id;
        $prof = User::find($profId);
        $prof->departement_id = $departement;
        $prof->save();
        return redirect()->route('chef_departemenet.profs.index');
    }

    public  function Profile_Index($id){

        return View('chef_departement.Profile')->with('name','chef_departement');

    }



















    public  function index_TimeTable(){

        $classes = classe::where('departement_id', Auth::user()->departement_id)->get();
        $filiers = Filier::where('departement_id', Auth::user()->departement_id)->get();

        $classe_id =  '';
        $filier_id = '';
        if( !empty( FacadesRequest::get('classe')) &&  !empty( FacadesRequest::get('filier'))) {

            $classe_id = FacadesRequest::get('classe');
            $filier_id =  FacadesRequest::get('filier');

        }



        $TimeTableSrvices =  new TimeTableServices();

        $timeTable = $TimeTableSrvices->getTimeTable($classe_id,$filier_id);
        $isTimeInInterval = new TimeInterval();

        return View('chef_departement.TimeTable.index'
            ,[
                'name'=>'chef_departement',
                'timeTable'=>$timeTable,
                'isTimeInInterval' => $isTimeInInterval,
                "classes"=>$classes,
                'classe_id'=>$classe_id,
                'filier_id'=>$filier_id,
                "filiers" => $filiers
            ]);
    }

    public  function download_TimeTable($classe_id ='', $filier_id='' ){


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


        $isTimeInInterval = new TimeInterval();

        $data = [
            'timeTable'=>$timeTable,
            'isTimeInInterval' =>   $isTimeInInterval
        ];
        $pdf = Pdf::loadView('cordinnateur_filier.TimeTable.TimeTableView', $data);

        return $pdf->download('TimeTable.pdf');



    }








}
