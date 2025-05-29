<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Exception;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getInfo(){
        try{

            $info = Info::with(['techStack'=>function($query){
                $query->with('tech');
            }])->first();
            return response()->json(['success'=>true, 'message'=>'Project fetched successful', 'data'=>$info ], 200);

        }catch(Exception $err){
            return response()->json(['success'=>false, 'message'=>$err->getMessage()], 500);
        }

    }
}
