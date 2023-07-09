<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller{

    public function sobreNos(){
        
        //var_dump($_POST);

        return view('site.sobrenos');

    }

}
