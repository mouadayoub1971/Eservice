<?php

namespace App\Http\Controllers;


use App\Models\Module_prof;
use App\Models\Role;

use App\Models\Score_validate;
use App\Services\ScoresServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Request as FacadesRequest;

class ProfesseurController extends Controller
{



    public  function getRole(){
        return Role::find(Auth::user()->role_id);
    }


    public function modules_index(){

    $moduleEnSignes = Module_prof::where('prof_id', auth()->user()->id)
    ->join('modules', 'module_profs.module_id', '=', 'modules.id')
    ->join('module_filiers', 'module_profs.module_id', '=', 'module_filiers.module_id')
    ->leftJoin('time_tables', 'module_filiers.id', '=', 'time_tables.module_filier_id')
    ->join('classes', 'classes.id', '=', 'module_filiers.classe_id')
    ->join('filiers', 'filiers.id', '=', 'module_filiers.filier_id')
    ->join('departements', 'departements.id', '=', 'filiers.departement_id')
    ->join('users as professors', 'professors.id', '=', 'module_profs.prof_id')
    ->join('users as chefs_departement', 'chefs_departement.id', '=', 'departements.chef_departement_id')
    ->join('users as coordinateurs', 'coordinateurs.id', '=', 'filiers.cordinateur_id')
    ->select(
        'modules.name as module',
        'module_profs.*',
        'module_filiers.*',
        'classes.name as promoName',
        'filiers.name as filierName',
        'departements.name as departement',
        'professors.name as professor',
        'chefs_departement.name as chefDepartement',
        'coordinateurs.name as cordinateur',
        'time_tables.start_time',
        'time_tables.end_time',
        'time_tables.day',
        'time_tables.title'
    )
    ->orderByRaw('FIELD(UPPER(time_tables.day), "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY", "SUNDAY")')
    ->get();
    // $moduleEnSignes = Module_prof::where('prof_id', auth()->user()->id)
    // ->join('modules', 'module_profs.module_id', '=', 'modules.id')
    // ->join()
    // ->select(
    //     'modules.*'
    // )
    // ->get();
    // dd($moduleEnSignes);
        return view('professeur.modules.index')->with('modules', $moduleEnSignes)->with('name', $this->getRole()->name);
    }



    public  function scores_index(){
        $modeles = Module_prof::where('prof_id',Auth::user()->id)
            ->join('modules','modules.id' , 'module_profs.module_id')
            ->select(
                'modules.id as id',
                'modules.name as module_name'
            )->get();

        $students = [];
        if(!empty(FacadesRequest::get('module'))) {

            $scores_table = DB::table('score_validates')->where('score_validates.module_id' , FacadesRequest::get('module'))
                ->select('score_validates.student_id','score_validates.score_ds','score_validates.score_final','score_validates.status as status');

                  $students = DB::table('modules')->where('modules.id', FacadesRequest::get('module'))
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




        }




        return view('professeur.scores.index')
            ->with('name', $this->getRole()->name)
            ->with('modules', $modeles)
            ->with('students',$students);

    }


    public function scores_save($module_id , Request $request){

        $scores = $request->all();
        $scores = array_slice($scores, 1, -1, true);




        $ScoresServicese = new ScoresServices();

        if($request->save){
            $ScoresServicese->save($scores,$module_id);
        }elseif ($request->validate){
            foreach ($scores as $student_id => $score){
                if($score['ds'] == null || $score['final'] == null ){
                    return redirect()->back()->with('error','all the scores must be filled');
                }
            }
            $ScoresServicese->validate($scores,$module_id);
        }




        return redirect()->back();

    }


}
