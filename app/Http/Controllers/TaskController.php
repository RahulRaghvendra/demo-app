<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('task.list');
    }
    public function add(){
        return view('task.add');
    }
}
