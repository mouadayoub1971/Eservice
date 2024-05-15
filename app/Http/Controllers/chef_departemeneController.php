<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\classe;
use App\Models\Filier;
use App\Models\Module;
use App\Models\Module_filier;
use App\Models\Module_prof;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use function Laravel\Prompts\error;
=======
use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
>>>>>>> db5ec1b (Prof feature is improved)

class chef_departemeneController extends Controller
{
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



        return View('chef_departement.filiers.index')->with("name", 'chef_departement')->with('filiers', $Filiers);
    }

    public function create_module($filier_id)
    {
        $error='';
       $classes = classe::where("filier_id",$filier_id)->get();

       $profs = User::where('role_id','2')->where('departement_id',Auth::user()->departement_id)->get();

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
        }

        return redirect("chef_departement/filiers/modules/$filier_id");
    }

    public  function  delete_module($filier_id,$module_id,$prof_id)
    {


        DB::table('module_profs')->where('module_id', $module_id)->where("prof_id",$prof_id)->delete();

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
            ->join('users', "module_profs.prof_id", '=', 'users.id')
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


        if(!empty(FacadesRequest::get('id'))){

            $module_lists = $module_lists->where('module_filiers.filier_id', $id)
                ->where('modules.id', FacadesRequest::get('id'))
                ->get();

            return View('chef_departement.modules.index')->with("name", 'chef_departement')
                ->with("module_lists", $module_lists)->with("classes", $classes);

        }



        if (!empty(FacadesRequest::get('classe')) && empty(FacadesRequest::get('name'))) {
            $module_lists = $module_lists ->where('module_filiers.filier_id', $id)
                ->where('classes.name', FacadesRequest::get('classe'))
                ->get();
        }
        else if (!empty(FacadesRequest::get('name')) && empty(FacadesRequest::get('classe'))) {
            $module_lists = $module_lists ->where('module_filiers.filier_id', $id)
                ->where('modules.name', FacadesRequest::get('name'))
                ->get();



        }
        else if (!empty(FacadesRequest::get('name')) && !empty(FacadesRequest::get('classe'))) {
            $module_lists = $module_lists ->where('module_filiers.filier_id', $id)
                ->where('modules.name', FacadesRequest::get('name'))
                ->where('classe.name', FacadesRequest::get('classe'))
                ->get();
        }
        else {
            $module_lists = $module_lists->where('module_filiers.filier_id', $id)->get();
        };





        return View('chef_departement.modules.index')->with("name", 'chef_departement')->with("module_lists", $module_lists)->with("classes", $classes)
                ->with('filier_id',$id);
    }

    public function profIndex()
    {

        $AuthenticateCurrentUser = auth::user()->departement_id;
        $departement_name = Departement::find($AuthenticateCurrentUser)->name;
        $profs = User::where('departement_id', $AuthenticateCurrentUser)->where('role_id', 2)->get();
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
}
