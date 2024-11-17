<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Bureau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bureau = Bureau::all();
        return response()->json(['success'=>true, 'data'=>$bureau]);
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
            'libele'=>'required|string|min:4|libele:bureaus',
            'description'=>'required|string|min:4',
            'lat'=>'double',
            'lon'=>'double',
            'creation'=>'date'
        ]);

        if($validationData->fails()){
            return response()->json(['success'=>false,'error'=>$validationData->errors()]);
        }
        $date = Carbon::now();
        $data = [
            'libele'=>$request->libele,
            'description'=>$request->description,
            'lat'=>$request->lat,
            'lon'=>$request->lon,
            'creation'=>$date->format('Y-m-d')
        ];

        try{
            $save = Bureau::create($data);
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
        $bureau = Bureau::where('id',$id)->get();
        if($bureau){
            return response()->json(['success'=>true, 'data'=>$bureau]);
        }
        return response()->json(['success'=>false, 'error'=>'Désolé nous ne pourrons satisfaire à votre demande']);
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bureau $bureau)
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
            'libele'=>'required|string|min:4|libele:bureaus',
            'description'=>'required|string|min:4',
            'lat'=>'double',
            'lon'=>'double',
            'creation'=>'date',
            'id'=>'required'
        ]);

        if($validationData->fails()){
            return response()->json(['success'=>false,'error'=>$validationData->errors()]);
        }

        $data = [
            'libele'=>$request->libele,
            'description'=>$request->description,
            'lat'=>$request->lat,
            'lon'=>$request->lon,
            'creation'=>$request->creation
        ];
        $bureau = Bureau::where('id',$request->id)->get();
        try{
          $up = DB::table('roles')
                        ->where('id', $request->id)
                        ->update($data);

        }catch(Exception $e){
            return response()->json(['success'=>false, 'error'=>'Désolé nous ne pourrons satisfaire à votre demande']);

        }
        return response()->json(['success'=>true, 'data'=>'Mise à jour réussie']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bureau $bureau)
    {
        //
    }
}
