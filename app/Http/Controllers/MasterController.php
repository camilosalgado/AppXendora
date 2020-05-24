<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    //
    public function index()
    {
        return view('layouts.modules.master.master');
    }

    public function indexUsers()
    {
        return view('layouts.modules.users.userIndex');
    }

    public function indexRoles()
    {
        return view('layouts.modules.applications.applicationsIndex');
    }

    public function indexPermissions()
    {
        return view('layouts.modules.applications.applicationsIndex');
    }

    public function indexApplications()
    {
        return view('layouts.modules.applications.applicationsIndex');
    }

    public function indexModules()
    {
        return view('layouts.modules.modules.modulesIndex');
    }
}
