<?php

namespace App\Http\Controllers;

use App\Models\Module_filier;
use App\Models\Module_prof;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index(){

    $moduleEnSignes = Module_prof::where('prof_id', auth()->user()->id)
    ->join('modules', 'module_profs.module_id', '=', 'modules.id')
    ->join('module_filiers', 'module_profs.module_id', '=', 'module_filiers.module_id')
    ->join('time_tables', 'module_filiers.id', '=', 'time_tables.module_filier_id')
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
        return view('professeur.modules.index')->with('modules', $moduleEnSignes)->with('name', 'professeur');
    }
}
