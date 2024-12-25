<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materi;


class admincontroller extends Controller
{
    public function indexadmin()
    {   
        return view('admin.materiadmin');
    }

    public function dataguru()
    {   
        return view('admin.guruadmin');
    }

    public function datasiswa()
    {   
        return view('admin.siswaadmin');
    }

    public function dashboardadmin()
    {
        return view('admin.dashboardadmin');
    }

    public function nilaiadmin()
    {
        return view('admin.nilaiadmin');
    }

    public function jadwaladmin()
    {
        return view('admin.jadwaladmin');
    }

    public function profileadmin()
    {
        return view('admin.profileadmin');
    }
}
