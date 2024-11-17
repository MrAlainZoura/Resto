<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        return response()->json(['success'=>true, 'data'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validationData = Validator::make($request->all(),
        [
            'libele'=>'required|string|min:4|unique:roles',
            'description'=>'required|string|min:4'
        ]);

        if($validationData->fails()){
            return response()->json(['success'=>false,'error'=>$validationData->errors()]);
        }

        $data = ['libele'=>$request->libele,'description'=>$request->description];

        try{
            $save = Role::create($data);
        }catch(Exception $e){
            return response()->json(['success'=>false,'error'=>'Enregistrement échoué']);
        }
        return response()->json(['success'=>true,'data'=>$save]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::where('id',$id)->get();
        if($role){
            return response()->json(['success'=>true, 'data'=>$role]);
        }
        return response()->json(['success'=>false, 'error'=>'Désolé nous ne pourrons satisfaire à votre demande']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
                
        $validationData = Validator::make($request->all(),
        [
            'libele'=>'required|string|min:4',
            'description'=>'required|string|min:4',
            'id'=>'required'
        ]);
       
        if($validationData->fails()){
            return response()->json(['success'=>false,'error'=>$validationData->errors()]);
        }

        $data = ['libele'=>$request->libele,'description'=>$request->description];
        
        
        $role = Role::where('id',$request->id)->get();
        try{
          $up = DB::table('roles')
                        ->where('id', $request->id)
                        ->update([
                            'libele'=>$request->libele,
                            'description'=>$request->description
                        ]);

        }catch(Exception $e){
            return response()->json(['success'=>false, 'error'=>'Désolé nous ne pourrons satisfaire à votre demande']);

        }
        return response()->json(['success'=>true, 'data'=>'Mise à jour réussie']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
