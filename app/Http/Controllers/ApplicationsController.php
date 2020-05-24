<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    //
    public function getApps()
    {
        $apps = Application::all();

        return response()->json($apps);
    }

    public function saveApp(Request $request)
    {
        $query = count(DB::table('applications')
            ->where('name', '=', $request->name)
            ->get());

        if ($query == 0) {
            $app = new Application();
            $app->name = $request->name;
            $app->description = $request->description;
            $app->icon_path = null;
            $app->app_url = $request->app_url;
            $app->state = 1;

            $app->save();

            return response()->json(['msg' => 'Aplicacion Creada Correctamente'], 201);
        } else {
            return response()->json(['msg' => 'Ya existe una aplicacion con este nombre o url'], 200);
        }
    }
}
