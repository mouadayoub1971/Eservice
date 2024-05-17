<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Module_prof;
use App\Models\User;
use App\Services\ModuleServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
