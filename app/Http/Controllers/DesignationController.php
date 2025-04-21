<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignationModel;
use App\Models\MenuRights;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = DesignationModel::all(); 
        $data = [
            'designations' => $designations,
        ];
        return view('designation.list',$data);
    }

    public function add()
    {
        $flag = 'add';
        $data = [
            'flag' => $flag,
        ];
        return view('designation.add', $data);
    }
    public function edit($id)
    {
        $flag = 'edit';
        $menuRights = MenuRights::where("designation_id", $id)->pluck('menu_id')->toArray();
        $designation = DesignationModel::findOrFail($id);
        $data = [
            'flag' => $flag,
            'designation' => $designation,
            'menuRights' => $menuRights,
        ];
        return view('designation.add', $data);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'designation_name' => 'required',
           // 'status' => 'required|boolean',
        ]);
        $flag = $request->flag;
      

        if ($flag == 'edit') {
            $designations = DesignationModel::find($request->id);
            $designations->designation = $request->designation_name;
           //$designations->type = $request->type;
          //  $designations->status = $request->status;
            $designations->save();
            $id = $designations->id;
        
           /* $menuRights = request('menu_id');
            //delete existing rightts
            MenuRights::where('designation_id', $id)->delete();
            //
            if (is_array($menuRights)) {
                foreach ($menuRights as $rights) {
                    MenuRights::insert([
                        'designation_id' => $id,
                        'menu_id' => $rights,
                      //  'flag_show' => 1,
                    ]);
                }
            }*/
            $msg = 'User rights updated';
            $logMsg = 'User rights update';
           // return redirect()->back()->with('success', 'User updated successfully.');
        } else {
            $designations = new DesignationModel();
            $designations->designation = $request->designation_name;
            $designations->save();
            $id = $designations->id;
            $msg = 'User rights Added';
            $logMsg = 'User rights update';

          } 
           
          //  $designations->type = $request->type;
           // $designations->status = $request->status;
          
          
            $menuRights = request('menu_id');

            //delete existing rightts

          
            MenuRights::where('designation_id', $id)->delete();
            //
            if (is_array($menuRights)) {
                foreach ($menuRights as $rights) {
                    MenuRights::insert([
                        'designation_id' => $id,
                        'menu_id' => $rights,
                      //  'flag_show' => 1,
                    ]);
                }
            }
         
            return redirect()->back()->with('success', 'Designation added successfully.');
        
        
    }
    public function delete($id)
    {
        $designations = DesignationModel::find($id);
        $menuRights = MenuRights::where('designation_id', $id)->delete();
        $designations->delete();
        return redirect()->back()->with('success', 'Designation deleted successfully.');
    }
}
