<?php

namespace App\Services;

use Illuminate\Support\Facades\Request as FacadesRequest;

class ModuleServices
{


    public  function getmodules( $module_lists ,$id){

        if(!empty(FacadesRequest::get('id'))){

            $module_lists = $module_lists->where('module_filiers.filier_id', $id)
                ->where('modules.id', FacadesRequest::get('id'))
                ->get();

        }
        else if (!empty(FacadesRequest::get('classe')) && empty(FacadesRequest::get('name'))) {
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
                ->where('classes.name', FacadesRequest::get('classe'))
                ->get();
        }
        else {
            $module_lists = $module_lists->where('module_filiers.filier_id', $id)->get();
        };


        return  $module_lists;
    }

}
