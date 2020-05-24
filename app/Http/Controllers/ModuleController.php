<?php

namespace App\Http\Controllers;

use App\Application;
use App\AppModules;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    //
    public function getModules()
    {
        $modules = Module::all();

        return response()->json($modules);
    }

    public function saveModule(Request $request)
    {
        $query = count(DB::table('modules')
            ->where('name', '=', $request->name)
            ->get());


        if ($query == 0) {
            $module = Module::create([
                'name' => $request->name,
                'description' => $request->description,
                'module_url' => $request->module_url,
                'state' => 1,
            ]);

            return response()->json(['msg' => 'Aplicacion Creada Correctamente'], 201);
        } else {
            return response()->json(['msg' => 'Ya existe una aplicacion con este nombre o url'], 200);
        }
    }
}
