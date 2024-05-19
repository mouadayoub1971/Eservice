<?php

namespace App\Exports;

use App\Services\ModuleServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class moduleExport implements FromArray,WithHeadings
{

   public ModuleServices $ModuleServices ;


    public function array():array
    {
         $this->ModuleServices  = new ModuleServices;
        $list = [];

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


            );


        $module_lists=$this->ModuleServices->getmodules($module_lists ,Auth::user()->filier_id);


        foreach ($module_lists as $key => $module_list){

            $list[] = [$module_list->id , $module_list->module, $module_list->prof,$module_list->classe,$module_list-> created_at];

        }

        return  $list;

    }
    public function headings(): array
    {
        return [
            'ID',
            'Module Name',
            'Professor',
            'Class',
            'Creation Date',
        ];
    }
}
