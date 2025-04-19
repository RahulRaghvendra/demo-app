<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignationModel;
use App\Models\MenuRights;

class DesignationController extends Controller
{
    public function index()
    {
        return view('designation.list');
    }
    
    public function add()
    {
        return view('designation.add');
    }

    public function store(Request $request)
    {

    }
}
