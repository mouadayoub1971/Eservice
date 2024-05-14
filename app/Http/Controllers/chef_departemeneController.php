<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chef_departemeneController extends Controller
{
    public function index()
    {
        return View('chef_departement.modules.index')->with("name", 'chef_departement');
    }
}
